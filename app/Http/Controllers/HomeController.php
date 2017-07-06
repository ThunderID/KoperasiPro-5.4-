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
					case 'modifikasi_koperasi': case 'atur_akses' :
						$this->page_attributes->hook[0][0]	='pages.home.widgets.cabang_butuh_bantuan';

						$this->page_attributes->content['HR'][0] ='pages.home.widgets.cabang_butuh_bantuan';
						
						// $this->page_attributes->hook[0][1]	='pages.home.widgets.cabang_butuh_bantuan';
						break;
					
					case 'pengajuan_kredit' :
						$this->page_attributes->hook[1][0]	='pages.home.widgets.inspeksi_dokumen_pengajuan';

						$this->page_attributes->content['Kredit'][0]	='pages.home.widgets.inspeksi_dokumen_pengajuan';
						break;

					case 'survei_kredit' :
						$this->page_attributes->hook[1][1]	='pages.home.widgets.inspeksi_dokumen_survei';

						$this->page_attributes->content['Kredit'][1]	='pages.home.widgets.inspeksi_dokumen_survei';
						break;

					case 'setujui_kredit' :
						$this->page_attributes->hook[2][0]	='pages.home.widgets.setujui_kredit';

						$this->page_attributes->content['Kredit'][2]	='pages.home.widgets.setujui_kredit';
						break;

					case 'realisasi_kredit' :case 'transaksi_harian' : case 'kas_harian' :
						$this->page_attributes->hook[2][1]	='pages.home.widgets.realisasi_kredit';
						$this->page_attributes->hook[3][0]	='pages.home.widgets.kas_hari_ini';

						$this->page_attributes->content['Kasir'][0]	='pages.home.widgets.realisasi_kredit';
						$this->page_attributes->content['Kasir'][1]	='pages.home.widgets.kas_hari_ini';

						break;
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
