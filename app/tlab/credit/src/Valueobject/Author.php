<?php

namespace Thunderlabid\Credit\Valueobject;

use Thunderlabid\Credit\Valueobject\Interfaces\IValueObject;
use Thunderlabid\Credit\Valueobject\Traits\IValueObjectTrait;
use Exception;

class Author implements IValueObject { 

	use IValueObjectTrait;

	private $id;
	private $name;
	private $role;

	//////////////////////////////////////////////////////////////////////////////////
	// Constructor 																	//
	//////////////////////////////////////////////////////////////////////////////////
	/**
	 * @param [string] $id   		[id of the Author]
	 * @param [string] $name     	[name of the Author]
	 * @param [string] $role     	[role of the Author]
	 */
	public function __construct($id, $name, $role)
	{
		$this->id			= $id;
		$this->name			= ucwords(strtolower($name));
		$this->role			= ucwords(strtolower($role));
	}

	//////////////////////////////////////////////////////////////////////////////////
	// Mutators 																	//
	//////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////////////////////////////////////
	// Methods 																		//
	//////////////////////////////////////////////////////////////////////////////////
	public function equals($author)
	{
		////////////////////////////////////
		// Check if the same value object //
		////////////////////////////////////
		if (!$author instanceOf Author)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->id	 		=== $author->id) && 
				($this->name	 	=== $author->name) && 
				($this->role	 	=== $author->role)
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
