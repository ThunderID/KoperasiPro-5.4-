<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Domain\Kasir\Models\HeaderTransaksi;
use TAuth;

class HomeController extends Controller
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
		$this->setGlobal();

		// set page attributes (please check parent variable)
		$this->page_attributes->title	= "Beranda";

		foreach ($this->acl_active_office['scopes'] as $key => $value) 
		{
			if(!isset($value['expired_at']) || $value['expired_at'] > Carbon::now()->format('d/m/Y'))
			{
				switch ($value['list']) 
				{
					case 'pengajuan_kredit' :
						$this->page_attributes->content['Kredit']['konten']				= 'pages.home.widgets.kredit';
						$this->page_attributes->content['Kredit']['sub']['pengajuan']	= 'pages.home.widgets.inspeksi_dokumen_pengajuan';
						break;

					case 'survei_kredit' :
						$this->page_attributes->content['Kredit']['sub']['survei']		= 'pages.home.widgets.inspeksi_dokumen_survei';
						break;

					case 'setujui_kredit' :
						$this->page_attributes->content['Kredit']['sub']['menunggu_persetujuan']	= 'pages.home.widgets.setujui_kredit';
						break;

					case 'realisasi_kredit' :case 'transaksi_harian' : case 'kas_harian' :
						$this->page_attributes->content['Kredit']['sub']['menunggu_realisasi']		= 'pages.home.widgets.realisasi_kredit';
						$this->page_attributes->content['Kasir']['konten']			= 'pages.home.widgets.kas_hari_ini';
						$this->page_attributes->content['Kasir']['sub']				= [];

						break;
					case 'modifikasi_koperasi': case 'atur_akses' :
						$this->page_attributes->content['Personalia']['konten']		= 'pages.home.widgets.cabang_butuh_bantuan';
						$this->page_attributes->content['Personalia']['sub']		= [];
					default:
						# code...
						break;
				}
			}
		}

		$this->view						= view('pages.home.index');		
		// $this->view						= view('pages.home.kasir');		

		//function from parent to generate view
		return $this->generateView();
	}
}
