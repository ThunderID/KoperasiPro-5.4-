<?php

namespace Thunderlabid\Credit\Valueobject;

use Thunderlabid\Credit\Valueobject\Interfaces\IValueObject;
use Thunderlabid\Credit\Valueobject\Traits\IValueObjectTrait;
use Exception;

class Collateral implements IValueObject { 

	use IValueObjectTrait;

	private $type;
	private $legal;
	private $ownership_status;

	//////////////////////////////////////////////////////////////////////////////////
	// Constructor 																	//
	//////////////////////////////////////////////////////////////////////////////////
	/**
	 * @param [string] $type   			[type of the Collateral]
	 * @param [string] $legal    	[legal of the Collateral]
	 * @param [string] $ownership_status    		[ownership_status of the Collateral]
	 */
	public function __construct($type, $legal, $ownership_status)
	{
		$this->type					= $type;
		$this->legal				= ucwords(strtolower($legal));
		$this->ownership_status		= strtolower($ownership_status);
	}

	//////////////////////////////////////////////////////////////////////////////////
	// Mutators 																	//
	//////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////////////////////////////////////
	// Methods 																		//
	//////////////////////////////////////////////////////////////////////////////////
	public function equals($collateral)
	{
		////////////////////////////////////
		// Check if the same value object //
		////////////////////////////////////
		if (!$collateral instanceOf Collateral)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->id	 				=== $collateral->id) && 
				($this->legal				=== $collateral->legal) && 
				($this->ownership_status	=== $collateral->ownership_status)
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
