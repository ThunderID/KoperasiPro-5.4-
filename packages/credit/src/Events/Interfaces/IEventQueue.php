<?php

namespace Thunderlabid\Credit\Events\Interfaces;

interface IEventQueue
{
	/**
	 * Add Event to queue
	 * @param [IEvent] $event 
	 */
	public function addEvent($event);

	/**
	 * Raise Events
	 * @return void
	 */
	public function raiseEvent();
}