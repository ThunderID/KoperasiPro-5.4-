<?php

namespace App\UI\CountryLists\Model;

class Province
{
    public static function get()
    {
        $city   = file_get_contents(app_path().'/UI/CountryLists/Libraries/json/provinces.json');

        return $city;
    }

}
