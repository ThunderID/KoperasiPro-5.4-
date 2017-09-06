<?php
namespace App\Http\Controllers;

use App\Infrastructure\Traits\IDRTrait;

use Input, Session, App;
/**
 * Class LaporanController
 * Description: digunakan untuk membantu UI untuk mengambil data
 *
 * author: @agilma <https://github.com/agilma>
 */
Class SimulasiController extends Controller
{
	use IDRTrait;

	public function index()
	{
		$this->setGlobal();
	
		// set page attributes (please check parent variable)
		$this->page_attributes->title 				= "Simulasi Kredit";

		$this->view 								= view('pages.kredit.simulasi.create');

		// get from session of data
		$this->page_datas->data_simulasi 			= Session::get('simulasi') != null ? Session::get('simulasi') : [];

		if(Session::has('simulasi_input')){
			$this->page_datas->input_simulasi 		= Session::pull('simulasi_input');
		}else{
			$this->page_datas->input_simulasi 		= null;
		}

		//function from parent to generate view
		return $this->generateView();
	}

	public function store()
	{
		$this->setGlobal();
		
		// get input
		$inputs 									= Input::only('pinjaman', 'jangka_waktu', 'suku_bunga', 'angsuran'); 
		$rslt 										= json_decode(json_encode($this->hitung(Input::all())), true);

		// update session
		if(Session::has('simulasi')){
			// dd(Session::get('simulasi'));
			$session 								= Session::get('simulasi');
			array_push($session, $rslt['original']);
		}else{
			$session 								= [0 => $rslt['original']];
		}

		Session::put('simulasi', $session);
		Session::put('simulasi_input', $inputs);

		// return to index
		return $this->generateRedirect(route('simulasi.index'));
	}

	public function clear($id = null){
		if($id == null){
			App::Abort(404);
		}

		if($id == 'all'){
			Session::forget('simulasi');
		}else{
			$tmp = Session::get('simulasi');
			array_splice($tmp, $id, 1);
			Session::put('simulasi', $tmp);
		}

		// return to index
		return $this->generateRedirect(route('simulasi.index'));
	}

	public function ajukan($id = null){
		if($id == null){
			App::Abort(404);
		}

		$tmp = Session::get('simulasi')[$id]['pengajuan'];

		Session::put('_old_input.pengajuan_kredit', $tmp['pinjaman']);
		Session::put('_old_input.jenis_kredit', $tmp['angsuran']);
		Session::put('_old_input.jangka_waktu', $tmp['jangka_waktu']);

		return $this->generateRedirect(route('credit.create'));
	}


	public function hitung($request)
	{
		$jenis_pinjaman				= request()->input('angsuran');
		$suku_bunga_pertahun		= request()->input('suku_bunga');
		$pokok_pinjaman				= request()->input('pinjaman');
		$jangka_waktu				= request()->input('jangka_waktu');
		$net_pinjaman				= request()->input('net_pinjaman');

		$data_pengajuan 			= 	[	
											'angsuran' 				=> $jenis_pinjaman,
											'suku_bunga' 			=> $suku_bunga_pertahun,
											'pinjaman'				=> $pokok_pinjaman,
											'jangka_waktu' 			=> $jangka_waktu
										];

		switch (strtolower($jenis_pinjaman)) 
		{
			case 'pa':
				// dd($this->hitung_flat($suku_bunga_pertahun, $pokok_pinjaman, $jangka_waktu, $net_pinjaman));
				$rslt = $this->hitung_flat($suku_bunga_pertahun, $pokok_pinjaman, $jangka_waktu, $net_pinjaman);
				$rslt['pengajuan'] 	= $data_pengajuan;
				return response()->json($rslt);
				break;
			
			default:
				# code...
				break;
		}

		\App::abort(404);
	}

	private function hitung_flat($suku_bunga_pertahun, $pokok_pinjaman = null, $jangka_waktu, $net_pinjaman = null)
	{
		if(!is_null($pokok_pinjaman))
		{
			$pokok 			= $this->formatMoneyFrom($pokok_pinjaman);
		}
		else
		{
			$pokok 			= 0;
		}

		if(!is_null($net_pinjaman))
		{
			$net 			= $this->formatMoneyFrom($net_pinjaman);
		}
		else
		{
			$net 			= 0;
		}
		//untuk sementara net tidak dihitung

		$angsuran_pokok 	= $this->formatMoneyTo($pokok/max(1, $jangka_waktu));
		$angsuran_bunga 	= $this->formatMoneyTo(($pokok * $suku_bunga_pertahun/100)/12);
		$angsuran 			= $this->formatMoneyTo(($pokok/max(1, $jangka_waktu)) + (($pokok * $suku_bunga_pertahun/100)/12));

		$rekon 				= [];

		$total_angsuran_pokok 				= 0;
		$total_angsuran_bunga 				= 0;
		$total_angsuran 					= 0;
		foreach (range(1, $jangka_waktu) as $key) 
		{
			$rekon['angsuran'][$key] 		= ['angsuran_pokok' => $angsuran_pokok, 'angsuran_bunga' => $angsuran_bunga, 'total_angsuran' => $angsuran];
			$total_angsuran_pokok 			= $this->formatMoneyFrom($angsuran_pokok) + $total_angsuran_pokok;
			$total_angsuran_bunga 			= $this->formatMoneyFrom($angsuran_bunga) + $total_angsuran_bunga;
			$total_angsuran  				= $this->formatMoneyFrom($angsuran ) + $total_angsuran ;
		}

		$rekon['total'] 					= 	[
													'angsuran_pokok' => $this->formatMoneyTo($total_angsuran_pokok),
													'angsuran_bunga' => $this->formatMoneyTo($total_angsuran_bunga), 
													'total_angsuran' => $this->formatMoneyTo($total_angsuran)
												];

		return $rekon;
	}
}