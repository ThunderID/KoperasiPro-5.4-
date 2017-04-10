<?php
namespace App\Http\Controllers;

use TQueries\Territorial\TeritoriIndonesia;
use TQueries\Kredit\DaftarKreditur;

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
		$name 			= request()->input('name');
		$call 			= new TeritoriIndonesia;

		// get data regensi
		$regensi		= collect($call->get(['temukan_regensi' => true, 'nama_provinsi' => $name]));
		// sort data city by 'nama'
		$regensi 		= $regensi->sortBy('nama');
		$regensi 		= $regensi->pluck('nama', 'nama');

        return response()->json($regensi);
	}

	/**
	 * fungsi get distrik
	 * Description: untuk mendapatkan distrik dari regensi tertentu
	 */
	function getDistrik()
	{
		$name 			= request()->input('name');
		$call 			= new TeritoriIndonesia;

		// get data distrik for regensi 'id'
		$distrik 		= collect($call->get(['temukan_distrik'	=> true, 'nama_regensi' => $name]));
		// sort data distrik by 'nama'
		$distrik 		= $distrik->sortBy('nama');
		$distrik 		= $distrik->pluck('nama', 'nama');

		return response()->json($distrik);
	}

	/**
	 * fungsi get desa
	 * Description: untuk mendapatkan desa dari distrik tertentu
	 */
	function getDesa()
	{
		$name 			= request()->input('name');
		$call			= new TeritoriIndonesia;

		// get data desa dari distrik 'nama';
		$desa 			= collect($call->get(['temukan_desa' => true, 'nama_distrik' => $name]));
		// sort data desa by 'nama'
		$desa 			= $desa->sortBy('nama');
		$desa 			= $desa->pluck('nama', 'nama');

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