<?php

namespace Thunderlabid\Credit\Models\Traits\Policies;

/**
 * Trait Link list
 *
 * Digunakan untuk initizialize link list mode
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
trait NomorKreditTrait {
 	
	/**
	 * Add Event_list to queue
	 * @param [IEvent_list] $event_list 
	 */
	public function setNomorKreditAttribute($value)
	{
		if (function_exists('com_create_guid') === true)
		{
			$this->attributes['nomor_kredit'] = trim(com_create_guid(), '{}');
		}

		$this->attributes['nomor_kredit'] = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	}

	/**
	 * Add Event_list to queue
	 * @param [IEvent_list] $event_list 
	 */
	public function getNomorKreditAttribute()
	{
		if(!isset($this->attributes['nomor_kredit']))
		{
			$this->id 		= 'Manual_set';
		}

		return $this->attributes['nomor_kredit'];
	}
}