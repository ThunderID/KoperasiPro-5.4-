<?php

namespace Thunderlabid\Registry\Valueobject;

use Thunderlabid\Registry\Valueobject\Interfaces\IValueObject;
use Thunderlabid\Registry\Valueobject\Traits\IValueObjectTrait;
use Exception, Carbon\Carbon;

class AssetHouse implements IValueObject { 

	use IValueObjectTrait;

	private $ownership_status;
	private $since;
	private $to;
	private $installment;
	private $installment_period;
	private $size;
	private $worth;

	//////////////////////////////////////////////////////////////////////////////////
	// Constructor 																	//
	//////////////////////////////////////////////////////////////////////////////////
	/**
	 * @param [string] $ownership_status    [ownership_status of the AssetHouse]
	 * @param [string] $since    			[since of the AssetHouse]
	 * @param [string] $to    				[to of the AssetHouse]
	 * @param [numeric] $installment    	[installment of the AssetHouse]
	 * @param [numeric] $installment_period	[installment_period of the AssetHouse]
	 * @param [numeric] $size    			[size of the AssetHouse]
	 * @param [numeric] $worth    			[worth of the AssetHouse]
	 */
	public function __construct($ownership_status, $since, $to, $installment = 0, $installment_period = 0, $size, $worth)
	{
		$this->ownership_status		= ucwords(strtolower($ownership_status));
		$this->since				= Carbon::parse($since);
		$this->to					= Carbon::parse($to);

		$this->installment			= new IDR($installment);
		$this->installment_period	= $installment_period;
		$this->size					= $size;
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
		if (!$asset instanceOf AssetHouse)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->ownership_status	=== $asset->ownership_status) && 
				($this->since				=== $asset->since) && 
				($this->to					=== $asset->to) && 
				($this->installment			=== $asset->installment) && 
				($this->installment_period	=== $asset->installment_period) && 
				($this->size				=== $asset->size) && 
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
