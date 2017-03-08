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
	function getCities()
	{
		$id 			= request()->input('id');
		$cities 		= new \Thunderlabid\Indonesia\Infrastructures\Models\City;

		// sort data city by 'city_name'
		$cities 		= $cities->sortBy('city_name_full');
		// set data city where 'province_id'
		$cities 		= $cities->where('province_id', $id)->values()->all();

        return response()->json($cities);
	}
}