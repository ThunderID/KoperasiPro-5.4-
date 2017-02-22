<?php

namespace Thunderlabid\Credit\Valueobject;

use Thunderlabid\Credit\Valueobject\Interfaces\IValueObject;
use Thunderlabid\Credit\Valueobject\Traits\IValueObjectTrait;
use Exception, Carbon\Carbon;

class CollateralVehicle implements IValueObject { 

	use IValueObjectTrait;

	private $merk;
	private $type;
	private $police_number;
	private $color;
	private $year;
	private $name;
	private $address;
	private $bpkb_number;
	private $machine_number;
	private $frame_number;
	private $valid_until;
	private $functions;
	private $invoice;
	private $purchase_memo;
	private $memo;
	private $valid_ktp;
	private $physical_condition;
	private $ownership_status;
	private $insurance;
	private $assessed;
	private $bank;

	//////////////////////////////////////////////////////////////////////////////////
	// Constructor 																	//
	//////////////////////////////////////////////////////////////////////////////////
	/**
	 * @param [string] $merk				[merk of the CollateralValue]
	 * @param [string] $type    			[type of the CollateralValue]
	 * @param [string] $police_number    	[police_number of the CollateralValue]
	 * @param [string] $color    			[color of the CollateralValue]
	 * @param [string] $year				[year of the CollateralValue]
	 * @param [string] $name    			[name of the CollateralValue]
	 * @param [string] $address    			[address of the CollateralValue]
	 * @param [string] $bpkb_number    		[bpkb_number of the CollateralValue]
	 * @param [string] $machine_number    	[machine_number of the CollateralValue]
	 * @param [string] $frame_number    	[frame_number of the CollateralValue]
	 * @param [string] $valid_until    		[valid_until of the CollateralValue]
	 * @param [string] $functions    		[functions of the CollateralValue]
	 * @param [string] $invoice  		  	[invoice of the CollateralValue]
	 * @param [string] $purchase_memo    	[purchase_memo of the CollateralValue]
	 * @param [string] $memo    			[memo of the CollateralValue]
	 * @param [string] $valid_ktp    		[valid_ktp of the CollateralValue]
	 * @param [string] $physical_condition 	[physical_condition of the CollateralValue]
	 * @param [string] $ownership_status 	[ownership_status of the CollateralValue]
	 * @param [string] $insurance    		[insurance of the CollateralValue]
	 * @param CollateralAssess $assessed    	[assessed of the CollateralValue]
	 * @param CollateralBank $bank    		[bank of the CollateralValue]
	 */
	public function __construct($merk, $type, $police_number, $color, $year, $name, $address, $bpkb_number, $machine_number, $frame_number, $valid_until, $functions, $invoice, $purchase_memo, $memo, $valid_ktp, $physical_condition, $ownership_status, $insurance, CollateralAssess $assessed, CollateralBank $bank)
	{
		$this->merk					= $merk;
		$this->type					= $type;
		$this->police_number		= $police_number;
		$this->color				= $color;
		$this->year					= $year;
		$this->name					= $name;
		$this->address				= $address;
		$this->bpkb_number			= $bpkb_number;
		$this->machine_number		= $machine_number;
		$this->frame_number			= $frame_number;
		$this->valid_until			= Carbon::parse($valid_until);
		$this->functions			= $functions;
		$this->invoice				= $invoice;
		$this->purchase_memo		= $purchase_memo;
		$this->memo					= $memo;
		$this->valid_ktp			= $valid_ktp;
		$this->physical_condition	= $physical_condition;
		$this->ownership_status		= $ownership_status;
		$this->insurance			= $insurance;
		$this->assessed				= $assessed;
		$this->bank					= $bank;
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
		if (!$asset instanceOf CollateralVehicle)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->merk				=== $asset->merk) && 
				($this->type				=== $asset->type) && 
				($this->police_number		=== $asset->police_number) && 
				($this->color				=== $asset->color) && 
				($this->year				=== $asset->year) && 
				($this->name				=== $asset->name) && 
				($this->address				=== $asset->address) && 
				($this->bpkb_number			=== $asset->bpkb_number) && 
				($this->machine_number		=== $asset->machine_number) && 
				($this->frame_number		=== $asset->frame_number) && 
				($this->valid_until			=== $asset->valid_until) && 
				($this->functions			=== $asset->functions) && 
				($this->invoice				=== $asset->invoice) && 
				($this->purchase_memo		=== $asset->purchase_memo) && 
				($this->memo				=== $asset->memo) && 
				($this->valid_ktp			=== $asset->valid_ktp) && 
				($this->physical_condition	=== $asset->physical_condition) && 
				($this->ownership_status	=== $asset->ownership_status) && 
				($this->insurance			=== $asset->insurance) && 
				($this->assessed			=== $asset->assessed) && 
				($this->market_value		=== $asset->market_value)
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
