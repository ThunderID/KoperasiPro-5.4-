<?php

namespace Thunderlabid\Registry\Valueobject;

use Thunderlabid\Registry\Valueobject\Interfaces\IValueObject;
use Thunderlabid\Registry\Valueobject\Traits\IValueObjectTrait;
use Thunderlabid\Registry\Valueobject\LatLng;
use Exception;

class Address implements IValueObject { 

	use IValueObjectTrait;

	private $street;
	private $city;
	private $province;
	private $country;
	private $latlng;

	//////////////////////////////////////////////////////////////////////////////////
	// Constructor 																	//
	//////////////////////////////////////////////////////////////////////////////////
	/**
	 * @param [string] $street   	[street of the address]
	 * @param [string] $city     	[city of the address]
	 * @param [string] $province 	[province of the address]
	 * @param LatLng $latlng   		[location of the address]
	 */
	public function __construct($street, $city, $province, $country, LatLng $latlng)
	{
		$this->street		= $street;
		$this->city			= ucwords(strtolower($city));
		$this->province		= ucwords(strtolower($province));
		$this->country		= ucwords(strtolower($country));
		$this->latlng		= $latlng;
	}

	//////////////////////////////////////////////////////////////////////////////////
	// Mutators 																	//
	//////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////////////////////////////////////
	// Methods 																		//
	//////////////////////////////////////////////////////////////////////////////////
	public function equals($address)
	{
		////////////////////////////////////
		// Check if the same value object //
		////////////////////////////////////
		if (!$address instanceOf Address)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->street	 	=== $address->street) && 
				($this->city	 	=== $address->city) && 
				($this->province	=== $address->province) && 
				($this->country	 	=== $address->country) && 
				($this->latlng	 	=== $address->latlng)
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
