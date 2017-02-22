<?php
namespace App\Http\Controllers;

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
	function getCities($id)
	{
		$data = new \App\UI\CountryLists\Model\City();
        dd($data->where('province_id', 11));
	}
}