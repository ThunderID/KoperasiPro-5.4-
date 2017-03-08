<?php

namespace Thunderlabid\Indonesia\Factories;

use Thunderlabid\Indonesia\Factories\Interfaces\IFactory;

use Thunderlabid\Indonesia\Entities\City;

/**
 * Class untuk Factories City
 *
 * Digunakan untuk membuat Entity City baru.
 *
 * @package    Thunderlabid
 * @subpackage Indonesia
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class CityFactory implements IFactory
{
	/**
	 * construct create entity baru
	 * @param array $data
	 * @return City $city
	 */
	public static function build($city_id, $city_name, $city_name_full, $city_type)
	{
		$city 	= 	new City($city_id,
						$city_name,
						$city_name_full,
						$city_type
					);

		return $city;
	}
}
