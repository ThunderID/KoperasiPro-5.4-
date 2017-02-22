<?php

namespace Thunderlabid\Registry\Valueobject;

use Thunderlabid\Registry\Valueobject\Interfaces\IValueObject;
use Thunderlabid\Registry\Valueobject\Traits\IValueObjectTrait;
use Exception, Carbon\Carbon;

class AssetCompany implements IValueObject { 

	use IValueObjectTrait;

	private $ownership_status;
	private $share;
	private $name;
	private $area;
	private $since;
	private $worth;

	//////////////////////////////////////////////////////////////////////////////////
	// Constructor 																	//
	//////////////////////////////////////////////////////////////////////////////////
	/**
	 * @param [string] $ownership_status    [ownership_status of the AssetCompany]
	 * @param [string] $share    			[share of the AssetCompany]
	 * @param [string] $name    			[name of the AssetCompany]
	 * @param [numeric] $area    			[area of the AssetCompany]
	 * @param [numeric] $since				[since of the AssetCompany]
	 * @param [numeric] $worth    			[worth of the AssetCompany]
	 */
	public function __construct($ownership_status, $share, $name, $area, $since, $worth)
	{
		$this->ownership_status		= ucwords(strtolower($ownership_status));
		$this->share				= $share;
		$this->name					= $name;

		$this->area					= $area;
		$this->since				= Carbon::parse($since);
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
		if (!$asset instanceOf AssetCompany)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->ownership_status	=== $asset->ownership_status) && 
				($this->share				=== $asset->share) && 
				($this->name				=== $asset->name) && 
				($this->area				=== $asset->area) && 
				($this->since				=== $asset->since) && 
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
