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
use Thunderlabid\Registry\Model\Person as PersonModel;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Registry\Valueobject\Work;
use Thunderlabid\Registry\Valueobject\Phone;
use Thunderlabid\Registry\Valueobject\Office;
use Thunderlabid\Registry\Valueobject\Relative;

////////////
// Entity //
////////////
use Thunderlabid\Registry\Entity\Interfaces\IEntity;
use Thunderlabid\Registry\Entity\Person;

///////////////
// Utilities //
///////////////
use Exception;
use DB;

/**
 * Repository Person
 *
 * Digunakan untuk person aggregate root.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class PersonRepository implements IRepository { 

	const PER_PAGE = 15;

	/**
	* Menampilkan semua data person dari database
	*
	* @param string $take, string $skip
	* @return array of object
	*/
	public static function all($take = SELF::PER_PAGE, $skip = 0)
	{
		$data = PersonModel::skip($skip)
								->take($take)
								->get();

		return $data->map(function($item){
										return Static::toEntity($item);
									});
	}

	/**
	* Menampilkan data person berdasarkan id dari database
	*
	* @param string $id
	* @return Person $person
	*/
	public static function findById($id)
	{
		$data = PersonModel::find($id);

		return Static::toEntity($data);
	}

	/**
	* Menampilkan data person berdasarkan pencarian nama nasabah dari database
	*
	* @param string $name, $take, string $skip
	* @return array of object
	*/
	public static function FindByName($name, $take = SELF::PER_PAGE, $skip = 0)
	{
		$data = PersonModel::where('name', 'like', '%'.$name.'%')
					->orderBy('name')
					->skip($skip)
					->take($take)
					->get();

		return $data->map(function($item){
											return Static::toEntity($item);
										});
	}

	/**
	* Menyimpan data person ke database
	*
	* @param IEntity $person_entity
	* @return boolean
	*/
	public static function store(IEntity $person_entity)
	{
		/////////////////////////////////////////////
		// Ensure if the entity is Customer Entity //
		/////////////////////////////////////////////
		if (!$person_entity instanceOf Person)
		{
			throw new Exception("Parameter 1 must be a person Entity", 1);
		}

		/////////////////////
		//  Create person  //
		/////////////////////
		$person_model 						= PersonModel::findornew($person_entity->id);
		if (!$person_model->id)
		{
			$is_new_person = true;
		}

		$person_model->_id 					= $person_entity->id;
		$person_model->nik 					= $person_entity->nik;
		$person_model->name 				= $person_entity->name;
		$person_model->place_of_birth 		= $person_entity->place_of_birth;
		$person_model->date_of_birth 		= $person_entity->date_of_birth->format("Y-m-d");
		$person_model->gender 				= $person_entity->gender;
		$person_model->religion 			= $person_entity->religion;
		$person_model->highest_education	= $person_entity->highest_education;
		$person_model->marital_status		= $person_entity->marital_status;
		
		////////////////
		//   phones   //
		////////////////
		$phones					= [];
		foreach ((array)$person_entity->phones as $phone) 
		{
			$phones[]			= [
				'number'		=> $phone->number,
			];
		}
		$person_model->phones	= $phones;

		////////////////
		//   works    //
		////////////////
		$works					= [];
		foreach ((array)$person_entity->works as $work) 
		{
			$works[]			= [
				'position'		=> $work->position,
				'area'			=> $work->area,
				'since'			=> $work->since->format('Y-m-d'),
				'office'		=> ['id' => $work->office->id, 'name' => $work->office->name]
			];
		}
		$person_model->works	= $works;

		////////////////
		//  relatives //
		////////////////
		$relatives					= [];
		foreach ((array)$person_entity->relatives as $relative) 
		{
			$relatives[]			= [
				'relation'		=> $relative->relation,
				'id'			=> $relative->id,
				'name'			=> $relative->name,
			];
		}
		$person_model->relatives	= $relatives;
		
		///////////////////
		// Store person //
		///////////////////
		try {
			$person_model->save();
		} catch (Exception $e) {
			throw $e;
		}

		/////////////
		// Return  //
		/////////////
		return true;
	}

	/**
	* Menghapus data person dari database
	*
	* @param IEntity $person_entity
	* @return boolean
	*/
	public static function delete(IEntity $person_entity)
	{
		///////////////////
		// Find Customer //
		///////////////////
		if ($person_entity->id)
		{
			$person_model = PersonModel::findorfail($person_entity->id);
		}

		#delete person
		$person_model->delete();
		
		////////////
		// Return //
		////////////
		return true;
	}

	/**
	* Transformasi data model ke entity
	*
	* @param Model $person_model
	* @return Person $entity
	*/
	public static function toEntity(Model $person_model)
	{
		////////////////
		//   person   //
		////////////////
		//phones
		$phones 			= [];
		foreach ((array)$person_model->phones as $phone)
		{
			$phones[] 		= new Phone($phone['number']);
		}

		//works
		$works 				= [];
		foreach ((array)$person_model->works as $work)
		{
			$office 		= new Office($work['office']['id'], $work['office']['name']);

			//work
			$works[]		= new Work($work['position'], 
									$work['area'], 
									$work['since'],
									$office
							);
		}

		//relatives
		$relatives 			= [];
		foreach ((array)$person_model->relatives as $relative)
		{
			//relative
			$relatives[]	= new Relative($relative['relation'], 
										$relative['id'], 
										$relative['name']
							);
		}

		////////////
		// Person //
		////////////
		$person_entity 		= new Person($person_model->_id, 
										$person_model->nik,
										$person_model->name,
										$person_model->place_of_birth,
										$person_model->date_of_birth,
										$person_model->gender,
										$person_model->religion,
										$person_model->highest_education,
										$person_model->marital_status,
										$phones,
										$works,
										$relatives
							);

		///////////////////
		// Return Person //
		///////////////////
		return $person_entity;
	}
}