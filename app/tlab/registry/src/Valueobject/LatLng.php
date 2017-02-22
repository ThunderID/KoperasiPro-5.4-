<?php

namespace Thunderlabid\Registry\Valueobject;

use Thunderlabid\Registry\Valueobject\Interfaces\IValueObject;
use Thunderlabid\Registry\Valueobject\Traits\IValueObjectTrait;

class LatLng implements IValueObject {

	use IValueObjectTrait;

	private $latitude;
	private $longitude;

	//////////////////////////////////////////////////////////////////////////////////
	// Constructor 																	//
	//////////////////////////////////////////////////////////////////////////////////
	/**
	 * [__construct description]
	 * @param [double] $latitude  [latitude]
	 * @param [double] $longitude [longitude]
	 */
	public function __construct($latitude, $longitude)
	{
		$this->latitude		= (double) $latitude;
		$this->longitude	= (double) $longitude;
	}

	//////////////////////////////////////////////////////////////////////////////////
	// Mutators 																	//
	//////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////////////////////////////////////
	// Methods 																		//
	//////////////////////////////////////////////////////////////////////////////////
	public function equals($latlng)
	{
		////////////////////////////////////
		// Check if the same value object //
		////////////////////////////////////
		if (!$address instanceOf LatLng)
		{
			throw new Exception('Parameter 1 must be type of ' . __CLASS__ , 1);
		}

		/////////////
		// Compare //
		/////////////
		if (
				($this->latitude === $latlng->latitude) &&
				($this->longitude === $latlng->longitude)
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