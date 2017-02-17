<?php

namespace App\Web\Services;

/**
 * Base service framework
 *
 * @author     Budi 
 */
class baseService 
{
	//public page data
	public $datas;

	function __construct() 
	{
		$this->datas 					= new \Stdclass;
	}   

}