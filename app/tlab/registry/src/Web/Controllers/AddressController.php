<?php 

namespace Thunderlabid\Registry\Web\Controllers;

use App\Http\Controllers\Controller;
use Registry, Input, Redirect;

class AddressController extends Controller 
{
	/**
	 * lihat Registry
	 *
	 * @return Response
	 */
	public function index()
	{
		$registry        = Registry::allAddress();
		
		return view('registry::address.index', compact('registry'));
	}

	/**
	 * lihat Registry tertentu
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$registry        = Registry::allAddress();
		
		$registry_detail = Registry::AddressbyID($id);
	
		return view('registry::address.show', compact('registry', 'registry_detail'));
	}

	/**
	 * simpan Registry
	 *
	 * @return Response
	 */
	public function store()
	{
		$array  =   [
				'id'					=> null,
				'street'				=> 'Puri Cempaka Putih II AS 86',
				'city'					=> 'Malang',
				'province'				=> 'East Java',
				'country'				=> 'Indonesia',
				'latitude'				=> -8.0295309,
				'longitude'				=> 112.6389624,
				'houses'				=> [
					[
						'id' 			=> '123456789', 
						'name' 			=> 'Chelsy Mooy', 
					]
				],
				'offices'				=> [
					[
						'id' 			=> '123456789', 
						'name' 			=> 'Taylor Swift', 
					]
				],
			];

		$new_entity 	= Registry::buildThisAddress($array);

		Registry::saveThisAddress($new_entity);

		$array  =   [
				'id'					=> null,
				'street'				=> 'Pondok Blimbing Indah Tengah V B8 - 5',
				'city'					=> 'Malang',
				'province'				=> 'East Java',
				'country'				=> 'Indonesia',
				'latitude'				=> -7.9349887,
				'longitude'				=> 112.649662,
				'offices'				=> [
					[
						'id' 			=> '123456789', 
						'name' 			=> 'Thunderlab Indonesia', 
					]
				],
				'houses'				=> null
			];

		$new_entity 	= Registry::buildThisAddress($array);

		Registry::saveThisAddress($new_entity);
		return Redirect::route('address.index');
	}

}