<?php

namespace Thunderlabid\Application\Commands\Credit;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Thunderlabid\Credit\Models\Kredit;

use Exception, DB, TAuth, Carbon\Carbon;

class HapusJaminanTanahBangunan implements ShouldQueue
{
	use InteractsWithQueue, Queueable, SerializesModels;

	protected $kredit_id;
	protected $nomor_sertifikat;

	/**
	 * Create a new job instance.
	 *
	 * @param  $kredit_id
	 * @return void
	 */
	public function __construct($kredit_id, $nomor_sertifikat)
	{
		$this->kredit_id			= $kredit_id;
		$this->nomor_sertifikat		= $nomor_sertifikat;
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
			$kredit 	= $kredit->hapusJaminanTanahBangunan($this->nomor_sertifikat);
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