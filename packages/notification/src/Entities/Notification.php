<?php

namespace Thunderlabid\Notification\Entities;

/////////////
// Entity  //
/////////////
use Thunderlabid\Notification\Entities\Interfaces\IEntity;
use Thunderlabid\Notification\Entities\Traits\IEntityTrait;

//////////////
// Utilitis //
//////////////
use Carbon\Carbon;
use Exception, Validator;
use \Illuminate\Support\Collection;

/**
 * Entity Notification
 *
 * Digunakan untuk menyimpan data Notification.
 *
 * @package    Thunderlabid
 * @subpackage Notification
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Notification implements IEntity 
{ 
	use IEntityTrait;

	public $policies 	= 	[];
	/**
	 * Constructor
	 * 
	 * @param string $id
	 * @param string $description
	 * @param string $when 
	 * @param string $link
	 * @param string $office 
	 */
	public function __construct($id, $description, $when, $link, $office)
	{
		if(!$id)
		{
			$this->attributes['id'] 			= $this->createID();
			$this->description 					= $description;
			$this->when 						= Carbon::parse($when);
			$this->link 						= $link;
			$this->office 						= $office;
		}
		else
		{
			$this->attributes['id'] 			= $id;
			$this->attributes['description'] 	= $description;
			$this->attributes['when'] 			= $when;
			$this->attributes['link'] 			= $link;
			$this->attributes['office'] 		= $office;
		}
	}

	/**
	 * mengubah attribute role
	 * @param string $description
	 */
 	public function changeDescription($description)
	{
		$this->description 		= $description;
	}
	
	/**
	 * construct set attribute Description
	 * @param string $description
	 */
	private function setDescriptionAttribute($description)
	{
		//////////////
		// Validate //
		//////////////
		// $validator 	= Validator::make(['role' => $description], ['role' => 'string']);
		// if ($validator->fails())
		// {
		// 	throw new Exception($validator->messages(), 1);
		// }

		$this->attributes['description'] 		= $description;
	}
}