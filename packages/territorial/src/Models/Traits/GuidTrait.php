<?php

namespace TTerritorial\Models\Traits;

/**
 * Trait Link list
 *
 * Digunakan untuk initizialize link list mode
 *
 * @package    Thunderlabid
 * @subpackage Territorial
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
trait GuidTrait {
 	
 	/**
	 * Boot the scope.
	 * 
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->attributes['id']		= $this->createID('test');
	}

	/**
	 * Add Event_list to queue
	 * @param [IEvent_list] $event_list 
	 */
	public static function createID($value)
	{
		if (function_exists('com_create_guid') === true)
		{
			return trim(com_create_guid(), '{}');
		}

		return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	}
}