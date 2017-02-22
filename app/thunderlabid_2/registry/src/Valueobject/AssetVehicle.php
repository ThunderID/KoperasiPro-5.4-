<?php

namespace Thunderlabid\Registry\Valueobject;

use Thunderlabid\Registry\Valueobject\Interfaces\IValueObject;
use Thunderlabid\Registry\Valueobject\Traits\IValueObjectTrait;
use Exception, Carbon\Carbon;

class AssetVehicle implements IValueObject { 

	use IValueObjectTrait;

	private $four_wheels;
	private $two_wheels;
	private $worth;

	//////////////////////////////////////////////////////////////////////////////////
	// Constructor 																	//
	//////////////////////////////////////////////////////////////////////////////////
	/**
	 * @param [string] $four_wheels    		[four_wheels of the AssetVehicle]
	 * @param [string] $two_wheels    		[two_wheels of the AssetVehicle]
	 * @param [numeric] $worth    			[worth of the AssetVehicle]
	 */
	public function __construct($four_wheels, $two_wheels, $worth)
	{
		$this->four_wheels			= $four_wheels;
		$this->two_wheels			= $two_wheels;
		$this->worth				= new IDR($worth);
	}

	//////////////////////////////////////////////////////////////////////////////////
	// Mutators 																	//
	//////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////////////////////////////////////
	// Methods 																		//
	//////////////////////////////////////////////////////////////////////////////////
	public function equals($asset)
	{
		////////////////////////////////////
		// Check if the same value object //
		////////////////////////////////////
		if (!$asset instanceOf AssetVehicle)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->four_wheels			=== $asset->four_wheels) && 
				($this->two_wheels			=== $asset->two_wheels) && 
				($this->worth				=== $asset->worth)
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
