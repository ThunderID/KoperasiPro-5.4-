<?php 

namespace Thunderlabid\Registry\Web\Controllers;

use App\Http\Controllers\Controller;
use Registry, Input, Redirect;

class PersonController extends Controller 
{
	/**
	 * lihat Registry
	 *
	 * @return Response
	 */
	public function index()
	{
		$registry        = Registry::allPerson();
		
		return view('registry::person.index', compact('registry'));
	}

	/**
	 * lihat Registry tertentu
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$registry        = Registry::allPerson();
		
		$registry_detail = Registry::PersonbyID($id);
	
		return view('registry::person.show', compact('registry', 'registry_detail'));
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
				'nik'					=> '123456789',
				'name'					=> 'C Mooy',
				'place_of_birth'		=> 'Dili',
				'date_of_birth'			=> '23 years ago',
				'gender'				=> 'female',
				'religion'				=> 'Christian',
				'highest_education'		=> 'Bachelor',
				'marital_status'		=> 'single',
				'phones'				=>  [[
												'number' => '089654562911'
											]],
				'works'					=> [
					[
						'position' 		=> 'Web Developer', 
						'area' 			=> 'IT', 
						'since' 		=> '3 years ago', 
						'office' 		=> ['id' => '123456789', 'name' => 'Thunderlab Indonesia'], 
					]
				],
				'relatives'					=> [
					[
						'relation' 		=> 'ibu', 
						'id' 			=> '234567891', 
						'name' 			=> 'Yulia Pandie', 
					]
				],
			];

		$new_entity 	= Registry::buildThisPerson($array);

		Registry::saveThisPerson($new_entity);

		return Redirect::route('person.index');
	}

}