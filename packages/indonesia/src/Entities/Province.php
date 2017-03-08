<?php

namespace Thunderlabid\Indonesia\Entities;

/////////////
// Entity  //
/////////////
use Thunderlabid\Indonesia\Entities\Interfaces\IEntity;
use Thunderlabid\Indonesia\Entities\Traits\IEntityTrait;

//////////////
// Utilitis //
//////////////
use Carbon\Carbon;
use Exception, Validator;
use \Illuminate\Support\Collection;

/**
 * Entity Province
 *
 * Digunakan untuk menyimpan data Province.
 *
 * @package    Thunderlabid
 * @subpackage Indonesia
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Province implements IEntity 
{ 
	use IEntityTrait;

	public $policies 	= 	[];
	/**
	 * Constructor
	 * 
	 * @param string $province_id
	 * @param string $province_name
	 * @param string $province_name_abbr
	 * @param string $province_name_id
	 * @param string $province_name_en
	 * @param string $iso_code 
	 * @param string $iso_name
	 * @param string $iso_type 
	 * @param string $iso_geounit 
	 * @param string $timezone 
	 * @param string $province_lat 
	 * @param string $province_lon 
	 */
	public function __construct($province_id, $province_name, $province_name_abbr, $province_name_id, $province_name_en, $iso_code, $iso_name, $iso_type, $iso_geounit, $timezone, $province_lat, $province_lon, $cities)
	{
		if(!$province_id)
		{
			$this->attributes['province_id'] 	= $this->createID();
			$this->province_name 				= $province_name;
			$this->province_name_abbr 			= $province_name_abbr;
			$this->province_name_id 			= $province_name_id;
			$this->province_name_en 			= $province_name_en;
			$this->iso_code 					= $iso_code;
			$this->iso_type 					= $iso_type;
			$this->iso_geounit 					= $iso_geounit;
			$this->timezone 					= $timezone;
			$this->province_lat 				= $province_lat;
			$this->province_lon 				= $province_lon;
		}
		else
		{
			$this->attributes['province_id'] 			= $province_id;
			$this->attributes['province_name'] 			= $province_name;
			$this->attributes['province_name_abbr'] 	= $province_name_abbr;
			$this->attributes['province_name_id'] 		= $province_name_id;
			$this->attributes['province_name_en'] 		= $province_name_en;
			$this->attributes['iso_code'] 				= $iso_code;
			$this->attributes['iso_type'] 				= $iso_type;
			$this->attributes['iso_geounit'] 			= $iso_geounit;
			$this->attributes['timezone'] 				= $timezone;
			$this->attributes['province_lat'] 			= $province_lat;
			$this->attributes['province_lon'] 			= $province_lon;

			$this->attributes['cities']					= $cities;
		}
	}
}