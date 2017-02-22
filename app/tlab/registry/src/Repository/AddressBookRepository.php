<?php

namespace Thunderlabid\Registry\Repository;

///////////////////////
// Interface & Trait //
///////////////////////
use Thunderlabid\Registry\Repository\Interfaces\IRepository;
use Thunderlabid\Registry\Repository\Traits\IRepositoryTrait;

///////////
// Model //
///////////
use Jenssegers\Mongodb\Eloquent\Model;
use Thunderlabid\Registry\Model\AddressBook as AddressBookModel;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Registry\Valueobject\LatLng;
use Thunderlabid\Registry\Valueobject\Address;
use Thunderlabid\Registry\Valueobject\Owner;
use Thunderlabid\Registry\Valueobject\Office;

////////////
// Entity //
////////////
use Thunderlabid\Registry\Entity\Interfaces\IEntity;
use Thunderlabid\Registry\Entity\AddressBook;

///////////////
// Utilities //
///////////////
use Exception;
use DB;

/**
 * Repository AddressBook
 *
 * Digunakan untuk AddressBook aggregate root.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class AddressBookRepository implements IRepository { 

	const PER_PAGE = 15;

	/**
	* Menampilkan semua data AddressBook dari database
	*
	* @param string $take, string $skip
	* @return array of object
	*/
	public static function all($take = SELF::PER_PAGE, $skip = 0)
	{
		$data = AddressBookModel::skip($skip)
								->take($take)
								->get();

		return $data->map(function($item){
										return Static::toEntity($item);
									});
	}

	/**
	* Menampilkan data AddressBook berdasarkan id dari database
	*
	* @param string $id
	* @return AddressBook $AddressBook
	*/
	public static function findById($id)
	{
		$data = AddressBookModel::find($id);

		return Static::toEntity($data);
	}

	/**
	* Menampilkan data AddressBook berdasarkan pencarian id pemilik dari rumah
	*
	* @param string $id
	* @return array of object
	*/
	public static function findByHouseOwnerID($id)
	{
		$data = AddressBookModel::where('houses.id', $id)
					->orderBy('created_at', 'desc')
					->first();

		if($data->count())
		{
			return Static::toEntity($data);
		}

		return Static::toEntity(new AddressBookModel);
	}

	/**
	* Menampilkan data AddressBook berdasarkan pencarian id kantor
	*
	* @param string $name, $take, string $skip
	* @return array of object
	*/
	public static function fndByOfficeID($name, $take = SELF::PER_PAGE, $skip = 0)
	{
		$data = AddressBookModel::where('offices.id', $name)
					->orderBy('offices.id')
					->skip($skip)
					->take($take)
					->get();

		return $data->map(function($item){
					return Static::toEntity($item);
				});
	}

	/**
	* Menampilkan data AddressBook berdasarkan pencarian name pemilik dari rumah
	*
	* @param string $name, $take, string $skip
	* @return array of object
	*/
	public static function findByHouseOwnerName($name, $take = SELF::PER_PAGE, $skip = 0)
	{
		$data = AddressBookModel::where('houses.name', 'like', '%'.$name.'%')
					->orderBy('houses.name')
					->skip($skip)
					->take($take)
					->get();

		return $data->map(function($item){
					return Static::toEntity($item);
				});
	}

	/**
	* Menampilkan data AddressBook berdasarkan pencarian name kantor
	*
	* @param string $name, $take, string $skip
	* @return array of object
	*/
	public static function findByOfficeName($name, $take = SELF::PER_PAGE, $skip = 0)
	{
		$data = AddressBookModel::where('offices.name', 'like', '%'.$name.'%')
					->orderBy('offices.name')
					->skip($skip)
					->take($take)
					->get();

		return $data->map(function($item){
					return Static::toEntity($item);
				});
	}

	/**
	* Menyimpan data AddressBook ke database
	*
	* @param IEntity $address_book_entity
	* @return boolean
	*/
	public static function store(IEntity $address_book_entity)
	{
		/////////////////////////////////////////////
		// Ensure if the entity is Customer Entity //
		/////////////////////////////////////////////
		if (!$address_book_entity instanceOf AddressBook)
		{
			throw new Exception("Parameter 1 must be a AddressBook Entity", 1);
		}

		/////////////////////
		//  Create AddressBook  //
		/////////////////////
		$address_book_model 					= AddressBookModel::findornew($address_book_entity->id);
		if (!$address_book_model->id)
		{
			$is_new_AddressBook = true;
		}

		$address_book_model->street 			= $address_book_entity->address->street;
		$address_book_model->city 				= $address_book_entity->address->city;
		$address_book_model->province 			= $address_book_entity->address->province;
		$address_book_model->country 			= $address_book_entity->address->country;
		$address_book_model->latitude			= $address_book_entity->address->latlng->latitude;
		$address_book_model->longitude			= $address_book_entity->address->latlng->longitude;

		////////////
		// houses //
		////////////
		try
		{
			$houses				= [];
			foreach ($address_book_entity->houses as $house) 
			{
				$houses[]			= [
					'id'			=> $house->id,
					'name'			=> $house->name,
				];
			}
	
			$address_book_model->houses	= $houses;
		}
		catch(Exception $e){}


		/////////////
		// offices //
		/////////////
		try
		{
			$offices				= [];
			foreach ($address_book_entity->offices as $office) 
			{
				$offices[]			= [
					'id'			=> $office->id,
					'name'			=> $office->name,
				];
			}

			$address_book_model->offices	= $offices;
		}
		catch(Exception $e){}

		///////////////////////
		// Store AddressBook //
		///////////////////////
		try {
			$address_book_model->save();
		} catch (Exception $e) {
			throw $e;
		}
		
		/////////////
		// Return  //
		/////////////
		return true;
	}

	/**
	* Menghapus data AddressBook dari database
	*
	* @param IEntity $address_book_entity
	* @return boolean
	*/
	public static function delete(IEntity $address_book_entity)
	{
		///////////////////
		// Find Customer //
		///////////////////
		if ($address_book_entity->id)
		{
			$address_book_model = AddressBookModel::findorfail($address_book_entity->id);
		}

		#delete AddressBook
		$address_book_model->delete();
		
		////////////
		// Return //
		////////////
		return true;
	}

	/**
	* Transformasi data model ke entity
	*
	* @param Model $address_book_model
	* @return AddressBook $entity
	*/
	public static function toEntity(Model $address_book_model)
	{
		/////////////////////
		//   AddressBook   //
		/////////////////////

		//houses
		$houses 		= [];
		foreach ((array)$address_book_model->houses as $house)
		{
			$houses[]	= new Owner($house['id'], 
									$house['name']
							);
		}

		//offices
		$offices 		= [];
		foreach ((array)$address_book_model->offices as $office)
		{
			$offices[]	= new Office($office['id'], 
									$office['name']
							);
		}

		//address
		$address 		= new Address($address_book_model->street,
										$address_book_model->city,
										$address_book_model->province,
										$address_book_model->country,
										new LatLng($address_book_model->latitude, $address_book_model->longitude)
							);

		$addr_book_entity 	= new AddressBook($address_book_model->id, 
											$houses,
											$offices,
											$address
							);

		////////////////////////
		// Return AddressBook //
		////////////////////////
		return $addr_book_entity;
	}
}