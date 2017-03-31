<?php
namespace App\Http\Controllers;

use Thunderlabid\Web\Queries\Territorial\TeritoriIndonesia;
use Thunderlabid\Web\Queries\Credit\DaftarKreditur;

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
		$call 			= new TeritoriIndonesia;

		// get data regensi
		$regensi		= collect($call->get(['regensi_dari' => $id]));
		// sort data city by 'nama'
		$regensi 		= $regensi->sortBy('nama');
		$regensi 		= $regensi->pluck('id', 'nama');

        return response()->json($regensi);
	}

	/**
	 * fungsi get distrik
	 * Description: untuk mendapatkan distrik dari regensi tertentu
	 */
	function getDistrik()
	{
		$id 			= request()->input('id');
		$call 			= new TeritoriIndonesia;

		// get data distrik for regensi 'id'
		$distrik 		= collect($call->get(['distrik_dari'	=> $id]));
		// sort data distrik by 'nama'
		$distrik 		= $distrik->sortBy('nama');
		$distrik 		= $distrik->pluck('id', 'nama');

		return response()->json($distrik);
	}

	/**
	 * fungsi get desa
	 * Description: untuk mendapatkan desa dari distrik tertentu
	 */
	function getDesa()
	{
		$id 			= request()->input('id');
		$call			= new TeritoriIndonesia;

		// get data desa dari distrik 'id';
		$desa 			= collect($call->get(['desa_dari' => $id]));
		// sort data desa by 'nama'
		$desa 			= $desa->sortBy('nama');
		$desa 			= $desa->pluck('id', 'nama');

		return response()->json($desa);
	}

	/**
	 * fungsi get data kreditur
	 * description: untuk mendapatkan data kreditur yang sudah ada
	 */
	function getDaftarKreditur()
	{
		$id 			= request()->input('nik');
		$call 			= new DaftarKreditur;

		// get data kreditur
		$kreditur 		= collect($call->get(['nik' => $id]));

		return response()->json($kreditur[0]);
	}
}