<?php

namespace Thunderlabid\API\Commands\Credit;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Thunderlabid\Credit\Models\Kredit;
use Thunderlabid\Credit\Models\PengajuanMobile_RO;

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

			//1. simpan kredit
			$kredit		= new Kredit;
			$kredit		= $kredit->fill($this->kredit);

			if(isset($this->kredit['jaminan_kendaraan']))
			{
				foreach ($this->kredit['jaminan_kendaraan'] as $key => $value) 
				{
					$kredit = $kredit->tambahJaminanKendaraan($value);
				}
			}
			
			if(isset($this->kredit['jaminan_tanah_bangunan']))
			{
				foreach ($this->kredit['jaminan_tanah_bangunan'] as $key => $value) 
				{
					$value['alamat']['alamat']	= $value['alamat']['regensi'];
					$kredit = $kredit->tambahJaminanTanahBangunan($value);
				}
			}

			$kredit = $kredit->pengajuan();
			$kredit->save();

			$this->kredit['mobile']['kredit_id']	= $kredit->id;

			$data_mobile	= new PengajuanMobile_RO;
			$data_mobile 	= $data_mobile->fill($this->kredit['mobile']);
			$data_mobile->save();

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