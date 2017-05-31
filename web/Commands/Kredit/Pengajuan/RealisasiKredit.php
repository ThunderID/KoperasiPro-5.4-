<?php

namespace TCommands\Kredit;

use TKredit\Pengajuan\Models\Pengajuan;
use TKredit\KreditAktif\Models\KreditAktif_RO;
use TKredit\RiwayatKredit\Models\RiwayatKredit_RO;

use Exception, DB, TAuth, Carbon\Carbon, Validator;

class RealisasiKredit
{
	protected $kredit_id;
	protected $catatan;

	/**
	 * Create a new job instance.
	 *
	 * @param  $pengajuan
	 * @return void
	 */
	public function __construct($kredit_id, $catatan = '')
	{
		$this->kredit_id	= $kredit_id;
		$this->catatan		= $catatan;
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

			DB::BeginTransaction();

			//1. hapus dokumen sebelumnya
			$kredit_aktif 	= KreditAktif_RO::NomorDokumenKredit($kredit['id'])->delete();

			//2. simpan kredit aktif
			$kaktif			=	[
									'nomor_kredit'			=> 0,
									'nomor_dokumen_kredit'	=> $kredit['id'],
									'pengajuan_kredit'		=> $kredit['pengajuan_kredit'],
									'status'				=> 'terealisasi',
									'tanggal'				=> $kredit['tanggal_pengajuan'],
									'nama_kreditur'			=> $kredit['kreditur']['nama'],
									'ro_koperasi_id'		=> TAuth::activeOffice()['koperasi']['id'],
									'ro_mobile_model_id'	=> 0,
								];
			$kredit_aktif 	= new KreditAktif_RO;
			$kredit_aktif->fill($kaktif);
			$kredit_aktif->save();

			//3. parse perubahan status
			$riwayat 		= ['status' => 'terealisasi', 'tanggal' => Carbon::now()->format('d/m/Y'), 'nomor_dokumen_kredit' => $kredit['id'], 'catatan' => $this->catatan];
			$status 		= new RiwayatKredit_RO;
			$status->fill($riwayat);
			$status->save();

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