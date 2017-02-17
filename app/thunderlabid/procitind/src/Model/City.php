<?php

namespace Thunderlabid\Procitind\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	public function get()
	{
		$city = file_get_contents('../database/cities.json');
		dd($city);
	}
}
