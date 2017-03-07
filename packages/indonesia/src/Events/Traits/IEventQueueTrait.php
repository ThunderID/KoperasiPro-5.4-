<?php

namespace Thunderlabid\Indonesia\Events\Traits;
use Thunderlabid\Indonesia\Events\Interfaces\IEvent;
use InvalidArgumentException;

trait IEventQueueTrait
{
	protected $events = [];

	/**
	 * Add Event to queue
	 * @param [IEvent] $event 
	 */
	public function addEvent($event)
	{
		if (!$event instanceOf IEvent)
		{
			throw new InvalidArgumentException('Parameter 1 must be IEvent');
		}

		$this->events[] = $event;
	}

	/**
	 * Raise Events
	 * @return void
	 */
	public function raiseEvent()
	{
		foreach ($this->events as $event)
		{
			event($event);
		}
	}
}