<?php

namespace App\Http\Controllers;

use TQueries\Kredit\DaftarKreditur;
// Header Transaksi
use App\Domain\Kasir\Models\DetailTransaksi;
use App\Domain\Kasir\Models\HeaderTransaksi;
use App\Service\Kasir\DaftarKas;

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

		$this->paginate(route('kasir.kas.index'), $this->page_datas->total_kas, $page, 10);

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

	public function show ($id)
	{
		$this->page_attributes->title           = 'Kas ';
		$this->page_attributes->breadcrumb      =   [
														'Kas'	=> route('kasir.kas.show', $id)
													];
	}

	private function getListKas ($page, $take)
	{
		//1. Parsing status
		$status 									= null; 
		if (Input::has('status'))
		{
			$status 								= Input::get('status');
			$this->credit_active_filters['status'] 	= $status;
		}

		//2. Parsing search box
		if (Input::has('q'))
		{
			$this->page_datas->kas				= $this->service->get(['status' => $status, 'kas' => Input::get('q'), 'per_page' => $take, 'page' => $page]);
			$this->page_datas->total_kas		= $this->service->count(['status' => $status, 'kas' => Input::get('q')]);
			$this->credit_active_filters['q'] 		= Input::get('q');
		}
		else
		{
			$this->page_datas->kas				= $this->service->get(['status' => $status, 'per_page' => $take, 'page' => $page]);
			$this->page_datas->total_kas		= $this->service->count(['status' => $status]);
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