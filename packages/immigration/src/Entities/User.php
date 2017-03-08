<?php

namespace Thunderlabid\Immigration\Entities;

//////////////////
// Valueobject  //
//////////////////
use Thunderlabid\Immigration\Valueobjects\VisaId;
use Thunderlabid\Immigration\Valueobjects\UserId;

/////////////
// Entity  //
/////////////
use Thunderlabid\Immigration\Entities\Interfaces\IEntity;
use Thunderlabid\Immigration\Entities\Traits\IEntityTrait;

//////////////
// Utilitis //
//////////////
use Carbon\Carbon;
use Exception, Validator, Hash;
use \Illuminate\Support\Collection;

/**
 * Entity User
 *
 * Digunakan untuk menyimpan data User.
 *
 * @package    Thunderlabid
 * @subpackage Immigration
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class User implements IEntity 
{ 
	use IEntityTrait;

	public $policies 	= 	[
								'name' 		=> [	
													'\Thunderlabid\Immigration\Entities\Policies\RequiredPolicy:',
													'\Thunderlabid\Immigration\Entities\Policies\StringPolicy:',
												],
							];

	/**
	 * Constructor
	 * 
	 * @param string $userId
	 * @param string $email 
	 * @param string $password
	 * @param string $name 
	 */
	public function __construct($userId, $email, $password, $name, $visas)
	{
		if(!$userId)
		{
			$this->attributes['id'] 			= $this->createID();
			$this->email 						= $email;
			$this->password 					= $password;
			$this->name 						= $name;
			$this->attributes['visas'] 			= [];

			foreach ((array)$visas as $key => $value) 
			{
				$this->addVisa($value);
			}
		}
		else
		{
			$this->attributes['id'] 			= $userId;
			$this->attributes['email'] 			= $email;
			$this->attributes['password'] 		= $password;
			$this->attributes['name'] 			= $name;
			$this->attributes['visas'] 			= $visas;
		}
	}

	/**
	 * mengubah attribute email
	 * @param string $email
	 */
 	public function changeEmail($email)
	{
		$this->email 	= $email;
	}
	
	/**
	 * construct set attribute email
	 * @param string $email
	 */
	private function setEmailAttribute($email)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['email' => $email], ['email' => 'email']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		//make sure here should be checking the unique number

		/////////
		// Set //
		/////////
		$this->attributes['email'] 		= $email;
	}

	/**
	 * mengubah attribute password
	 * @param string $password
	 */
 	public function changePassword($password)
	{
		$this->password 				= $password;
	}
	
	/**
	 * construct set attribute password
	 * @param string $password
	 */
	private function setPasswordAttribute($password)
	{
		/////////
		// Set //
		/////////
		
		//check rehash
		if(Hash::needsrehash($password))
		{
			$password 					= Hash::make($password);
		}

		$this->attributes['password'] 	= $password;
	}
	
	/**
	 * construct set attribute name
	 * @param string $name
	 */
	private function setNameAttribute($name)
	{
		$this->attributes['name'] 		= $name;
	}

	/**
	 * [addVisa description]
	 * @param Visa			$visa [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addVisa(Visa $visa)
	{
		$isInList = false;

		/////////////////////////////////////////////////////
		// Check if current Credit is already in the list //
		/////////////////////////////////////////////////////
		if (array_key_exists('visas', $this->attributes) && is_array($this->attributes['visas']))
		{
			foreach ($this->attributes['visas'] as $key => $value)
			{
				if ($value->equals($visa))
				{
					$isInList = true;
				}
			}
		}
		else
		{
			$this->attributes['visas'] = [];
			$isInList = false;
		}

		////////////////////////////////////////////////////
		// If not in list then add, otherwise return fail //
		////////////////////////////////////////////////////
		if ($isInList)
		{
			return false;
		}
		else
		{
			$this->attributes['visas'][] = $visa;
			return true;
		}
	}

	/**
	 * [removeVisa description]
	 * @param  Visa 		$visa [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function removeVisa($visaId)
	{
		$isInList 			= false;

		/////////////////////////////
		// Remove matching Credit //
		/////////////////////////////
		foreach ($this->attributes['visas'] as $key => $value)
		{
			if (str_is($value->id, $visaId))
			{
				$isInList 	= true;
				unset($this->attributes['visas'][$key]);
				return true;
			}
		}

		///////////////////////////////////
		// If not found return exception //
		///////////////////////////////////
		if (!$isInList)
		{
			throw new Exception("Fail to remove visa. Not found");
			return false;
		}
	}
}