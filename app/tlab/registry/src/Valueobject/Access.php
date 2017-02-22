<?php

namespace Thunderlabid\Registry\Valueobject;

use Thunderlabid\Registry\Valueobject\Interfaces\IValueObject;
use Thunderlabid\Registry\Valueobject\Traits\IValueObjectTrait;
use Exception;

class Access implements IValueObject { 

	use IValueObjectTrait;

	private $role;
	private $office;

	//////////////////////////////////////////////////////////////////////////////////
	// Constructor 																	//
	//////////////////////////////////////////////////////////////////////////////////
	/**
	 * @param [string] $role   		[role of the Access]
	 * @param [string] $office     	[Office of the Access]
	 */
	public function __construct($role, Office $office)
	{
		$this->role			= $role;
		$this->office		= $office;
	}

	//////////////////////////////////////////////////////////////////////////////////
	// Mutators 																	//
	//////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////////////////////////////////////
	// Methods 																		//
	//////////////////////////////////////////////////////////////////////////////////
	public function equals($access)
	{
		////////////////////////////////////
		// Check if the same value object //
		////////////////////////////////////
		if (!$access instanceOf Access)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->role	 		=== $access->role) && 
				($this->office	 		=== $access->office)
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
