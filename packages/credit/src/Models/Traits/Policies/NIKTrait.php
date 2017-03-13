<?php

namespace Thunderlabid\Credit\Models\Traits\Policies;

use Thunderlabid\Credit\Exceptions\NIKException;

/**
 * Trait Link list
 *
 * Digunakan untuk initizialize link list mode
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
trait NIKTrait {

 	/**
	 * Add Event_list to queue
	 * @param [IEvent_list] $event_list 
	 */
	public function formatNikFrom($value)
	{
		list($pp,$kk, $cc, $hhbbtt, $rrrr) 	= array_map('trim', explode('-', $value));

		if(!str_is($pp, '35'))
		{
			throw new NIKException("Jawa Timur", 1);
		}

		return $value;
	}

	/**
	 * Add Event_list to queue
	 * @param [IEvent_list] $event_list 
	 */
	public function formatNikTo($value)
	{
		return $value;
	}
}