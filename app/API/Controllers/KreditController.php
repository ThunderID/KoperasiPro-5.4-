<?php

namespace App\API\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use TAPIQueries\UIHelper\JSend;
use TAPIQueries\Kredit\DaftarKredit;

use TCommands\Kredit\PengajuanKreditBaru;
use TAPICommands\UIHelper\UploadBase64GambarKTP;

use Input;

class KreditController extends Controller
{
	public function __construct(Request $request)
	{
		$this->request 	= $request;
	}

	public function index()
	{
		$data 		= new DaftarKredit;

		$data 		= $data->get(['id' => $this->request->input('id')]);

		$new_data 	= [];
		foreach ($data as $key => $value) 
		{
			$new_data["index_$key"]	= $value;
		}
		
		return JSend::success($new_data)->asArray();
	}

	public function store()
	{
		$kredit 				= Input::get('kredit');
		$kredit['mobile'] 		= Input::get('mobile');
		$kredit['kreditur'] 	= Input::get('kreditur');

		//upload foto ktp
		$ktp 							= base64_decode($kredit['kreditur']['foto_ktp']);
		$data_kredit 					= new UploadBase64GambarKTP($ktp);
		$data_kredit 					= $data_kredit->handle();

		//parse url foto kreditur
		$kredit['kreditur']['foto_ktp']	= $data_kredit['url'];
		$kredit['kreditur']['nama']		= 'Pengajuan Melalui HP';

		// $jaminan_kendaraan 		= [];
		// $jaminan_tanah_bangunan = [];

		// if(!empty($this->request->input('jaminan_kendaraan_1')))
		// {
		// 	$jaminan_kendaraan[] 	= $this->request->input('jaminan_kendaraan_1');
		// }

		// if(!empty($this->request->input('jaminan_kendaraan_2')))
		// {
		// 	$jaminan_kendaraan[] 	= $this->request->input('jaminan_kendaraan_2');
		// }

		// if(!empty($this->request->input('jaminan_tanah_bangunan_1')))
		// {
		// 	$jaminan_tanah_bangunan[] 	= $this->request->input('jaminan_tanah_bangunan_1');
		// }

		// if(!empty($this->request->input('jaminan_tanah_bangunan_2')))
		// {
		// 	$jaminan_tanah_bangunan[] 	= $this->request->input('jaminan_tanah_bangunan_2');
		// }

		// if(!empty($this->request->input('jaminan_tanah_bangunan_3')))
		// {
		// 	$jaminan_tanah_bangunan[] 	= $this->request->input('jaminan_tanah_bangunan_3');
		// }

		$kredit['jaminan_kendaraan']		= $this->request->input('jaminan_kendaraan');
		$kredit['jaminan_tanah_bangunan']	= $this->request->input('jaminan_tanah_bangunan');

		foreach ($kredit['jaminan_tanah_bangunan'] as $key => $value) 
		{
			$kredit['jaminan_tanah_bangunan'][$key]['luas_tanah']		= $value['luas'];
			$kredit['jaminan_tanah_bangunan'][$key]['luas_bangunan']	= 0;
		}

		try {
			$data_kredit 	= new PengajuanKreditBaru($kredit);
			$data_kredit 	= $data_kredit->handle();
		} catch (Exception $e) {
			return JSend::error($e->getMessage())->asArray();
		}

		return JSend::success(['nomor_kredit' => $data_kredit['id']])->asArray();
	}

	public function upload($nomor_kredit = null)
	{
		$ktp 			= Input::get('gambar');
		$ktp 			= base64_decode($ktp);

		$data_kredit 	= new UploadBase64GambarKTP($ktp);
		$data_kredit 	= $data_kredit->handle();

		return JSend::success(['url' => $data_kredit['url']])->asArray();
	}
}