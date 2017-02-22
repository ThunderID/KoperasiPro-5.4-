<?php

namespace Thunderlabid\Registry\Valueobject;

use Thunderlabid\Registry\Valueobject\Interfaces\IValueObject;
use Thunderlabid\Registry\Valueobject\Traits\IValueObjectTrait;
use Exception;

class Finance implements IValueObject { 

	use IValueObjectTrait;

	private $description;
	private $amount;

	//////////////////////////////////////////////////////////////////////////////////
	// Constructor 																	//
	//////////////////////////////////////////////////////////////////////////////////
	/**
	 * @param [string] $description    	[description of the Finance]
	 * @param [string] $amount    		[amount of the Finance]
	 */
	public function __construct($description, $amount)
	{
		$this->description			= ucwords(strtolower($description));
		$this->amount				= new IDR($amount);
	}

	//////////////////////////////////////////////////////////////////////////////////
	// Mutators 																	//
	//////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////////////////////////////////////
	// Methods 																		//
	//////////////////////////////////////////////////////////////////////////////////
	public function equals($finance)
	{
		////////////////////////////////////
		// Check if the same value object //
		////////////////////////////////////
		if (!$finance instanceOf Finance)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->description			=== $finance->description) && 
				($this->amount				=== $finance->amount)
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
