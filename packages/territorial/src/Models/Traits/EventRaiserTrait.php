<?php

namespace TTerritorial\Models\Traits;

use TTerritorial\Models\Observers\EventObserver;

/**
 * Trait event raiser
 *
 * Digunakan untuk model aggregate root dan aggregate 
 *
 * @package    Thunderlabid
 * @subpackage Territorial
 * @author     C Mooy <chelsymooy1108@gmail.com>
 */
trait EventRaiserTrait {
 	
	protected $event_lists 	= [];

	public static function bootEventRaiserTrait()
	{
        static::observe(new EventObserver());
	}

	/**
	 * Add Event_list to queue
	 * @param array $event_list 
	 */
	public function addEvent($event_list)
	{
		if (!$event_list instanceOf ShouldQueue)
		{
			throw new InvalidArgumentException('Parameter 1 must be ShouldQueue');
		}

		$this->event_lists[] 	= $event_list;
	}

	/**
	 * Raise Event_lists
	 * @return void
	 */
	public function raiseEvent()
	{
		foreach ($this->event_lists as $event_list)
		{
			event(new $event_list($this->toArray()));
		}
	}
}