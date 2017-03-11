<?php

namespace App\Listeners;

use Thunderlabid\Immigration\Events\VisaGrantedEvent;

class WriteVisaNotification
{
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  VisaGrantedEvent  $event
	 * @return void
	 */
	public function handle(VisaGrantedEvent $event)
	{
		\Log::info($event->model->id);

		return true;
	}
}
