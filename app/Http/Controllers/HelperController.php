<?php
namespace App\Http\Controllers;

use App\Service\Teritorial\TeritoriIndonesia;
// use TQueries\Kredit\DaftarKreditur;

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
	function getRegensi()
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
	function getDistrik()
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
	function getDesa()
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
	// function getDaftarKreditur()
	// {
	// 	$id 			= request()->input('nik');
	// 	$call 			= new DaftarKreditur;

	// 	// get data kreditur
	// 	$kreditur 		= collect($call->get(['nik' => $id]));

	// 	return response()->json($kreditur[0]);
	// }
}