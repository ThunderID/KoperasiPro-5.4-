<?php

namespace Thunderlabid\Credit\Valueobject;

use Thunderlabid\Credit\Valueobject\Interfaces\IValueObject;
use Thunderlabid\Credit\Valueobject\Traits\IValueObjectTrait;
use Exception, Carbon\Carbon;

class CollateralBuilding implements IValueObject { 

	use IValueObjectTrait;

	private $name;
	private $address;
	private $certification;
	private $surface_area;
	private $building_area;
	private $building_function;
	private $building_shape;
	private $building_construction;
	private $floor;
	private $wall;
	private $electricity;
	private $water;
	private $telephone;
	private $air_conditioner;
	private $others;
	private $road;
	private $road_wide;
	private $location_by_street;
	private $environment;
	private $deed;
	private $lastest_pbb;
	private $insurance;
	private $pbb_value;
	private $liquidation_value;
	private $land_value;
	private $building_value;
	private $assessed;

	//////////////////////////////////////////////////////////////////////////////////
	// Constructor 																	//
	//////////////////////////////////////////////////////////////////////////////////
	/**
	 * @param [string] $name					[name of the CollateralBuilding]
	 * @param [string] $address					[address of the CollateralBuilding]
	 * @param [string] $certification			[certification of the CollateralBuilding]
	 * @param [string] $surface_area			[surface_area of the CollateralBuilding]
	 * @param [string] $building_area			[building_area of the CollateralBuilding]
	 * @param [string] $building_function		[building_function of the CollateralBuilding]
	 * @param [string] $building_shape			[building_shape of the CollateralBuilding]
	 * @param [string] $building_construction	[building_construction of the CollateralBuilding]
	 * @param [string] $floor					[floor of the CollateralBuilding]
	 * @param [string] $wall					[wall of the CollateralBuilding]
	 * @param [string] $electricity				[electricity of the CollateralBuilding]
	 * @param [string] $water					[water of the CollateralBuilding]
	 * @param [string] $telephone				[telephone of the CollateralBuilding]
	 * @param [string] $air_conditioner			[air_conditioner of the CollateralBuilding]
	 * @param [string] $others					[others of the CollateralBuilding]
	 * @param [string] $road					[road of the CollateralBuilding]
	 * @param [string] $road_wide    			[road_wide of the CollateralBuilding]
	 * @param [string] $location_by_street		[location_by_street of the CollateralBuilding]
	 * @param [string] $environment    			[environment of the CollateralBuilding]
	 * @param [string] $deed    				[deed of the CollateralBuilding]
	 * @param [string] $lastest_pbb  		  	[lastest_pbb of the CollateralBuilding]
	 * @param [string] $insurance				[insurance of the CollateralBuilding]
	 * @param [string] $pbb_value				[pbb_value of the CollateralBuilding]
	 * @param [string] $liquidation_value		[liquidation_value of the CollateralBuilding]
	 * @param [string] $land_value				[land_value of the CollateralBuilding]
	 * @param [string] $building_value			[building_value of the CollateralBuilding]
	 * @param CollateralAssess $assessed    		[assessed of the CollateralBuilding]
	 */
	public function __construct($name, $address, $certification, $surface_area, $building_area, $building_function, $building_shape, $building_construction, $floor, $wall, $electricity, $water, $telephone, $air_conditioner, $others, $road, $road_wide, $location_by_street, $environment, $deed, $lastest_pbb, $insurance, $pbb_value, $liquidation_value, $land_value, $building_value, CollateralAssess $assessed)
	{
		$this->name					= ucwords(strtolower($name));
		$this->address				= $address;
		$this->certification		= $certification;
		$this->surface_area			= $surface_area;
		$this->building_area		= $building_area;
		$this->building_function	= $building_function;
		$this->building_shape		= $building_shape;
		$this->building_construction= $building_construction;
		$this->floor				= $floor;
		$this->wall					= $wall;
		$this->electricity			= $electricity;
		$this->water				= $water;
		$this->telephone			= $telephone;
		$this->air_conditioner		= $air_conditioner;
		$this->others				= $others;
		$this->road					= $road;
		$this->road_wide			= $road_wide;
		$this->location_by_street	= $location_by_street;
		$this->environment			= $environment;
		$this->deed					= $deed;
		$this->lastest_pbb			= $lastest_pbb;
		$this->insurance			= $insurance;
		$this->pbb_value			= $pbb_value;
		$this->liquidation_value	= $liquidation_value;
		$this->land_value			= $land_value;
		$this->building_value		= $building_value;
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
		if (!$asset instanceOf CollateralBuilding)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->name					=== $asset->name) && 
				($this->address					=== $asset->address) && 
				($this->certification			=== $asset->certification) && 
				($this->surface_area			=== $asset->surface_area) && 
				($this->building_area			=== $asset->surface_area) && 
				($this->building_function		=== $asset->surface_area) && 
				($this->building_shape			=== $asset->surface_area) && 
				($this->building_construction	=== $asset->surface_area) && 
				($this->floor					=== $asset->surface_area) && 
				($this->wall					=== $asset->surface_area) && 
				($this->electricity				=== $asset->surface_area) && 
				($this->water					=== $asset->surface_area) && 
				($this->telephone				=== $asset->surface_area) && 
				($this->air_conditioner			=== $asset->surface_area) && 
				($this->others					=== $asset->surface_area) && 
				($this->road					=== $asset->road) && 
				($this->road_wide				=== $asset->road_wide) && 
				($this->location_by_street		=== $asset->location_by_street) && 
				($this->environment				=== $asset->environment) && 
				($this->deed					=== $asset->deed) && 
				($this->lastest_pbb				=== $asset->lastest_pbb) && 
				($this->insurance				=== $asset->insurance) && 
				($this->pbb_value				=== $asset->pbb_value) && 
				($this->liquidation_value		=== $asset->liquidation_value) && 
				($this->land_value				=== $asset->liquidation_value) && 
				($this->building_value			=== $asset->liquidation_value) && 
				($this->assessed				=== $asset->assessed)
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
