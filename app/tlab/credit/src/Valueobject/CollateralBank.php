<?php

namespace Thunderlabid\Credit\Valueobject;

use Thunderlabid\Credit\Valueobject\Interfaces\IValueObject;
use Thunderlabid\Credit\Valueobject\Traits\IValueObjectTrait;
use Exception;

class CollateralBank implements IValueObject { 

	use IValueObjectTrait;

	private $market_value;
	private $percentage;

	//////////////////////////////////////////////////////////////////////////////////
	// Constructor 																	//
	//////////////////////////////////////////////////////////////////////////////////
	/**
	 * @param [string] $market_value   		[market_value of the CollateralBank]
	 * @param [string] $percentage     		[percentage of the CollateralBank]
	 */
	public function __construct($market_value, $percentage)
	{
		$this->market_value		= new IDR($market_value);
		$this->percentage		= new IDR($percentage);
	}

	//////////////////////////////////////////////////////////////////////////////////
	// Mutators 																	//
	//////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////////////////////////////////////
	// Methods 																		//
	//////////////////////////////////////////////////////////////////////////////////
	public function equals($collateralbank)
	{
		////////////////////////////////////
		// Check if the same value object //
		////////////////////////////////////
		if (!$collateralbank instanceOf CollateralBank)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->market_value	=== $collateralbank->market_value) && 
				($this->percentage		=== $collateralbank->percentage) 
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
