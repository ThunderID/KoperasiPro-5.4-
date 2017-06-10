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
			$nomor_kredit 	= KreditAktif_RO::where('nomor_kredit', $kredit['id'])->first()->toArray();
			$kredit 		= Pengajuan::id($nomor_kredit['nomor_dokumen_kredit'])->with(['kreditur'])->firstorfail();

			DB::BeginTransaction();

			//1. hapus dokumen sebelumnya
			$kredit_aktif 	= KreditAktif_RO::NomorDokumenKredit($kredit['id'])->delete();

			//2. simpan kredit aktif
			$kaktif			=	[
									'nomor_kredit'			=> $this->kredit_id,
									'nomor_dokumen_kredit'	=> $kredit['id'],
									'pengajuan_kredit'		=> $kredit['pengajuan_kredit'],
									'status'				=> 'terealisasi',
									'tanggal'				=> $kredit['tanggal_pengajuan'],
									'nama_kreditur'			=> $kredit['kreditur']['nama'],
									'ro_koperasi_id'		=> TAuth::activeOffice()['koperasi']['id'],
									'ro_mobile_model_id'	=> $nomor_kredit['ro_mobile_model_id'],
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