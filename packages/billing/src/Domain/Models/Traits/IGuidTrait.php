<?php

namespace Thunderlabid\Billing\Models\Traits;

/**
 * Guid trait to generate id
 *
 * Digunakan untuk always true entity
 *
 * @package    Thunderlabid
 * @subpackage Billing
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
trait IGuidTrait {
 	
	/**
	 * Add Event_list to queue
	 * @param [IEvent_list] $event_list 
	 */
	public static function guid()
	{
		if (function_exists('com_create_guid') === true)
		{
			return trim(com_create_guid(), '{}');
		}

		return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	}
}