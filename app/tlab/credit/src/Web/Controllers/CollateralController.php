<?php 

namespace Thunderlabid\Credit\Web\Controllers;

use App\Http\Controllers\Controller;
use Credit, Input, Redirect;

class CollateralController extends Controller 
{
	/**
	 * lihat Credit
	 *
	 * @return Response
	 */
	public function index()
	{
		$credit			= Credit::allCredit();

		return view('credit::collateral.index', compact('credit'));
	}

	/**
	 * lihat Credit tertentu
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$credit			= Credit::allCredit();
		
		$credit_detail 	= Credit::CollateralByCreditID($id);
	
		return view('credit::collateral.show', compact('credit', 'credit_detail'));
	}

	/**
	 * simpan Credit
	 *
	 * @return Response
	 */
	public function store()
	{
		$array  =   [
				'id'							=> null,
				'credit'						=> [
					'id'						=> 'C12544C-3E18-4BFE-9D69-354FEA20B90D',
				],
				'lands'							=> [
					[
						'name' 					=> 'Yulia Pandie', 
						'address' 				=> 'Jalan Neptunus 4 No 5', 
						'certification' 		=> 'hm', 
						'surface_area' 			=> 300, 
						'road' 					=> 'batu', 
						'road_wide' 			=> 8, 
						'location_by_street' 	=> 'sama', 
						'environment' 			=> 'perumahan', 
						'deed' 					=> true, 
						'lastest_pbb' 			=> true, 
						'insurance' 			=> true, 
						'pbb_value' 			=> 400000000, 
						'liquidation_value' 	=> 400000000, 
						'land_value' 			=> 400000000, 
						'assessed' 				=> 40, 
					],
				],
				'buildings'						=> [
					[
						'name' 					=> 'Yulia Pandie', 
						'address' 				=> 'Puri Cempaka Putih II AS 86', 
						'certification' 		=> 'hgb', 
						'surface_area' 			=> 36, 
						
						'building_area' 		=> 30, 
						'building_function' 	=> 'Rumah Tinggal', 
						'building_shape' 		=> 'Tingkat', 
						'building_construction' => 'Permanen', 

						'floor' 				=> 'Keramik', 
						'wall' 					=> 'Tembok', 
						'electricity' 			=> '450 watt', 
						'water' 				=> 'PDAM', 
						'telephone' 			=> true, 
						'air_conditioner' 		=> true, 
						'others' 				=> 'true', 

						'road' 					=> 'aspal', 
						'road_wide' 			=> 8, 
						'location_by_street' 	=> 'sama', 
						'environment' 			=> 'perumahan', 
						'deed' 					=> true, 
						'lastest_pbb'			=> true, 
						'insurance' 			=> true, 
						'pbb_value' 			=> 350000000, 
						'liquidation_value' 	=> 350000000, 
						'land_value' 			=> 270000000, 
						'building_value' 		=> 80000000, 
						'assessed' 				=> 40, 
					],
				],
				'vehicles'						=> [
					[
						'merk' 					=> 'Honda Spacy', 
						'type' 					=> 'Spacy', 
						'police_number' 		=> 'N 4314 CU', 
						'color' 				=> 'Biru-Hitam', 
						'year' 					=> '2011', 
						'name'					=> 'Chelsy M', 
						'address' 				=> 'PCP II AS 86', 
						'bpkb_number' 			=> 'IFORGET', 
						'machine_number' 		=> 'IFORGET2', 
						'frame_number' 			=> 'IFORGET3', 
						'valid_until' 			=> '20 December 2017', 
						'functions' 			=> 'Kendaraan Pribadi', 
						'purchase_memo' 		=> true, 
						'memo' 					=> true, 
						'valid_ktp' 			=> true, 
						'physical_condition' 	=> 'cukup_baik', 
						'ownership_status' 		=> 'sendiri', 
						'insurance' 			=> true, 
						'invoice' 				=> true, 
						'bank' 					=> 40,
						'market_value' 			=> 12000000, 
						'assessed' 				=> 40, 
					],
				],
			];

		$new_entity 	= Credit::buildThisCollateral($array);

		Credit::saveThisCollateral($new_entity);

		return Redirect::route('collateral.index');
	}
}
