<?php

namespace Thunderlabid\Registry\Entity;

/////////////////
// Valueobject //
/////////////////
use Thunderlabid\Registry\Valueobject\IDR;
use Thunderlabid\Registry\Valueobject\Owner;
use Thunderlabid\Registry\Valueobject\Access as AccessVO;

/////////////
// Entity  //
/////////////
use Thunderlabid\Registry\Entity\Interfaces\IEntity;
use Thunderlabid\Registry\Entity\Traits\IEntityTrait;

////////////////////
// Aggregate root //
////////////////////
use Thunderlabid\Registry\Entity\Interfaces\IAggregateRoot;
use Thunderlabid\Registry\Entity\Traits\IAggregateRootTrait;

//////////////
// Utilitis //
//////////////
use Carbon\Carbon;
use Exception, Validator, Hash;
use \Illuminate\Support\Collection;

/**
 * Entity Registry
 *
 * Digunakan untuk menyimpan data Registry.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
class User implements IEntity, IAggregateRoot 
{ 
	use IAggregateRootTrait, IEntityTrait;

	/**
	 * Constructor
	 * 
	 * @param string $id
	 * @param string $email
	 * @param string $password
	 * @param array $owner 
	 * @param array $accesses 
	 */
	public function __construct($id = null, $email = null, $password = null, $owner = [], $accesses = [])
	{
		if (!$id)
		{
			$this->attributes['id'] = $this->guid();
		}
		else
		{
			$this->attributes['id'] = $id;
		}

		////////////////////
		// Set attributes //
		////////////////////

		$this->email 		= $email;
		$this->password 	= $password;

		#owner
		if ($owner instanceOf Owner)
		{
			$this->addOwner($owner);
		}

		#accesses
		if (isset($accesses[0]))
		{
			foreach ($accesses as $accesses)
			{
				$this->addAccess($accesses);
			}
		}
		elseif(!empty($accesses))
		{
			$this->addAccess($accesses);
		}


		//////////////////
		// Set Original //
		//////////////////
		$this->original_attributes = $this->attributes;
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
		$this->attributes['email'] = $email;
	}

	/**
	 * mengubah attribute password
	 * @param string $password
	 */
 	public function changePassword($password)
	{
		$this->password 		= $password;
	}
	
	/**
	 * construct set attribute password
	 * @param string $password
	 */
	private function setPasswordAttribute($password)
	{
		//////////////
		// Validate //
		//////////////
		$validator 	= Validator::make(['password' => $password], ['password' => 'string']);
		if ($validator->fails())
		{
			throw new Exception($validator->messages(), 1);
		}

		//make sure here should be checking the unique number

		/////////
		// Set //
		/////////
		//check rehashed
		if(Hash::needsrehash($password))
		{
			$password 				= Hash::make($password);
		}

		$this->attributes['password'] = $password;
	}

	/**
	 * [addOwner description]
	 * @param Owner $owner 	[description]
	 * @return [boolean]    [true if success, exception if fail]
	 */
	public function addOwner(Owner $owner)
	{
		$this->attributes['owner'] 	= $owner;

		return true;
	}

	/**
	 * [removeOwner description]
	 * @param  Owner $owner [description]
	 * @return [boolean]    [true if success, exception if fail]
	 */
	public function removeOwner(Owner $owner)
	{
		unset($this->attributes['owner']);

		return false;
	}

	/**
	 * [addAccess description]
	 * @param AccessVO		$access [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function addAccess(AccessVO $access)
	{
		$isInList = false;

		/////////////////////////////////////////////////////
		// Check if current Credit is already in the list //
		/////////////////////////////////////////////////////
		if (array_key_exists('accesses', $this->attributes) && is_array($this->attributes['accesses']))
		{
			foreach ($this->attributes['accesses'] as $key => $value)
			{
				if ($value->equals($access))
				{
					$isInList = true;
				}
			}
		}
		else
		{
			$this->attributes['accesses'] = [];
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
			$this->attributes['accesses'][] = $access;
			return true;
		}
	}

	/**
	 * [removeAccess description]
	 * @param  AccessVO 	$access [description]
	 * @return [boolean]	[true if success, exception if fail]
	 */
	public function removeAccess(AccessVO $access)
	{
		$isInList 			= false;

		/////////////////////////////
		// Remove matching Credit //
		/////////////////////////////
		foreach ($this->attributes['accesses'] as $key => $value)
		{
			if ($value->equals($access))
			{
				$isInList 	= true;
				unset($this->attributes['accesses'][$key]);
				return true;
			}
		}

		///////////////////////////////////
		// If not found return exception //
		///////////////////////////////////
		if (!$isInList)
		{
			throw new Exception("Fail to remove Access. Not found");
			return false;
		}
	}
}