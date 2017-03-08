<?php

namespace Thunderlabid\Application\DataTransformers\Indonesia;

use Thunderlabid\Application\DataTransformers\Interfaces\IDataTransformer;

/**
 * Interface class untuk Services Application
 *
 * Digunakan untuk scaffold dari data transformer lain.
 *
 * @package    Thunderlabid
 * @subpackage Application
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class ProvinceDTODataTransformer implements IDataTransformer
{ 
	/**
	 * Constructor
	 * 
	 * rarely used since change DTO to model kinda work of other 
	 * 
	 * @param array $province
	 * @return true
	 */
	public function write($province)
	{
		return true;
	}

	/**
	 * Constructor
	 * 
	 * Convert entity to DTO 
	 * 
	 * @param Thunderlabid\Immigration\Entities\Province $province
	 * @return array $province
	 */
	public function read($province)
	{
		$cities	 = [];

		foreach ((array)$province->cities as $key => $value) 
		{
			$cities[]		= [
				'city_id'			=> $value->city_id,
				'city_name'			=> $value->city_name,
				'city_name_full'	=> $value->city_name_full,
				'city_type'			=> $value->city_type
			];
		}

		return ['province_id' 			=> $province->province_id, 
				'province_name' 		=> $province->province_name, 
				'province_name_abbr' 	=> $province->province_name_abbr, 
				'province_name_id' 		=> $province->province_name_id, 
				'province_name_en' 		=> $province->province_name_en, 
				'iso_code' 				=> $province->iso_code, 
				'iso_type' 				=> $province->iso_type, 
				'iso_geounit'			=> $province->iso_geounit, 
				'timezone' 				=> $province->timezone, 
				'province_lat' 			=> $province->province_lat, 
				'province_lon' 			=> $province->province_lon, 
				'cities' 				=> $cities, 
				];
	}
}