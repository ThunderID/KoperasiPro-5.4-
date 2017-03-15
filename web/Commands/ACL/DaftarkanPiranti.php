<?php

namespace Thunderlabid\Application\Commands\ACL;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Thunderlabid\Immigration\Models\PandoraBox;

use Exception;

class DaftarkanPiranti implements ShouldQueue
{
	use InteractsWithQueue, Queueable, SerializesModels;

	protected $pandorabox;

	/**
	 * Create a new job instance.
	 *
	 * @param  $pandorabox
	 * @return void
	 */
	public function __construct($pandorabox)
	{
		$this->pandorabox     = $pandorabox;
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle()
	{
		try
		{
			$pandorabox		= new PandoraBox;
			$pandorabox		= $pandorabox->fill($this->pandorabox);
			$pandorabox->save();

			return true;
		}
		catch(Exception $e)
		{
			throw $e;
			
		}
	}
}