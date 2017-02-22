<?php 

namespace Thunderlabid\Registry\Web\Controllers;

use App\Http\Controllers\Controller;
use Registry, Input, Redirect, Hash;

class PersonalityController extends Controller 
{
	/**
	 * lihat Registry
	 *
	 * @return Response
	 */
	public function index()
	{
		$registry        = Registry::allPersonality();

		return view('registry::personality.index', compact('registry'));
	}

	/**
	 * lihat Registry tertentu
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$registry        = Registry::allPersonality();
		
		$registry_detail = Registry::PersonalitybyID($id);
	
		return view('registry::personality.show', compact('registry', 'registry_detail'));
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
				'owner'					=> [
					'id'		 		=> 'EFF579A4-5324-49BD-8EE3-56A2186B91AC', 
					'name' 				=> 'Agatha Christie', 
				],
				'residence'				=> [
					'acquinted'		 	=> 'dikenal', 
				],
				'workplace'				=> [
					'acquinted'		 	=> 'dikenal', 
				],
				'character'				=> 'baik',
				'lifestyle'				=> 'mewah',
				'notes'					=> [
					[
						'description' 	=> 'A lil bit introverted', 
					],
				],
			];

		$new_entity 	= Registry::buildThisPersonality($array);

		Registry::saveThisPersonality($new_entity);

		return Redirect::route('personality.index');
	}

}