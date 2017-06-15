<?php

namespace App\Http\Controllers;

use TQueries\Kredit\DaftarKreditur;
// Header Transaksi
use App\Domain\Kasir\Models\DetailTransaksi;
use App\Domain\Kasir\Models\HeaderTransaksi;
use App\Service\Kasir\DaftarKas;

use App\Service\Kasir\KasMasukBaru;
use App\Service\Kasir\KasKeluarBaru;

use Illuminate\Http\Request;
use Exception, Input;

class KasirController extends Controller
{
	public function __construct(Request $request)
	{
		parent::__construct();

		$this->service 		= new DaftarKas;
		$this->request      = $request;
	}

	public function index ()
	{
		$page 				= 1;

		if (Input::has('page'))
		{
			$page 			= (int)Input::get('page');
		}

		$this->page_attributes->title			= "Kas";
		$this->page_attributes->breadcrumb		= 	[
														'Kas'   => route('kasir.kas.index'),
													];

		// get list kreditur
		$this->getlistKas($page, 10);
		$this->paginate(route('kasir.kas.index'), $this->page_datas->total_cashes, $page, 10);

		$this->view								= view('pages.kasir.index');

		//function from parent to generate view
		return $this->generateView();
	}

	public function realisasi ()
	{
		$page 				= 1;

		if (Input::has('page'))
		{
			$page 			= (int)Input::get('page');
		}

		$this->page_attributes->title			= "Realisasi Kredit";
		$this->page_attributes->breadcrumb		= 	[
														'Realisasi Kredit'   => route('kasir.kas.index'),
													];
		// dd($this->service->get());
		// get list kreditur
		$this->getlistKas($page, 10, 'realisasi_kredit');
		$this->paginate(route('kasir.kas.index'), $this->page_datas->total_cashes, $page, 10);

		$this->view								= view('pages.kasir.index');

		//function from parent to generate view
		return $this->generateView();
	}

	public function create ($status)
	{
		$this->page_attributes->title           = 'Kas ' . $status;
		$this->page_attributes->breadcrumb      =   [
														'Kas ' . $status  => route('kasir.kas.create', ['status' => $status])
													];	
		$this->getParamToView(['kreditur']);
		$this->page_datas->status 				= $status;
		$this->view 							= view('pages.kasir.create');

		return $this->generateView();
	}

	public function store (Request $request, $status)
	{
		$details 		= [];

		foreach ($request->get('item') as $key => $value) 
		{
			$details[$key]['item']			= $request->get('item')[$key];
			$details[$key]['deskripsi']		= $request->get('deskripsi')[$key];
			$details[$key]['kuantitas']		= $request->get('qty')[$key];
			$details[$key]['harga_satuan']	= $request->get('harga_satuan')[$key];
			$details[$key]['diskon_satuan']	= $request->get('diskon_satuan')[$key];
		}

		try
		{
			switch ($status) 
			{
				case 'masuk':
					$data 	= new KasMasukBaru($request->get('debitur_id'), 0, $request->get('nomor_nota'), $request->get('tanggal'), $details);
					break;
				case 'keluar':
					$data 	= new KasKeluarBaru($request->get('debitur_id'), 0, $request->get('nomor_nota'), $request->get('tanggal'), $details);
					break;
				
				default:
					throw new Exception("Status tidak valid", 1);
					break;
			}
			$data 	= $data->save();
		
			return $this->generateRedirect(route('kasir.kas.show', $data['id']));
		}
		catch (Exception $e)
		{
			if (is_array($e->getMessage()))
			{
				$this->page_attributes->msg['error']    = $e->getMessage();
			}
			else
			{
				$this->page_attributes->msg['error']    = [$e->getMessage()];
			}
		
			return $this->generateRedirect(route('kasir.kas.create', ['status' => $status]));
		}
	}

