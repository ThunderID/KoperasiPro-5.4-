<?php

namespace Thunderlabid\Indonesia\Infrastructures\Models;

use Illuminate\Support\Collection;

class City extends Collection
{
	public function __construct($collection = [])
	{
		if(empty($collection))
		{
			$city   	= file_get_contents('/var/www/html/packages/indonesia/src/Infrastructures/Libraries/json/cities.json');
		
			$collection = json_decode($city, true);
		}

		parent::__construct($collection);
	}

	function withProvince()
	{
		$province 					= new Province;

		foreach ($this->items as $key => $value) 
		{
			$items[$key]  				= $value;
			$items[$key]['province']	= $province->where('province_id', $value['province_id']);
		}

		return new City($items);
	}
}
