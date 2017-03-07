<?php

namespace Thunderlabid\Registry\Events\Traits;
use Thunderlabid\Registry\Events\Interfaces\IEvent;
use InvalidArgumentException;
use Illuminate\Contracts\Queue\ShouldQueue;

trait IEventQueueTrait
{
	protected $events = [];

	/**
	 * Add Job to queue
	 * @param [ShouldQueue] $job 
	 */
	public function addEvent($job)
	{
		if (!$job instanceOf ShouldQueue)
		{
			throw new InvalidArgumentException('Parameter 1 must be ShouldQueue');
		}

		$this->events[] = $job;
	}

	/**
	 * Raise events
	 * @return void
	 */
	public function raiseEvent()
	{
		foreach ($this->events as $job)
		{
			dispatch($job);
		}
	}
}