<?php

namespace App\Infrastructure\Traits;

use Exception;

/**
 * Trait Link list
 *
 * Digunakan untuk initizialize link list mode
 *
 * @package    TTagihan
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
trait AlamatTrait {
 	 	
	/**
	 * Add Event_list to queue
	 * @param [IEvent_list] $event_list 
	 */
	public function formatAlamatFrom($value)
	{
		if(is_array($value))
		{
			return json_encode($value);
		}

		return $value;
	}

	/**
	 * Add Event_list to queue
	 * @param [IEvent_list] $event_list 
	 */
	public function formatAlamatTo($value)
	{	
		$data 		= json_decode($value, true);

		if($data)
		{
			return $data;
		}

		return $value;
	}
}