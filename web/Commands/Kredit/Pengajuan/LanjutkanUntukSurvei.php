<?php

namespace TCommands\Kredit;

use TKredit\Pengajuan\Models\Pengajuan;
use TKredit\Survei\Models\Survei;
use TKredit\KreditAktif\Models\KreditAktif_RO;

use Exception, DB, TAuth, Carbon\Carbon;

class LanjutkanUntukSurvei
{
	protected $kredit_id;

	/**
	 * Create a new job instance.
	 *
	 * @param  $pengajuan
	 * @return void
	 */
	public function __construct($kredit_id)
	{
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
			//check data pengajuan
			$kredit 		= Pengajuan::id($this->kredit_id)->with(['kreditur'])->firstorfail();

			//check data survei
			$survei 		= Survei::NomorDokumenKredit($this->kredit_id)->first();
			if($survei)
			{
				throw new Exception("Dokumen sudah di setujui untuk survei", 1);
			}

			DB::BeginTransaction();

			//1. hapus dokumen sebelumnya
			$kredit_aktif 	= KreditAktif_RO::NomorDokumenKredit($kredit['id'])->delete();

			//2. simpan kredit aktif
			$kaktif			=	[
									'nomor_kredit'			=> 0,
									'nomor_dokumen_kredit'	=> $kredit['id'],
									'pengajuan_kredit'		=> $kredit['pengajuan_kredit'],
									'status'				=> 'survei',
									'tanggal'				=> $kredit['tanggal_pengajuan'],
									'nama_kreditur'			=> $kredit['kreditur']['nama'],
									'ro_koperasi_id'		=> TAuth::activeOffice()['koperasi']['id'],
									'ro_mobile_model_id'	=> 0,
								];
			$kredit_aktif 	= new KreditAktif_RO;
			$kredit_aktif->fill($kaktif);
			$kredit_aktif->save();

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