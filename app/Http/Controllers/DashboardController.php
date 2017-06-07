<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use TKredit\KreditAktif\Models\KreditAktif_RO;
use App\Domain\Kasir\Models\HeaderTransaksi;
use TAuth;

class DashboardController extends Controller
{
	// Construct
    public function __construct()
    {
        parent::__construct();
    }

	/**
	 * lihat index
	 *
	 * @return Response
	 */
	public function index()
	{
		$a_of 		= TAuth::activeOffice();

		// set page attributes (please check parent variable)
		$this->page_attributes->title	= "Dashboard";

		foreach ($a_of['scopes'] as $key => $value) 
		{
			if(!isset($value['expired_at']) || $value['expired_at'] > Carbon::now()->format('d/m/Y'))
			{
				switch ($value['list']) 
				{
					case 'modifikasi_koperasi': case 'atur_akses' :
						$this->page_attributes->hook[0][0]	='pages.dashboard.widgets.last_login';
						$this->page_attributes->hook[0][1]	='pages.dashboard.widgets.inactive_user';
						break;
					
					case 'pengajuan_kredit' :
						$this->page_attributes->hook[1][0]	='pages.dashboard.widgets.pengajuan_baru';
						break;

					case 'survei_kredit' :
						$this->page_attributes->hook[1][1]	='pages.dashboard.widgets.survei_kredit';
						break;

					case 'setujui_kredit' :
						$this->page_attributes->hook[2][0]	='pages.dashboard.widgets.setujui_kredit';
						break;

					case 'realisasi_kredit' :case 'transaksi_harian' : case 'kas_harian' :
						$this->page_attributes->hook[2][1]	='pages.dashboard.widgets.realisasi_kredit';
						$this->page_attributes->hook[3][0]	='pages.dashboard.widgets.kas_hari_ini';
						break;
					default:
						# code...
						break;
				}
			}
		}

		$this->view						= view('pages.dashboard.index');		
		// $this->view						= view('pages.dashboard.kasir');		

		//initialize view

		//function from parent to generate view
		return $this->generateView();
	}

	private function komisaris($a_of)
	{
		$kantor 	= [];

		$users 		= TAuth::loggedUser();

		foreach ($users['visas'] as $key => $value) 
		{
			if(str_is($value['role'], 'komisaris'))
			{
				$kantor[]		= $value['koperasi']['id'];
			}
		}

		$this->page_datas->stat_kredit_menunggu_persetujuan = KreditAktif_RO::koperasi($kantor)->status(['menunggu_persetujuan'])->where('pengajuan_kredit', '>', 10000000)->count();
		$this->page_datas->stat_kredit_ditolak 				= KreditAktif_RO::koperasi($kantor)->status(['tolak'])->count();
		$this->page_datas->stat_kredit_terealisasi 			= KreditAktif_RO::koperasi($kantor)->status(['terealisasi'])->count();
		$this->page_datas->stat_pengajuan_kredit 			= KreditAktif_RO::koperasi($kantor)->status(['pengajuan'])->count();

		$this->page_datas->kredit_menunggu_persetujuan 		= KreditAktif_RO::koperasi($kantor)->status(['menunggu_persetujuan'])->where('pengajuan_kredit', '>', 10000000)->take(10)->get();
		
		$this->page_datas->kredit_terealisasi 				= KreditAktif_RO::koperasi($kantor)->status(['menunggu_realisasi'])->with(['cabang'])->take(10)->get();
	}

	private function pimpinan($a_of)
	{
		$kantor 	= $a_of['koperasi']['id'];

		$this->page_datas->stat_kredit_menunggu_persetujuan = KreditAktif_RO::koperasi($kantor)->status(['menunggu_persetujuan'])->where('pengajuan_kredit', '<=', 10000000)->count();
		$this->page_datas->stat_kredit_ditolak 				= KreditAktif_RO::koperasi($kantor)->status(['tolak'])->count();
		$this->page_datas->stat_kredit_terealisasi 			= KreditAktif_RO::koperasi($kantor)->status(['terealisasi'])->count();
		$this->page_datas->stat_pengajuan_kredit 			= KreditAktif_RO::koperasi($kantor)->status(['pengajuan'])->count();

		$this->page_datas->kredit_menunggu_persetujuan 		= KreditAktif_RO::koperasi($kantor)->status(['menunggu_persetujuan'])->where('pengajuan_kredit', '<=', 10000000)->take(10)->get();
		
		$this->page_datas->kredit_terealisasi 				= KreditAktif_RO::koperasi($kantor)->status(['menunggu_realisasi'])->with(['cabang'])->take(10)->get();
	}

