<?php

namespace TCommands\Kredit;

use TKredit\Pengajuan\Models\Pengajuan;
use TKredit\Pengajuan\Models\JaminanKendaraan_A;
use TKredit\Pengajuan\Models\JaminanTanahBangunan_A;

use TKredit\Survei\Services\HapusSurveiAsetKendaraan;
use TKredit\Survei\Services\HapusSurveiAsetUsaha;
use TKredit\Survei\Services\HapusSurveiAsetTanahBangunan;
use TKredit\Survei\Services\HapusSurveiJaminanKendaraan;
use TKredit\Survei\Services\HapusSurveiJaminanTanahBangunan;
use TKredit\Survei\Services\HapusSurveiKepribadian;
use TKredit\Survei\Services\HapusSurveiKeuangan;
use TKredit\Survei\Services\HapusSurveiNasabah;
use TKredit\Survei\Services\HapusSurveiRekening;

use Exception, DB, TAuth, Carbon\Carbon;

class HapusSurveiKredit
{
	protected $survei;
	protected $kredit;

	/**
	 * Create a new job instance.
	 *
	 * @param  $survei
	 * @return void
	 */
	public function __construct($kredit, $survei)
	{
		$this->survei		= $survei;
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
			$kredit 		= Pengajuan::findorfail($this->kredit['id']);
	
			DB::BeginTransaction();

			if(isset($this->survei['aset_kendaraan']))
			{
				$survei 	= new HapusSurveiAsetKendaraan(['id' => $this->kredit['id']], $this->survei['aset_kendaraan']);
				$survei->handle();
			}

			if(isset($this->survei['aset_usaha']))
			{
				$survei 	= new HapusSurveiAsetUsaha(['id' => $this->kredit['id']], $this->survei['aset_usaha']);
				$survei->handle();
			}

			if(isset($this->survei['aset_tanah_bangunan']))
			{
				$survei 	= new HapusSurveiAsetTanahBangunan(['id' => $this->kredit['id']], $this->survei['aset_tanah_bangunan']);
				$survei->handle();
			}

			if(isset($this->survei['jaminan_kendaraan']))
			{
				$survei 	= new HapusSurveiJaminanKendaraan(['id' => $this->kredit['id']], $this->survei['jaminan_kendaraan']);
				$survei->handle();
			}

			if(isset($this->survei['jaminan_tanah_bangunan']))
			{
				$survei 	= new HapusSurveiJaminanTanahBangunan(['id' => $this->kredit['id']], $this->survei['jaminan_tanah_bangunan']);
				$survei->handle();
			}

			if(isset($this->survei['kepribadian']))
			{
				$survei 	= new HapusSurveiKepribadian(['id' => $this->kredit['id']], $this->survei['kepribadian']);
				$survei->handle();
			}

			if(isset($this->survei['keuangan']))
			{
				$survei 	= new HapusSurveiKeuangan(['id' => $this->kredit['id']], $this->survei['keuangan']);
				$survei->handle();
			}

			if(isset($this->survei['nasabah']))
			{
				$this->survei['nasabah']['nama']	= $kredit['kreditur']['nama'];
				$survei 	= new HapusSurveiNasabah(['id' => $this->kredit['id']], $this->survei['nasabah']);
				$survei->handle();
			}

			if(isset($this->survei['rekening']))
			{
				$survei 	= new HapusSurveiRekening(['id' => $this->kredit['id']], $this->survei['rekening']);
				$survei->handle();
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