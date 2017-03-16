<?php

namespace Thunderlabid\Web\Commands\Credit;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Thunderlabid\Credit\Models\Kredit;

use Exception, DB, TAuth, Carbon\Carbon;

class AjukanKredit implements ShouldQueue
{
	use InteractsWithQueue, Queueable, SerializesModels;

	protected $kredit;

	/**
	 * Create a new job instance.
	 *
	 * @param  $kredit
	 * @return void
	 */
	public function __construct($kredit)
	{
		$this->kredit     = $kredit;
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

			//1. parsing parameter status
			$status 	=	[
					'status'	=> 'pengajuan',
					'petugas'	=> [
						'id' 	=> TAuth::loggedUser()['id'],
						'nama' 	=> TAuth::loggedUser()['nama'],
						'role' 	=> TAuth::activeOffice()['role'],
					],
			]; 

			//2. parsing parameter koperasi
			$koperasi 	= [
					'id' 		=> TAuth::activeOffice()['koperasi']['id'],
					'nama' 		=> TAuth::activeOffice()['koperasi']['nama'],
			];

			//3. simpan kredit
			$kredit		= new Kredit;
			$kredit		= $kredit->fill($this->kredit);
			$kredit->SetKreditur($this->kredit['kreditur']);
			$kredit->SetStatus($status);
			$kredit->SetKoperasi($koperasi);

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