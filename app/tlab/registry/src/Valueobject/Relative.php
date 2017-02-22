<?php

namespace Thunderlabid\Registry\Valueobject;

use Thunderlabid\Registry\Valueobject\Interfaces\IValueObject;
use Thunderlabid\Registry\Valueobject\Traits\IValueObjectTrait;
use Exception;

class Relative implements IValueObject { 

	use IValueObjectTrait;

	private $relation;
	private $id;
	private $name;

	//////////////////////////////////////////////////////////////////////////////////
	// Constructor 																	//
	//////////////////////////////////////////////////////////////////////////////////
	/**
	 * @param [string] $relation   		[relation]
	 * @param [string] $id     			[id]
	 * @param [string] $name 			[name]
	 */
	public function __construct($relation = null, $id, $name)
	{
		$this->relation		= ucwords(strtolower($relation));
		$this->id			= $id;
		$this->name			= ucwords(strtolower($name));
	}

	//////////////////////////////////////////////////////////////////////////////////
	// Mutators 																	//
	//////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////////////////////////////////////
	// Methods 																		//
	//////////////////////////////////////////////////////////////////////////////////
	public function equals($relative)
	{
		////////////////////////////////////
		// Check if the same value object //
		////////////////////////////////////
		if (!$relative instanceOf Relative)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->relation	=== $relative->relation) && 
				($this->id	 		=== $relative->id) && 
				($this->name		=== $relative->name)
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
