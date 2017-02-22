<?php

namespace App\Web\Services;

//Factory
use Thunderlabid\Registry\Factory\RegistryFactory;

//Repository
use Thunderlabid\Registry\Repository\PersonRepository;
use Thunderlabid\Registry\Repository\AddressBookRepository;

//Entity
use Thunderlabid\Registry\Entity\Person as PersonEntity;
use Thunderlabid\Registry\Entity\AddressBook as AddressEntity;

/**
 * Kelas Person
 *
 * Digunakan untuk pengajuan Person.
 *
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Person extends baseService
{
	/**
	 * Creates construct from services to get instate some stuffs
	 */
	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * Menampilkan semua data Person
	 *
	 * @return array $array
	 */
	public static function store($array)
	{
		$data 				= new RegistryFactory;
		$data 				= $data->buildPersonFromArray($array);

		$person_repo 		= new PersonRepository;
		$person_entity 		= $person_repo->store($data);

		return $data;
	}

	/**
	 * Update Object
	 *
	 * @return array $all
	 */
	public function update($type, $array, PersonEntity $person)
	{
		switch (strtolower($type)) 
		{
			case 'alamat':
				if(!isset($array['id']))
				{
					$array['id']			= null;
				}
				$array['houses'][0]['id']	= $person->id;
				$array['houses'][0]['name']	= $person->name;

				$array['offices']			= null;

				$address 					= new RegistryFactory;
				$address 					= $address->buildAddressBookFromArray($array);

				$address_repo 				= new AddressBookRepository;
				$address_repo->store($address);			
			break;
		}

		$person_repo 						= new PersonRepository;
		$person_repo->store($person);

		return $person_repo;
	}


	public static function findByID($id)
	{

		$person				= new \Stdclass;
		
		$person_repo 		= new PersonRepository();
		$person->person 	= $person_repo->findByID($id);

		$address_repo 		= new AddressBookRepository();
		$person->address 	= $address_repo->findByHouseOwnerID($id);

		return $person;
	}

	/**
	 * Menampilkan semua data Person
	 *
	 * @return array $all
	 */
	public static function all()
	{
		$data 	= new PersonRepository();

		return $data->all();
	}


	/**
	 * Menampilkan semua data Person berdasarkan nama
	 *
	 * @return array $all
	 */
	public static function findByName($name)
	{
		$data 	= new PersonRepository();

		return $data->findByName($name);
	}
}