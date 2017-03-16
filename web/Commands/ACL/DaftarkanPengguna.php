<?php

namespace Thunderlabid\Web\Commands\ACL;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Thunderlabid\Immigration\Models\Pengguna;

use Exception;

class DaftarkanPengguna implements ShouldQueue
{
	use InteractsWithQueue, Queueable, SerializesModels;

	protected $pengguna;

	/**
	 * Create a new job instance.
	 *
	 * @param  $pengguna
	 * @return void
	 */
	public function __construct($pengguna)
	{
		$this->pengguna     = $pengguna;
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
			$pengguna		= new Pengguna;
			$pengguna		= $pengguna->fill($this->pengguna);
			$pengguna->save();

			return true;
		}
		catch(Exception $e)
		{
			throw $e;
			
		}
	}
}