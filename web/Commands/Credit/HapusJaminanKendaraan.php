<?php

namespace Thunderlabid\Application\Commands\Credit;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Thunderlabid\Credit\Models\Kredit;

use Exception, DB, TAuth, Carbon\Carbon;

class HapusJaminanKendaraan implements ShouldQueue
{
	use InteractsWithQueue, Queueable, SerializesModels;

	protected $kredit_id;
	protected $nomor_bpkb;

	/**
	 * Create a new job instance.
	 *
	 * @param  $kredit_id
	 * @return void
	 */
	public function __construct($kredit_id, $nomor_bpkb)
	{
		$this->kredit_id		= $kredit_id;
		$this->nomor_bpkb		= $nomor_bpkb;
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
			DB::BeginTransaction();

			//3. simpan kredit
			$kredit		= Kredit::findorfail($this->kredit_id);
			$kredit 	= $kredit->hapusJaminanKendaraan($this->nomor_bpkb);
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