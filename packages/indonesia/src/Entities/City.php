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
 * Entity City
 *
 * Digunakan untuk menyimpan data City.
 *
 * @package    Thunderlabid
 * @subpackage Indonesia
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class City implements IEntity 
{ 
	use IEntityTrait;

	public $policies 	= 	[];
	/**
	 * Constructor
	 * 
	 * @param string $city_id
	 * @param string $city_name
	 * @param string $city_name_full
	 * @param string $city_type
	 */
	public function __construct($city_id, $city_name, $city_name_full, $city_type)
	{
		if(!$city_id)
		{
			$this->attributes['city_id'] 	= $this->createID();
			$this->city_name 				= $city_name;
			$this->city_name_full 			= $city_name_full;
			$this->city_type 				= $city_type;
		}
		else
		{
			$this->attributes['city_id'] 		= $city_id;
			$this->attributes['city_name'] 		= $city_name;
			$this->attributes['city_name_full'] = $city_name_full;
			$this->attributes['city_type'] 		= $city_type;
		}
	}
}