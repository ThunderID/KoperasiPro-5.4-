<?php

namespace Thunderlabid\Web\Commands\ACL;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Thunderlabid\Immigration\Models\Pengguna;

use Exception;

class GrantVisa implements ShouldQueue
{
	use InteractsWithQueue, Queueable, SerializesModels;

	protected $pengguna_id;
	protected $visa;

	/**
	 * Create a new job instance.
	 *
	 * @param  $pengguna_id
	 * @return void
	 */
	public function __construct($pengguna_id, $visa)
	{
		$this->pengguna_id     = $pengguna_id;
		$this->visa  		   = $visa;
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
			$pengguna		= Pengguna::findorfail($this->pengguna_id);
			$pengguna		= $pengguna->grantVisa($this->visa);
			$pengguna->save();

			return true;
		}
		catch(Exception $e)
		{
			throw $e;
			
		}
	}
}