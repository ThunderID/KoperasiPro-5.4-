<?php 

namespace Thunderlabid\Registry\Web\Controllers;

use App\Http\Controllers\Controller;
use Registry, Input, Redirect, Hash;

class UserController extends Controller 
{
	/**
	 * lihat Registry
	 *
	 * @return Response
	 */
	public function index()
	{
		$registry        = Registry::allUser();

		return view('registry::user.index', compact('registry'));
	}

	/**
	 * lihat Registry tertentu
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$registry        = Registry::allUser();
		
		$registry_detail = Registry::UserbyID($id);
	
		return view('registry::user.show', compact('registry', 'registry_detail'));
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
				'email'					=> 'amah@thunderlab.id',
				'password'				=> Hash::make('TLabGo3x'),
				'owner'					=> [
					'id'		 		=> '123456789', 
					'name' 				=> 'Agil M', 
				],
				'accesses'				=> [
					[
						'role' 			=> 'Developer', 
						'office' 		=> [
							'id' 		=> '589d9c415590a800073cd078', 
							'name' 		=> 'Thunderlab Indonesia', 
						], 
					],
					[
						'role' 			=> 'Pembukuan', 
						'office' 		=> [
							'id' 		=> '589d9c415590a800073cd079', 
							'name' 		=> 'GMPKOP', 
						], 
					]
				],
			];

		$new_entity 	= Registry::buildThisUser($array);

		Registry::saveThisUser($new_entity);

		return Redirect::route('user.index');
	}

}