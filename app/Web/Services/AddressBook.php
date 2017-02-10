<?php

namespace App\Web\Services;

//Repository
use Thunderlabid\Registry\Repository\AddressBookRepository;

//Entity
use Thunderlabid\Registry\Entity\AddressBook as AddressBookEntity;

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