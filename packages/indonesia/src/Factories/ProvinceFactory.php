<?php

namespace Thunderlabid\Indonesia\Factories;

use Thunderlabid\Indonesia\Factories\Interfaces\IFactory;

use Thunderlabid\Indonesia\Entities\Province;

/**
 * Class untuk Factories Province
 *
 * Digunakan untuk membuat Entity Province baru.
 *
 * @package    Thunderlabid
 * @subpackage Indonesia
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class ProvinceFactory implements IFactory
{
	/**
	 * construct create entity baru
	 * @param array $data
	 * @return Province $province
	 */
	public static function build($province_id, $province_name, $province_name_abbr, $province_name_id, $province_name_en, $iso_code, $iso_name, $iso_type, $iso_geounit, $timezone, $province_lat, $province_lon, $cities)
	{
		$province 	= 	new Province($province_id,
						$province_name,
						$province_name_abbr,
						$province_name_id,
						$province_name_en,
						$iso_code,
						$iso_name,
						$iso_type,
						$iso_geounit,
						$timezone,
						$province_lat,
						$province_lon,
						$cities
					);

		return $province;
	}
}
