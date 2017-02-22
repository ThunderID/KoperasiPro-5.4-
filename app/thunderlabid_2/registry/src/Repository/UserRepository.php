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
use Thunderlabid\Registry\Model\User as UserModel;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Registry\Valueobject\Work;
use Thunderlabid\Registry\Valueobject\Relative;
use Thunderlabid\Registry\Valueobject\Owner;
use Thunderlabid\Registry\Valueobject\Office;
use Thunderlabid\Registry\Valueobject\Access;

////////////
// Entity //
////////////
use Thunderlabid\Registry\Entity\Interfaces\IEntity;
use Thunderlabid\Registry\Entity\User;

///////////////
// Utilities //
///////////////
use Exception;
use DB;

/**
 * Repository User
 *
 * Digunakan untuk User aggregate root.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class UserRepository implements IRepository { 

	const PER_PAGE = 15;

	/**
	* Menampilkan semua data User dari database
	*
	* @param string $take, string $skip
	* @return array of object
	*/
	public static function all($take = SELF::PER_PAGE, $skip = 0)
	{
		$data = UserModel::skip($skip)
								->take($take)
								->get();

		return $data->map(function($item){
										return Static::toEntity($item);
									});
	}

	/**
	* Menampilkan data User berdasarkan id dari database
	*
	* @param string $id
	* @return User $user
	*/
	public static function findById($id)
	{
		$data = UserModel::find($id);

		return Static::toEntity($data);
	}

	/**
	* Menampilkan data User berdasarkan pencarian nama nasabah dari database
	*
	* @param string $name, $take, string $skip
	* @return array of object
	*/
	public static function FindByName($name, $take = SELF::PER_PAGE, $skip = 0)
	{
		$data = UserModel::where('owner.name', '%'.$name.'%')
					->orderBy('owner.name')
					->skip($skip)
					->take($take)
					->get();

		return $data->map(function($item){
											return Static::toEntity($item);
										});
	}

	/**
	* Menampilkan data User berdasarkan email dari database
	*
	* @param string $email
	* @return User $user
	*/
	public static function findByEmail($email)
	{
		$data = UserModel::where('email', $email)->first();
		
		if(!$data)
		{
			throw new Exception('Mail not found', 1);
		}

		return Static::toEntity($data);
	}

	/**
	* Menyimpan data User ke database
	*
	* @param IEntity $user_entity
	* @return boolean
	*/
	public static function store(IEntity $user_entity)
	{
		/////////////////////////////////////////////
		// Ensure if the entity is Customer Entity //
		/////////////////////////////////////////////
		if (!$user_entity instanceOf User)
		{
			throw new Exception("Parameter 1 must be a User Entity", 1);
		}

		/////////////////////
		//  Create User  //
		/////////////////////
		$user_model 						= UserModel::findornew($user_entity->id);

		if (!$user_model->id)
		{
			$is_new_User = true;
		}

		$user_model->email 		= $user_entity->email;
		$user_model->password 	= $user_entity->password;

		////////////////
		//   owner    //
		////////////////
		$owner					= ['id' => $user_entity->owner->id, 'name' => $user_entity->owner->name];
		$user_model->owner		= $owner;

		////////////////
		//  accesses  //
		////////////////
		$accesses				= [];
		foreach ($user_entity->accesses as $access) 
		{
			$accesses[]			= [
				'role'			=> $access->role,
				'office'		=> ['id' => $access->office->id, 'name' => $access->office->name],
			];
		}

		$user_model->accesses	= $accesses;

		///////////////////
		// Store User //
		///////////////////
		try {
			$user_model->save();
		} catch (Exception $e) {
			throw $e;
		}
		
		/////////////
		// Return  //
		/////////////
		return true;
	}

	/**
	* Menghapus data User dari database
	*
	* @param IEntity $user_entity
	* @return boolean
	*/
	public static function delete(IEntity $user_entity)
	{
		///////////////////
		// Find Customer //
		///////////////////
		if ($user_entity->id)
		{
			$user_model = UserModel::findorfail($user_entity->id);
		}

		#delete User
		$user_model->delete();
		
		////////////
		// Return //
		////////////
		return true;
	}

	/**
	* Transformasi data model ke entity
	*
	* @param Model $user_model
	* @return User $entity
	*/
	public static function toEntity(Model $user_model)
	{
		////////////////
		//   User   //
		////////////////
		//owner
		$owner 				= new Owner($user_model->owner['id'], $user_model->owner['name']);

		//accesses
		$accesses 			= [];
		foreach ($user_model->accesses as $access)
		{
			//office
			$office 		= new Office($access['office']['id'], $access['office']['name']);
			//access
			$accesses[]		= new Access($access['role'], 
										$office 
							);
		}

		////////////
		// User //
		////////////
		$user_entity 		= new User($user_model->id, 
										$user_model->email,
										$user_model->password,
										$owner,
										$accesses
							);

		///////////////////
		//  Return User  //
		///////////////////
		return $user_entity;
	}
}