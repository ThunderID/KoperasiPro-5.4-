<?php

namespace Thunderlabid\Credit\Valueobject;

use Thunderlabid\Credit\Valueobject\Interfaces\IValueObject;
use Thunderlabid\Credit\Valueobject\Traits\IValueObjectTrait;
use Exception;

class Office implements IValueObject { 

	use IValueObjectTrait;

	private $id;
	private $name;

	//////////////////////////////////////////////////////////////////////////////////
	// Constructor 																	//
	//////////////////////////////////////////////////////////////////////////////////
	/**
	 * @param [string] $id   		[id of the Office]
	 * @param [string] $name     	[name of the Office]
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
	public function equals($office)
	{
		////////////////////////////////////
		// Check if the same value object //
		////////////////////////////////////
		if (!$office instanceOf Office)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->id	 		=== $office->id) && 
				($this->name	 	=== $office->name)
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
