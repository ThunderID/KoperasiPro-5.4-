<?php

namespace Thunderlabid\Credit\Valueobject;

use Thunderlabid\Credit\Valueobject\Interfaces\IValueObject;
use Thunderlabid\Credit\Valueobject\Traits\IValueObjectTrait;
use Exception;

class CollateralAssess implements IValueObject { 

	use IValueObjectTrait;

	private $market_value;
	private $assess;

	//////////////////////////////////////////////////////////////////////////////////
	// Constructor 																	//
	//////////////////////////////////////////////////////////////////////////////////
	/**
	 * @param [string] $market_value   	[market_value of the CollateralAsset]
	 * @param [string] $assess     		[assess of the CollateralAsset]
	 */
	public function __construct($market_value, $assess)
	{
		$this->market_value		= new IDR($market_value);
		$this->assess			= new IDR($assess);
	}

	//////////////////////////////////////////////////////////////////////////////////
	// Mutators 																	//
	//////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////////////////////////////////////
	// Methods 																		//
	//////////////////////////////////////////////////////////////////////////////////
	public function equals($collateralasset)
	{
		////////////////////////////////////
		// Check if the same value object //
		////////////////////////////////////
		if (!$collateralasset instanceOf CollateralAsset)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->market_value	=== $collateralasset->market_value) && 
				($this->assess	 		=== $collateralasset->assess) 
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