	private function surveyor($a_of)
	{
		$kantor 	= $a_of['koperasi']['id'];

		$this->page_datas->stat_kredit_survei	= KreditAktif_RO::koperasi($kantor)->status(['survei'])->count();
		$this->page_datas->stat_pengajuan_baru	= KreditAktif_RO::koperasi($kantor)->status(['pengajuan'])->count();

		$this->page_datas->stat_kredit_ditolak 				= KreditAktif_RO::koperasi($kantor)->status(['tolak'])->count();
		$this->page_datas->stat_kredit_terealisasi 			= KreditAktif_RO::koperasi($kantor)->status(['terealisasi'])->count();

		$this->page_datas->kredit_survei		= KreditAktif_RO::koperasi($kantor)->status(['survei'])->take(10)->get();
		$this->page_datas->pengajuan_baru 		= KreditAktif_RO::koperasi($kantor)->status(['pengajuan'])->take(10)->get();
	}

	private function marketing($a_of)
	{
		$kantor 	= $a_of['koperasi']['id'];

		$this->page_datas->stat_kredit_survei	= KreditAktif_RO::koperasi($kantor)->status(['survei'])->count();
		$this->page_datas->stat_pengajuan_baru	= KreditAktif_RO::koperasi($kantor)->status(['pengajuan'])->count();

		$this->page_datas->stat_kredit_ditolak 				= KreditAktif_RO::koperasi($kantor)->status(['tolak'])->count();
		$this->page_datas->stat_kredit_terealisasi 			= KreditAktif_RO::koperasi($kantor)->status(['terealisasi'])->count();
		
		$this->page_datas->kredit_survei		= KreditAktif_RO::koperasi($kantor)->status(['survei'])->take(10)->get();
		$this->page_datas->pengajuan_baru 		= KreditAktif_RO::koperasi($kantor)->status(['pengajuan'])->take(10)->get();
	}

	private function kasir($a_of)
	{
		$kantor 	= $a_of['koperasi']['id'];

		$this->page_datas->stat_menunggu_realisasi	= KreditAktif_RO::koperasi($kantor)->status(['menunggu_realisasi'])->count();
		$this->page_datas->stat_kas_pending			= HeaderTransaksi::koperasi($kantor)->status(['pending'])->count();

		$this->page_datas->stat_kredit_ditolak		= KreditAktif_RO::koperasi($kantor)->status(['tolak'])->count();
		$this->page_datas->stat_kredit_terealisasi	= KreditAktif_RO::koperasi($kantor)->status(['terealisasi'])->count();
		
		$this->page_datas->kredit_menunggu_realisasi= KreditAktif_RO::koperasi($kantor)->status(['menunggu_realisasi'])->take(10)->get();
		$this->page_datas->kas_pending				= HeaderTransaksi::koperasi($kantor)->status(['pending'])->take(10)->get();
	}
	
	/**
	 * lihat notification
	 *
	 * @return Response
	 */
	public function notification()
	{
		// set page attributes (please check parent variable)
		$this->page_attributes->title		= "Notifikasi";

		//initialize view
		$this->view							= view('pages.dashboard.notification');

		//function from parent to generate view
		return $this->generateView();
	}

	public function indextest1(){
		// init page attributes
		$this->page_attributes->title              = "Dashboard";
		$this->page_attributes->breadcrumb         = [
															'one'   => '#',
															'two'   => '#',
															'three' => null,
													 ];

		$this->view                                = View('pages.index');

		return $this->generateView();
	}

	public function indextest2(){
		// init page attributes
		$this->page_attributes->title              = "Daftar Kredit";
		$this->page_attributes->breadcrumb         = [
															'one'   => '#',
															'two'   => '#',
															'three' => null,
													 ];

		$this->view                                = View('pages.index2');

		return $this->generateView();
	}    

	public function store(Request $request){
		$this->page_attributes->msg['error']       = ['hai','halo2', 'haloooooooo!!!'];
		return $this->generateRedirect(route('dashboard.index'));
	}
}
