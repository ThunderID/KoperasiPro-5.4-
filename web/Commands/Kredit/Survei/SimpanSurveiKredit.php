<?php

namespace TCommands\Kredit;

use Thunderlabid\Kredit\Models\Kredit;

use Exception, DB, TAuth, Carbon\Carbon;

class SimpanSurveiKredit
{
	protected $survei;
	protected $kredit_id;

	/**
	 * Create a new job instance.
	 *
	 * @param  $survei
	 * @return void
	 */
	public function __construct($kredit_id, $survei)
	{
		$this->survei		= $survei;
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
			$kredit 		= Kredit::findorfail($this->kredit_id);
	
			DB::BeginTransaction();

			$survei_base 	= 	[
									'petugas' 	=> [
										'id'	=> TAuth::loggedUser()['id'],
										'nama'	=> TAuth::loggedUser()['nama'],
										'role' 	=> TAuth::activeOffice()['role'],
									],
									'nomor_dokumen_kredit'	=> $this->kredit_id,
									'tanggal_survei'		=> $this->survei['tanggal_survei'],
								];

			if(isset($this->survei['aset_kendaraan']))
			{
				$survei 	= new SimpanSurveiAsetKendaraan($survei_base, $this->survei['aset_kendaraan']);
				$survei->handle();
			}

			if(isset($this->survei['aset_usaha']))
			{
				$survei 	= new SimpanSurveiAsetUsaha($survei_base, $this->survei['aset_usaha']);
				$survei->handle();
			}

			if(isset($this->survei['aset_tanah_bangunan']))
			{
				$survei 	= new SimpanSurveiAsetTanahBangunan($survei_base, $this->survei['aset_tanah_bangunan']);
				$survei->handle();
			}

			if(isset($this->survei['jaminan_kendaraan']))
			{
				$survei 	= new SimpanSurveiJaminanKendaraan($survei_base, $this->survei['jaminan_kendaraan']);
				$survei->handle();
			}

			if(isset($this->survei['jaminan_tanah_bangunan']))
			{
				$survei 	= new SimpanSurveiJaminanTanahBangunan($survei_base, $this->survei['jaminan_tanah_bangunan']);
				$survei->handle();
			}

			if(isset($this->survei['kepribadian']))
			{
				$survei 	= new SimpanSurveiKepribadian($survei_base, $this->survei['kepribadian']);
				$survei->handle();
			}

			if(isset($this->survei['keuangan']))
			{
				$survei 	= new SimpanSurveiKeuangan($survei_base, $this->survei['keuangan']);
				$survei->handle();
			}

			if(isset($this->survei['nasabah']))
			{
				$survei 	= new SimpanSurveiNasabah($survei_base, $this->survei['nasabah']);
				$survei->handle();
			}

			if(isset($this->survei['rekening']))
			{
				$survei 	= new SimpanSurveiRekening($survei_base, $this->survei['rekening']);
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