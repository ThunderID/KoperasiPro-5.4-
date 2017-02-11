<?php

namespace App\Web\Services;

//Repository
use Thunderlabid\Registry\Repository\AddressBookRepository;

//Factory
use Thunderlabid\Registry\Factory\RegistryFactory;

//Entity
use Thunderlabid\Registry\Entity\AddressBook as AddressBookEntity;

//ValueObject
use Thunderlabid\Registry\Valueobject\Owner;
use Thunderlabid\Registry\Valueobject\Office;

/**
 * Kelas AddressBook
 *
 * Digunakan untuk pengajuan AddressBook.
 *
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class AddressBook 
{
	/**
	 * Menampilkan semua data AddressBook
	 *
	 * @return array $all
	 */
	public static function all()
	{
		$data 	= new AddressBookRepository();

		return $data->all();
	}

	/**
	 * Menampilkan semua data AddressBook berdasarkan pencarian nama
	 *
	 * @return array $all
	 */
	public static function findByOwnerID($status, $id)
	{
		$data 	= new AddressBookRepository();

		if(str_is($status, 'office'))
		{
			return $data->findByOfficeID($id);
		}

		return $data->findByHouseOwnerID($id);
	}

	/**
	 * Menampilkan semua data AddressBook berdasarkan pencarian nama
	 *
	 * @return array $all
	 */
	public static function findByOwnerName($status, $name)
	{
		$data 	= new AddressBookRepository();

		if(str_is($status, 'office'))
		{
			return $data->findByOfficeName($name);
		}

		return $data->findByHouseOwnerName($name);
	}

	/**
	 * Membuat object asset baru dari data array
	 *
	 * @param array $array
	 * @return Asset $asset
	 */
	public static function save($address, $owner)
	{
		//check if address already exists
		$address_repo 		= new AddressBookRepository;
		if($address instanceOf AddressBook)
		{
			$address_repo->store($address);
		}
		elseif(is_array($address))
		{
			//need to place try catch
			$registry_fact 	= new RegistryFactory;
			$address 		= $registry_fact->buildAddressBookFromArray((array) $address);
			$address_repo->store($address);
		}
		else
		{
			throw new Exception("Address should be an instance of Address Entity or array of address", 1);
		}

		//check if owner alredy exists
		if($owner instanceOf Owner)
		{
			$address->addHouse($owner);
			$address_repo->store($address);
		}
		if($owner instanceOf Office)
		{
			$address->addOffice($owner);
			$address_repo->store($address);
		}
	
		return $address;
	}

	/**
	 * Menampilkan jenis kepemilikan alamat
	 *
	 * @return array $nav
	 */
	public static function addressLists()
	{
		return 	[
					'rumah' 		=> 'Rumah',
					'kantor' 		=> 'Kantor'
				]; 
	}
}