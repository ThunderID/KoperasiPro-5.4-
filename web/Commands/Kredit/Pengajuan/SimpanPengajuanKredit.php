<?php

namespace TCommands\Kredit;

use TKredit\Pengajuan\Models\Pengajuan;

use TKredit\Pengajuan\Services\SimpanPengajuanKreditur;
use TKredit\Pengajuan\Services\SimpanPengajuanJaminanKendaraan;
use TKredit\Pengajuan\Services\SimpanPengajuanJaminanTanahBangunan;

use Exception, DB, TAuth, Carbon\Carbon;

class SimpanPengajuanKredit
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

			$kredit->fill($this->pengajuan);

			if(isset($this->pengajuan['jaminan_kendaraan']))
			{
				$pengajuan 	= new SimpanPengajuanJaminanKendaraan(['id' => $this->kredit_id], $this->pengajuan['jaminan_kendaraan']);
				$pengajuan->handle();
			}

			if(isset($this->pengajuan['jaminan_tanah_bangunan']))
			{
				$pengajuan 	= new SimpanPengajuanJaminanTanahBangunan(['id' => $this->kredit_id], $this->pengajuan['jaminan_tanah_bangunan']);
				$pengajuan->handle();
			}

			if(isset($this->pengajuan['kreditur']))
			{
				$pengajuan 	= new SimpanPengajuanKreditur(['id' => $this->kredit_id], $this->pengajuan['kreditur']);
				$pengajuan->handle();
			}

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