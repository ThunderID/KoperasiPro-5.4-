<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Service\Helpers\UI\UploadBase64Gambar;
use App\Service\Helpers\API\JSend;

use App\Service\Pengajuan\PengajuanKredit;

use App\Domain\Akses\Models\Koperasi;
use App\Domain\Pengajuan\Models\Pengajuan;

use Input, Carbon\Carbon;

class KreditController extends Controller
{
	public function __construct(Request $request)
	{
		$this->request 	= $request;
	}

	public function index()
	{
		$mobile_id 	= $this->request->input('id');
		$data 		= Pengajuan::where('status', 'pengajuan')->wherehas('hp', function($q)use($mobile_id){$q->where('mobile_id', $mobile_id);})->get(['jenis_kredit', 'pengajuan_kredit', 'jangka_waktu', 'tanggal_pengajuan'])->toArray();
		
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
		else
		{
			$kredit['referensi']= null;
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
		else
		{
			$kredit['spesimen_ttd']		= null;
		}

		if(Input::has('location'))
		{
			$lokasi 					= Input::get('location');
		}
		else
		{
			$lokasi 			= null;
		}

		$pengajuan_baru 		= new PengajuanKredit($kredit['jenis_kredit'], $kredit['jangka_waktu'], $kredit['pengajuan_kredit'], Carbon::now()->format('d/m/Y'), $kredit['mobile'], $kredit['spesimen_ttd'], $data_ktp['url'], $lokasi, $kredit['referensi']);

		$kredit['jaminan_kendaraan']		= $this->request->input('jaminan_kendaraan');
		$kredit['jaminan_tanah_bangunan']	= $this->request->input('jaminan_tanah_bangunan');

		foreach ((array)$kredit['jaminan_tanah_bangunan'] as $key => $value) 
		{
			$kredit['jaminan_tanah_bangunan'][$key]['alamat']		= ['regensi' => $value['kota'], 'desa' => $value['kelurahan'], 'alamat' => $value['alamat']];
			$kredit['jaminan_tanah_bangunan'][$key]['tipe']			= 'tanah';
			$kredit['jaminan_tanah_bangunan'][$key]['luas_tanah']	= 0;
			$kredit['jaminan_tanah_bangunan'][$key]['luas_bangunan']= 0;

			$pengajuan_baru->tambahJaminanTanahBangunan($kredit['jaminan_tanah_bangunan'][$key]['tipe'], $kredit['jaminan_tanah_bangunan'][$key]['jenis_sertifikat'], $kredit['jaminan_tanah_bangunan'][$key]['nomor_sertifikat'], $kredit['jaminan_tanah_bangunan'][$key]['masa_berlaku_sertifikat'], $kredit['jaminan_tanah_bangunan'][$key]['atas_nama'], $kredit['jaminan_tanah_bangunan'][$key]['alamat'], $kredit['jaminan_tanah_bangunan'][$key]['luas_tanah'], $kredit['jaminan_tanah_bangunan'][$key]['luas_bangunan']);
		}


		foreach ((array)$kredit['jaminan_kendaraan'] as $key => $value) 
		{
			$pengajuan_baru->tambahJaminanKendaraan($kredit['jaminan_kendaraan'][$key]['tipe'], $kredit['jaminan_kendaraan'][$key]['merk'], $kredit['jaminan_kendaraan'][$key]['tahun'], $kredit['jaminan_kendaraan'][$key]['nomor_bpkb'], $kredit['jaminan_kendaraan'][$key]['atas_nama']);
		}

		$pengajuan_baru->setDebitur(null, null, null, null, null, $kredit['kreditur']['nomor_telepon'], null, null);

		try {
			$pengajuan_baru 	= $pengajuan_baru->save();
		} catch (Exception $e) {
			return JSend::error($e->getMessage())->asArray();
		}

		return JSend::success(['nomor_kredit' => $pengajuan_baru['id']])->asArray();
	}
}