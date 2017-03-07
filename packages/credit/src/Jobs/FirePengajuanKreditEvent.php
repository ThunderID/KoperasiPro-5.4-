<?php

namespace Thunderlabid\Credit\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Thunderlabid\Credit\Events\PengajuanKreditEvent;

class FirePengajuanKreditEvent implements ShouldQueue
{
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	public $entity;

	/**
	 * Create a new job instance.
	 *
	 * @return void
	 */
	public function __construct($entity)
	{
		//
		$this->entity 	= $entity;
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle()
	{
		//
		event(new PengajuanKreditEvent($this->entity));

		return true;
	}
}