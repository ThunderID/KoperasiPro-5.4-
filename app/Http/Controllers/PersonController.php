<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Web\Services\Person;
use Input;

/**
 * Kelas PersonController
 *
 * Digunakan untuk semua data Person.
 *
 * @author     Chelsy M <chelsy@thunderlab.id>
 */
class PersonController extends Controller
{
	/**
	 * Creates construct from controller to get instate some stuffs
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * simpan data Person tertentu
	 *
	 * @param string $id
	 * @return Response
	 */
	public function store()
	{
		//get input
		$person     = Input::only('person');
		$address    = Input::only('address');

		//here
		$person  =   [
				'id'					=> '1280651E-D780-48C6-8857-68A401F7D901',
				'nik'					=> '123456789',
				'name'					=> 'Annita Li',
				'place_of_birth'		=> 'Dili',
				'date_of_birth'			=> '23 years ago',
				'gender'				=> 'female',
				'religion'				=> 'Christian',
				'highest_education'		=> 'Bachelor',
				'marital_status'		=> 'single',
				'phone_number'			=> '089654562911',
				'works'					=> [
					[
						'position' 		=> 'Web Developer', 
						'area' 			=> 'IT', 
						'since' 		=> '3 years ago', 
						'office' 		=> ['id' => '589d9c415590a800073cd078', 'name' => 'Thunderlab Indonesia'], 
					]
				],
				'relatives'				=> [
					[
						'relation' 		=> 'ibu', 
						'id' 			=> '897daec75590a8000818784e', 
						'name' 			=> 'Lolita Li', 
					]
				],
				'phones'				=> [
					[
						'number' 		=> '089654592911', 
					]
				],
			];

		$address  =   [
				'id'					=> null,
				'street'				=> 'Puri Cempaka Putih II AS 86',
				'city'					=> 'Malang',
				'province'				=> 'East Java',
				'country'				=> 'Indonesia',
				'latitude'				=> -8.0295309,
				'longitude'				=> 112.6389624,
			];
		//store all data that shaped an entity
		$address    = Person::save($person, $address);

		//function from parent to redirecting
		return $this->generateRedirect(route('person.index'));
	}
}

