<?php

namespace Thunderlabid\Registry\Valueobject;

use Thunderlabid\Registry\Valueobject\Interfaces\IValueObject;
use Thunderlabid\Registry\Valueobject\Traits\IValueObjectTrait;
use Exception;

class Owner implements IValueObject { 

	use IValueObjectTrait;

	private $id;
	private $name;

	//////////////////////////////////////////////////////////////////////////////////
	// Constructor 																	//
	//////////////////////////////////////////////////////////////////////////////////
	/**
	 * @param [string] $id   		[id of the owner]
	 * @param [string] $name     	[name of the owner]
	 */
	public function __construct($id, $name)
	{
		$this->id			= $id;
		$this->name			= ucwords(strtolower($name));
	}

	//////////////////////////////////////////////////////////////////////////////////
	// Mutators 																	//
	//////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////////////////////////////////////
	// Methods 																		//
	//////////////////////////////////////////////////////////////////////////////////
	public function equals($owner)
	{
		////////////////////////////////////
		// Check if the same value object //
		////////////////////////////////////
		if (!$owner instanceOf Owner)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->id	 		=== $owner->id) && 
				($this->name	 	=== $owner->name)
			)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
