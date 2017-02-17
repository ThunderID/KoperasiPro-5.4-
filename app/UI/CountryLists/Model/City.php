<?php

namespace App\UI\CountryLists\Model;

use Illuminate\Support\Collection;

class City extends Collection
{
	public function __construct($collection = [])
	{
		if(empty($collection))
		{
			$province   = file_get_contents(app_path().'/UI/CountryLists/Libraries/json/cities.json');
	    
	       	$collection = json_decode($province, true);
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
