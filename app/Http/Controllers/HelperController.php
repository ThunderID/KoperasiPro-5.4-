<?php
namespace App\Http\Controllers;

use App\Service\Teritorial\TeritoriIndonesia;
// use TQueries\Kredit\DaftarKreditur;
use App\Service\Helpers\UI\UploadBase64Gambar;
use App\Service\Helpers\API\JSend;

use Input;
/**
 * Class HelperController
 * Description: digunakan untuk membantu UI untuk mengambil data
 *
 * author: @agilma <https://github.com/agilma>
 */
Class HelperController extends Controller
{
	/**
	 * fungsi get cities
	 * Description: berfungsi untuk mendapatkan city dari id province tertentu
	 */
	public function getRegensi()
	{
		$id 			= request()->input('id');
		$call 		= new TeritoriIndonesia;

		// get data regensi
		$regensi		= collect($call->get(['regensi_dari' => $id]));
		// sort data city by 'nama'
		$regensi 		= $regensi->sortBy('nama');
		// $regensi 		= $regensi->pluck('nama', 'id');

        return response()->json($regensi->pluck('nama', 'id'));
	}

	/**
	 * fungsi get distrik
	 * Description: untuk mendapatkan distrik dari regensi tertentu
	 */
	public function getDistrik()
	{
		$id 			= request()->input('id');
		$call 		= new TeritoriIndonesia;

		// get data distrik for regensi 'id'
		$distrik 		= collect($call->get(['distrik_dari'	=> $id]));
		// sort data distrik by 'nama'
		$distrik 		= $distrik->sortBy('nama');
		$distrik 		= $distrik->pluck('nama', 'id');

		return response()->json($distrik);
	}

	/**
	 * fungsi get desa
	 * Description: untuk mendapatkan desa dari distrik tertentu
	 */
	public function getDesa()
	{
		$id 			= request()->input('id');
		$call		= new TeritoriIndonesia;

		// get data desa dari distrik 'nama';
		$desa 		= collect($call->get(['desa_dari' => $id]));
		// sort data desa by 'nama'
		$desa 		= $desa->sortBy('nama');
		$desa 		= $desa->pluck('nama', 'id');

		return response()->json($desa);
	}

	/**
	 * fungsi get data kreditur
	 * description: untuk mendapatkan data kreditur yang sudah ada
	 */
	// public function getDaftarKreditur()
	// {
	// 	$id 			= request()->input('nik');
	// 	$call 			= new DaftarKreditur;

	// 	// get data kreditur
	// 	$kreditur 		= collect($call->get(['nik' => $id]));

	// 	return response()->json($kreditur[0]);
	// }

	public function storeGambar()
	{
		$input 		= Input::get('survei');

		$survei 	= base64_decode($input);
		$gambar 	= new UploadBase64Gambar('survei', ['image' => $survei]);
		$gambar 	= $gambar->handle();

		return JSend::success($gambar)->asArray();
	}

	public function destroyGambar()
	{
		$filename	= Input::get('url');
		$filename 	= str_replace(url('/'), public_path(), $filename);

		if (file_exists($filename) && str_is(public_path().'*', $filename)) 
		{
			unlink($filename);

			return JSend::success([])->asArray();
		} 

		return JSend::error(['File tidak ada!'])->asArray();
	}
}