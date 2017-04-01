<?php

namespace Thunderlabid\API\Commands\Credit;

use Thunderlabid\Credit\Models\Kredit;
use Thunderlabid\Credit\Models\PengajuanMobile_RO;

use Exception, DB, TAuth, Carbon\Carbon;

class AjukanKredit
{
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

			//0a. add status
			$status 	= [
				'status'		=> 'pengajuan',
				'tanggal'		=> Carbon::now()->format('d/m/Y'),
				'petugas'		=> [
					'id'			=> $this->kredit['mobile']['id'],
					'nama'			=> $this->kredit['mobile']['model'],
					'role'			=> 'mobile_apps',
				]
			];

			//0b. parse kreditur ID
			$this->kredit['kreditur_id']	= 0;
			$this->kredit['ro_koperasi_id']	= 0;

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
					$kredit = $kredit->tambahJaminanTanahBangunan($value);
				}
			}

			$kredit = $kredit->SetKreditur($this->kredit['kreditur']);
			$kredit = $kredit->SetStatus($status);
			$kredit->save();

			$this->kredit['mobile']['kredit_id']	= $kredit->id;

			$data_mobile	= new PengajuanMobile_RO;
			$data_mobile 	= $data_mobile->fill($this->kredit['mobile']);
			$data_mobile->save();

			DB::commit();

			return $kredit->toArray();
		}
		catch(Exception $e)
		{
			DB::rollback();
			throw $e;
		}
	}
}
