<?php

namespace Thunderlabid\Immigration\Models\Traits;

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
trait EventRaiserTrait {
 	
	protected $event_lists = [];

	/**
	 * Add Event_list to queue
	 * @param [IEvent_list] $event_list 
	 */
	public function addEvent($event_list)
	{
		if (!$event_list instanceOf ShouldQueue)
		{
			throw new InvalidArgumentException('Parameter 1 must be ShouldQueue');
		}

		$this->event_lists[] = $event_list;
	}

	/**
	 * Raise Event_lists
	 * @return void
	 */
	public function raiseEvent()
	{
		foreach ($this->event_lists as $event_list)
		{
			event($event_list);
		}
	}
}