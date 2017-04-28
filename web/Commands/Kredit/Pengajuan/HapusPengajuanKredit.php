<?php

namespace TCommands\Kredit;

use TKredit\Pengajuan\Models\Pengajuan;

use TKredit\Pengajuan\Services\HapusPengajuanKreditur;
use TKredit\Pengajuan\Services\HapusPengajuanJaminanKendaraan;
use TKredit\Pengajuan\Services\HapusPengajuanJaminanTanahBangunan;

use Exception, DB, TAuth, Carbon\Carbon;

class HapusPengajuanKredit
{
	protected $pengajuan;
	protected $kredit_id;

	/**
	 * Create a new job instance.
	 *
	 * @param  $pengajuan
	 * @return void
	 */
	public function __construct($kredit_id, $pengajuan)
	{
		$this->pengajuan	= $pengajuan;
		$this->kredit_id	= $kredit_id;
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
			$kredit 		= Pengajuan::findorfail($this->kredit_id);
	
			DB::BeginTransaction();

			if(isset($this->pengajuan['jaminan_kendaraan']))
			{
				$pengajuan 	= new HapusPengajuanJaminanKendaraan(['id' => $this->kredit_id], $this->pengajuan['jaminan_kendaraan']);
				$pengajuan->handle();
			}

			if(isset($this->pengajuan['jaminan_tanah_bangunan']))
			{
				$pengajuan 	= new HapusPengajuanJaminanTanahBangunan(['id' => $this->kredit_id], $this->pengajuan['jaminan_tanah_bangunan']);
				$pengajuan->handle();
			}

			if(isset($this->pengajuan['kreditur']))
			{
				$pengajuan 	= new HapusPengajuanKreditur(['id' => $this->kredit_id], $this->pengajuan['kreditur']);
				$pengajuan->handle();
			}

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