	public function show ($id)
	{
		$page 									= 1;
		if (Input::has('page'))
		{
			$page 								= (int)Input::get('page');
		}

		$this->page_attributes->title           = 'Kas ';
		$this->page_attributes->breadcrumb      =   [
														'Kas'	=> route('kasir.kas.show', ['id' => $id])
													];
		$this->getlistKas($page, 10, (Input::get('section') == 'realisasi') ? 'realisasi_kredit' : null);

		$this->paginate(route('kasir.kas.show', array_merge(['id' => $id])), $this->page_datas->total_cashes, $page, 10);

		//parsing master data here
		try
		{
			$this->page_datas->cash						= $this->service->detailed($id);
		}
		catch (Exception $e)
		{
			if (is_array($e->getMessage()))
			{
				$this->page_attributes->msg['error'] 	= $e->getMessage();
			}
			else
			{
				$this->page_attributes->msg['error'] 	= [$e->getMessage()];
			}
		
			return $this->generateRedirect(route('kasir.kas.index'));
		}

		$this->page_datas->id 							= $id;

		if (!empty($this->page_datas->cash['referensi_id']))
		{
			$this->view 								= view('pages.kasir.realisasi_kredit');
		}
		else 
		{
			$this->view 								= view('pages.kasir.kas');
		}

		return $this->generateView();
	}

	private function getListKas ($page, $take, $menunggu_realisasi = null)
	{
		//1. Parsing status
		$status 									= null; 
		if (Input::has('status'))
		{
			$status 								= Input::get('status');
			$this->kas_active_filters['status'] 	= $status;
		}
		//2. Parsing search box
		if (Input::has('q'))
		{
			if (!is_null($menunggu_realisasi))
			{
				$this->page_datas->cashes			= $this->service->get(['status' => $status, 'per_page' => $take, 'page' => $page, 'menunggu_realisasi' => '', 'kas' => Input::get('q')]);
				$this->page_datas->total_cashes		= $this->service->count(['status' => $status, 'menunggu_realisasi' => '', 'kas' => Input::get('q')]);
			}
			else
			{
				$this->page_datas->cashes			= $this->service->get(['status' => $status, 'per_page' => $take, 'page' => $page, 'kas' => Input::get('q')]);
				$this->page_datas->total_cashes		= $this->service->count(['status' => $status, 'kas' => Input::get('q')]);
			}
			$this->credit_active_filters['q'] 		= Input::get('q');
		}
		else
		{
			if (!is_null($menunggu_realisasi))
			{
				$this->page_datas->cashes			= $this->service->get(['status' => $status, 'per_page' => $take, 'page' => $page, 'menunggu_realisasi' => '']);
				$this->page_datas->total_cashes		= $this->service->count(['status' => $status, 'menunggu_realisasi' => '']);
			}
			else
			{
				$this->page_datas->cashes			= $this->service->get(['status' => $status, 'per_page' => $take, 'page' => $page]);
				$this->page_datas->total_cashes		= $this->service->count(['status' => $status]);
			}
		}

		//3. Memanggil fungsi filter active
		// $this->page_datas->kas_filters 			= $this->service->statusLists();
	}

	public function billingStore ()
	{
		try{
			// init
			$DetailTransaksi                    = new DetailTransaksi;
			$HeaderTransaksi                    = new HeaderTransaksi;

			// parase inputs
			$input                              = Input::all();

			// validate inputs

			// save inputs


		}catch (Exception $e){
			if (is_array($e->getMessage()))
			{
				$this->page_attributes->msg['error']    = $e->getMessage();
			}
			else
			{
				$this->page_attributes->msg['error']    = [$e->getMessage()];
			}
		
			return $this->generateRedirect(route('kasir.billing'));
		}
	}

	public function angsuran () 
	{
		$this->page_attributes->title           = 'Bayar Angsuran ';
		$this->page_attributes->breadcrumb      =   [
														'Bayar Angsuran'	=> route('kasir.angsuran')
													];

		$this->view 							= view('pages.kasir.angsuran');

		return $this->generateView();
	}

	private function getParamToView ($element)
	{
		// get parameter kreditur
		if (in_array('kreditur', $element))
		{
			$call                                   = new DaftarKreditur;

			$kreditur 						        = collect($call->get());
			$kreditur 							    = $kreditur->sortBy('nama');
			$kreditur                               = $kreditur->pluck('nama', 'id');

			$this->page_datas->select_kreditur 		= $kreditur;

		}
	}

}