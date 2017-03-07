<?php

namespace Thunderlabid\Indonesia\Infrastructures\Models;

use Illuminate\Support\Collection;

class Province extends Collection
{
	public function __construct($collection = [])
	{
		if(empty($collection))
		{
			$province   = file_get_contents('/var/www/html/packages/indonesia/src/Infrastructures/Libraries/json/provinces.json');
		
			$collection = json_decode($province, true);
		}

		parent::__construct($collection);
	}

	function withCities()
	{
		$city 						= new City;

		foreach ($this->items as $key => $value) 
		{
			$items[$key]  			= $value;
			$items[$key]['cities']	= $city->where('province_id', $value['province_id']);
		}

		return new Province($items);
	}
}
