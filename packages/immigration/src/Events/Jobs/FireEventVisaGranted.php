<?php

namespace Thunderlabid\Immigration\Events\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Thunderlabid\Immigration\Events\VisaGrantedEvent;

class FireEventVisaGranted implements ShouldQueue
{
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($model)
	{
		//
		$this->model 		= $model;
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle()
	{
		//
		event(new VisaGrantedEvent($this->model));

		return true;
	}
}