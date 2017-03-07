<?php

namespace Thunderlabid\Indonesia\Infrastructures\Transformers;

use \Thunderlabid\Indonesia\Infrastructures\Transformers\Interfaces\ITransformer;
use \Thunderlabid\Indonesia\Entities\Province as Entity;
use \Thunderlabid\Indonesia\Factories\ProvinceFactory as Factory;
use \Thunderlabid\Indonesia\Factories\CityFactory;

use Thunderlabid\Indonesia\Entities\Interfaces\IEntity;

use Exception;

class ProvinceTransformer implements ITransformer { 

	/**
	 * Convert Eloquent Model to Entity
	 * @param [Model] $model 
	 */
	public function ToEntity($model)
	{
		//////////////////
		// Build Entity //
		//////////////////
		$city_entities 			= [];

		foreach ($model['cities'] as $key => $value) 
		{
			$city_entities[]	= CityFactory::build($value['city_id'], $value['city_name'], $value['city_name_full'], $value['city_type']);
		}

		return Factory::build($model['province_id'], $model['province_name'], $model['province_name_abbr'], $model['province_name_id'], $model['province_name_en'], $model['iso_code'], $model['iso_name'], $model['iso_type'], $model['iso_geounit'], $model['timezone'], $model['province_lat'], $model['province_lon'], $city_entities);
	}

	/**
	 * Convert Entity to Eloquent
	 * @param [Model] $model 
	 */
	public function ToEloquent($entity)
	{
		return true;
	}

}
