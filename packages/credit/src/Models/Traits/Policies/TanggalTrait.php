<?php

namespace Thunderlabid\Credit\Models\Traits\Policies;

use Carbon\Carbon;

/**
 * Trait Link list
 *
 * Digunakan untuk initizialize link list mode
 *
 * @package    Thunderlabid
 * @subpackage Credit
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
trait TanggalTrait {

 	/**
	 * Add Event_list to queue
	 * @param [IEvent_list] $event_list 
	 */
	public function formatDateFrom($value)
	{
		return Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
	}

	/**
	 * Add Event_list to queue
	 * @param [IEvent_list] $event_list 
	 */
	public function formatDateTo($value)
	{
		return Carbon::parse($value)->format('d/m/Y');
	}
}