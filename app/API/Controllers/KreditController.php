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
use TAPICommands\UIHelper\UploadBase64Gambar;

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

		// $new_data 	= [];
		// foreach ($data as $key => $value) 
		// {
		// 	$new_data["index_$key"]	= $value;
		// }
		
		return JSend::success($data)->asArray();
	}

	public function store()
	{
		$kredit 				= Input::get('kredit');
		$kredit['mobile'] 		= Input::get('mobile');
		$kredit['kreditur'] 	= Input::get('kreditur');

		if(Input::has('referensi'))
		{
			$kredit['referensi']= Input::get('referensi');
		}

		//upload foto ktp
		$ktp 							= base64_decode($kredit['kreditur']['foto_ktp']);
		$data_ktp 						= new UploadBase64Gambar('ktp', $ktp);
		$data_ktp 						= $data_ktp->handle();

		if(isset($kredit['kreditur']['spesimen_ttd']))
		{
			$ttd 						= base64_decode($kredit['kreditur']['spesimen_ttd']);
			$data_ttd 					= new UploadBase64Gambar('ttd', $ttd);
			$data_ttd 					= $data_ttd->handle();
			$kredit['spesimen_ttd']		= $data_ttd['url'];
		}

		//parse url foto kreditur
		$kredit['kreditur']['foto_ktp']	= $data_ktp['url'];
		$kredit['kreditur']['nama']		= 'Pengajuan Melalui HP';

		if(Input::has('location'))
		{
			$lokasi 					= Input::get('location');
			$koperasi 					= Koperasi_RO::get();

			$lat_ln 					= 0;
			foreach ($koperasi as $key => $value) 
			{
				$selisih_lat 			= $lokasi['latitude'] - $value['latitude'];
				$selisih_lon 			= $lokasi['longitude'] - $value['longitude'];

				if($key == 0)
				{
					$lat_ln 			= $selisih_lon + $selisih_lat;
					$kredit['lokasi']	= $value['id'];
				}
				elseif($lat_ln > $selisih_lat+$selisih_lon)
				{
					$lat_ln 			= $selisih_lat + $selisih_lon;
					$kredit['lokasi']	= $value['id'];
				}
			}
		}
\Log::info($kredit['lokasi']);
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

		foreach ((array)$kredit['jaminan_tanah_bangunan'] as $key => $value) 
		{
			$kredit['jaminan_tanah_bangunan'][$key]['alamat']		= ['regensi' => $value['kota'], 'desa' => $value['kelurahan'], 'alamat' => $value['alamat']];
			$kredit['jaminan_tanah_bangunan'][$key]['tipe']			= 'tanah';
			$kredit['jaminan_tanah_bangunan'][$key]['luas_tanah']	= 0;
			$kredit['jaminan_tanah_bangunan'][$key]['luas_bangunan']= 0;
			// $kredit['jaminan_tanah_bangunan'][$key]['luas_tanah']		= $value['luas'];
			// $kredit['jaminan_tanah_bangunan'][$key]['luas_bangunan']	= 0;
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

		$data_kredit 	= new UploadBase64Gambar($ktp);
		$data_kredit 	= $data_kredit->handle();

		return JSend::success(['url' => $data_kredit['url']])->asArray();
	}
}