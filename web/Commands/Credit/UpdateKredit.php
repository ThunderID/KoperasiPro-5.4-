<?php

namespace Thunderlabid\Web\Commands\Credit;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Thunderlabid\Credit\Models\Kredit;

use Exception, DB, TAuth, Carbon\Carbon;

class UpdateKredit implements ShouldQueue
{
	use InteractsWithQueue, Queueable, SerializesModels;

	protected $id_kredit;
	protected $kredit;

	/**
	 * Create a new job instance.
	 *
	 * @param  $kredit
	 * @return void
	 */
	public function __construct($id_kredit, $kredit)
	{
		$this->id_kredit	= $id_kredit;
		$this->kredit		= $kredit;
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
			$kredit 			= Kredit::findorfail($this->id_kredit);

			DB::BeginTransaction();

			$kredit->fill($this->kredit);

			$kredit->save();

			DB::commit();

			return true;
		}
		catch(Exception $e)
		{
			DB::rollback();
			throw $e;
		}
	}
}