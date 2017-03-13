<?php

namespace Thunderlabid\Immigration\Models\Traits\Policies;

use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Trait Link list
 *
 * Digunakan untuk initizialize link list mode
 *
 * @package    Thunderlabid
 * @subpackage Immigration
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
trait VisaIDTrait {
 	
	/**
	 * Add Event_list to queue
	 * @param [IEvent_list] $event_list 
	 */
	public function setIdAttribute($value)
	{
		if (function_exists('com_create_guid') === true)
		{
			$this->attributes['id'] = trim(com_create_guid(), '{}');
		}

		$this->attributes['id'] = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	}
}