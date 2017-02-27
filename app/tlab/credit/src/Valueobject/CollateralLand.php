<?php

namespace Thunderlabid\Credit\Valueobject;

use Thunderlabid\Credit\Valueobject\Interfaces\IValueObject;
use Thunderlabid\Credit\Valueobject\Traits\IValueObjectTrait;
use Exception, Carbon\Carbon;

class CollateralLand implements IValueObject { 

	use IValueObjectTrait;

	private $name;
	private $address;
	private $certification;
	private $surface_area;
	private $road;
	private $road_wide;
	private $location_by_street;
	private $environment;
	private $deed;
	private $lastest_pbb;
	private $insurance;
	private $pbb_value;
	private $liquidation_value;
	private $assessed;

	//////////////////////////////////////////////////////////////////////////////////
	// Constructor 																	//
	//////////////////////////////////////////////////////////////////////////////////
	/**
	 * @param [string] $name				[name of the CollateralValue]
	 * @param [string] $address				[address of the CollateralValue]
	 * @param [string] $certification		[certification of the CollateralValue]
	 * @param [string] $surface_area		[surface_area of the CollateralValue]
	 * @param [string] $road				[road of the CollateralValue]
	 * @param [string] $road_wide    		[road_wide of the CollateralValue]
	 * @param [string] $location_by_street	[location_by_street of the CollateralValue]
	 * @param [string] $environment    		[environment of the CollateralValue]
	 * @param [string] $deed    			[deed of the CollateralValue]
	 * @param [string] $lastest_pbb    		[lastest_pbb of the CollateralValue]
	 * @param [string] $insurance			[insurance of the CollateralValue]
	 * @param [string] $pbb_value			[pbb_value of the CollateralValue]
	 * @param [string] $liquidation_value	[liquidation_value of the CollateralValue]
	 * @param [string] $assessed    		[assessed of the CollateralValue]
	 */
	public function __construct($name, $address, $certification, $surface_area, $road, $road_wide, $location_by_street, $environment, $deed, $lastest_pbb, $insurance, $pbb_value, $liquidation_value, CollateralAssess $assessed)
	{
		$this->name					= ucwords(strtolower($name));
		$this->address				= $address;
		$this->certification		= $certification;
		$this->surface_area			= $surface_area;
		$this->road					= $road;
		$this->road_wide			= $road_wide;
		$this->location_by_street	= $location_by_street;
		$this->environment			= $environment;
		$this->deed					= $deed;
		$this->lastest_pbb			= $lastest_pbb;
		$this->insurance			= $insurance;
		$this->pbb_value			= new IDR($pbb_value);
		$this->liquidation_value	= new IDR($liquidation_value);
		$this->assessed				= $assessed;
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
		if (!$asset instanceOf CollateralLand)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->name				=== $asset->name) && 
				($this->address				=== $asset->address) && 
				($this->certification		=== $asset->certification) && 
				($this->surface_area		=== $asset->surface_area) && 
				($this->road				=== $asset->road) && 
				($this->road_wide			=== $asset->road_wide) && 
				($this->location_by_street	=== $asset->location_by_street) && 
				($this->environment			=== $asset->environment) && 
				($this->deed				=== $asset->deed) && 
				($this->lastest_pbb			=== $asset->lastest_pbb) && 
				($this->insurance			=== $asset->insurance) && 
				($this->pbb_value			=== $asset->pbb_value) && 
				($this->liquidation_value	=== $asset->liquidation_value) && 
				($this->assessed			=== $asset->assessed)
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
