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
use Thunderlabid\Registry\Model\Personality as PersonalityModel;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Registry\Valueobject\Owner;

////////////
// Entity //
////////////
use Thunderlabid\Registry\Entity\Interfaces\IEntity;
use Thunderlabid\Registry\Entity\Personality;

///////////////
// Utilities //
///////////////
use Exception;
use DB;

/**
 * Repository Personality
 *
 * Digunakan untuk personality aggregate root.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class PersonalityRepository implements IRepository { 

	const PER_PAGE = 15;

	/**
	* Menampilkan semua data personality dari database
	*
	* @param string $take, string $skip
	* @return array of object
	*/
	public static function all($take = SELF::PER_PAGE, $skip = 0)
	{
		$data = PersonalityModel::skip($skip)
								->take($take)
								->get();

		return $data->map(function($item){
										return Static::toEntity($item);
									});
	}

	/**
	* Menampilkan data personality berdasarkan id dari database
	*
	* @param string $id
	* @return Personality $personality
	*/
	public static function findById($id)
	{
		$data = PersonalityModel::find($id);

		return Static::toEntity($data);
	}

	/**
	* Menampilkan data personality berdasarkan pencarian nama nasabah dari database
	*
	* @param string $name, $take, string $skip
	* @return array of object
	*/
	public static function FindByName($name, $take = SELF::PER_PAGE, $skip = 0)
	{
		$data = PersonalityModel::where('owner.name', 'like', '%'.$name.'%')
					->orderBy('owner.name')
					->skip($skip)
					->take($take)
					->get();

		return $data->map(function($item){
											return Static::toEntity($item);
										});
	}

	/**
	* Menampilkan data Personality berdasarkan pencarian id pemilik kepribadian
	*
	* @param string $id
	* @return array of object
	*/
	public static function FindByOwnerID($id)
	{
		$data = PersonalityModel::where('owner.id', $id)->orderBy('created_at', 'desc')
					->first();

		if($data->count())
		{
			return Static::toEntity($data);
		}

		return Static::toEntity(new PersonalityModel);
	}

	/**
	* Menyimpan data personality ke database
	*
	* @param IEntity $personality_entity
	* @return boolean
	*/
	public static function store(IEntity $personality_entity)
	{
		/////////////////////////////////////////////
		// Ensure if the entity is Customer Entity //
		/////////////////////////////////////////////
		if (!$personality_entity instanceOf Personality)
		{
			throw new Exception("Parameter 1 must be a personality Entity", 1);
		}

		/////////////////////
		//  Create personality  //
		/////////////////////
		$personality_model 				= PersonalityModel::findornew($personality_entity->id);
		if (!$personality_model->id)
		{
			$is_new_personality = true;
		}

		$personality_model->_id 		= $personality_entity->id;
		$personality_model->owner 		= [
				'id' 					=> $personality_entity->owner->id, 
				'name' 					=> $personality_entity->owner->name
		];
		$personality_model->residence	= $personality_entity->residence;
		$personality_model->workplace	= $personality_entity->workplace;
		$personality_model->character	= $personality_entity->character;
		$personality_model->lifestyle	= $personality_entity->lifestyle;
		$personality_model->notes		= $personality_entity->notes;
		
		///////////////////////
		// Store personality //
		///////////////////////
		try {
			$personality_model->save();
		} catch (Exception $e) {
			throw $e;
		}
		
		/////////////
		// Return  //
		/////////////
		return true;
	}

	/**
	* Menghapus data personality dari database
	*
	* @param IEntity $personality_entity
	* @return boolean
	*/
	public static function delete(IEntity $personality_entity)
	{
		///////////////////
		// Find Customer //
		///////////////////
		if ($personality_entity->id)
		{
			$personality_model = PersonalityModel::findorfail($personality_entity->id);
		}

		#delete personality
		$personality_model->delete();
		
		////////////
		// Return //
		////////////
		return true;
	}

	/**
	* Transformasi data model ke entity
	*
	* @param Model $personality_model
	* @return Personality $entity
	*/
	public static function toEntity(Model $personality_model)
	{
		/////////////////
		// personality //
		/////////////////
		//owner
		$owner 				= new Owner($personality_model->owner['id'], $personality_model->owner['name']);

		/////////////////
		// Personality //
		/////////////////
		$personality_entity	= new Personality($personality_model->_id, 
										$owner,
										$personality_model->residence,
										$personality_model->workplace,
										$personality_model->character,
										$personality_model->lifestyle,
										$personality_model->notes
							);

		///////////////////
		// Return Personality //
		///////////////////
		return $personality_entity;
	}
}