<?php

namespace App\UI\CountryLists\Model;

class City
{
	public static function get()
	{
		$city 	= file_get_contents(app_path().'/UI/CountryLists/Libraries/json/cities.json');

		return $city;
	}
}
