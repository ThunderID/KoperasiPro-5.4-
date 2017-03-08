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
use Exception, Validator;
use \Illuminate\Support\Collection;

/**
 * Entity Visa
 *
 * Digunakan untuk menyimpan data Visa.
 *
 * @package    Thunderlabid
 * @subpackage Immigration
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Visa implements IEntity 
{ 
	use IEntityTrait;

	public $policies 	= 	[];
	/**
	 * Constructor
	 * 
	 * @param string $visaId
	 * @param string $userId
	 * @param string $officeId 
	 * @param string $officeName
	 * @param string $role 
	 */
	public function __construct($visaId, $userId, $officeId, $officeName, $role = null)
	{
		$this->attributes['user_id'] 		= $userId;
		$this->attributes['office']['id'] 	= $officeId;
		$this->attributes['office']['name'] = $officeName;

		if(!$visaId)
		{
			$this->attributes['id'] 			= $this->createID();
			$this->role 						= $role;
		}
		else
		{
			$this->attributes['id'] 			= $visaId;
			$this->attributes['role'] 			= $role;
		}
	}

	/**
	 * mengubah attribute role
	 * @param string $role
	 */
 	public function changeRole($role)
	{
		$this->role 		= $role;
	}
	
	/**
	 * construct set attribute role
	 * @param string $role
	 */
	private function setRoleAttribute($role)
	{
		//////////////
		// Validate //
		//////////////
		// $validator 	= Validator::make(['role' => $role], ['role' => 'string']);
		// if ($validator->fails())
		// {
		// 	throw new Exception($validator->messages(), 1);
		// }

		$this->attributes['role'] = $role;
	}
}