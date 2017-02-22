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
	function getCities($id = null)
	{
		$data = new \App\UI\CountryLists\Model\City;
		$temp = $data->where('province_id', 11);
		$cities = $temp->map(function ($item) {
		   return ['id' => $item['city_id'], 'text' => $item['city_name']];
		});
        
        return response()->json($cities);
	}
}