<?php

namespace App\Web\Services;

//Factory
use Thunderlabid\Registry\Factory\RegistryFactory;

//Repository
use Thunderlabid\Registry\Repository\PersonRepository;
use Thunderlabid\Registry\Repository\AddressBookRepository;

//Entity
use Thunderlabid\Registry\Entity\Person as PersonEntity;

/**
 * Kelas Person
 *
 * Digunakan untuk pengajuan Person.
 *
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class Person 
{
	/**
	 * Menampilkan semua data Person
	 *
	 * @return array $build
	 */
	public static function build($array)
	{
		$data 	= new RegistryFactory();

		return $data->buildPersonFromArray($array);
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

	/**
	 * Menyimpan data person
	 *
	 * @param array $array
	 * @return Asset $asset
	 */
	public static function save($person, $address)
	{
		$registry_fact 		= new RegistryFactory;

		//check if person alredy exists
		$person_repo 		= new PersonRepository;
		if($person instanceOf Person)
		{
			$person_repo->store($person);
		}
		elseif(is_array($person))
		{
			//need to place try catch
			$person 		= $registry_fact->buildPersonFromArray((array) $person);
			$person_repo->store($person);
		}
		else
		{
			throw new Exception("Person should be an instance of Person Entity or array of person", 1);
		}

		$address_repo 		= new AddressBookRepository;
		
		//check if finance alredy exists
		if($address instanceOf AddressBook)
		{
			$address->addHouse(new Owner($person->id, $person->name));

			$address_repo->store($address);
		}
		elseif(is_array($address))
		{
			//need to place try catch
			$address['houses']	= [['id' => $person->id, 'name' => $person->name]];
			$address['offices']	= null;
			$address 			= $registry_fact->buildAddressBookFromArray((array) $address);
			$address_repo->store($address);
		}

		return self::merge_credit_detail($person, $address);
	}

	/** Private function to merge credit detail information 
	 *
	 */
	private static function merge_credit_detail($person, $address)
	{
		$person 			= new PersonProxy();

		$person->person		= $person;
		$person->address	= $address;

		return $person;
	}
}