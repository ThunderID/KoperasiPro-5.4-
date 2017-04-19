<?php

namespace TCommands\Kredit;

use TKredit\Pengajuan\Models\Pengajuan;
use TKredit\Survei\Models\Survei;
use TKredit\KreditAktif\Models\KreditAktif_RO;
use TKredit\RiwayatKredit\Models\RiwayatKredit_RO;

use Exception, DB, TAuth, Carbon\Carbon, Validator;

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

			//validasi data pengajuan
			$rules 			= 	[
									'required|nik'					=> 'required|max:255',
									'required|nama'					=> 'required|max:255',
									'required|tanggal_lahir'		=> 'required|date_format:"Y-m-d"',
									'required|jenis_kelamin'		=> 'required|in:laki-laki,perempuan',
									'required|status_perkawinan'	=> 'required|in:kawin,belum_kawin,cerai,cerai_mati',
								];

			$validator		= Validator::make($kredit->toArray(), $rules);

			if(!$validator->passes())
			{
				throw new Exception($validator->messages()->toJson(), 1);
			}

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

			//3. parse perubahan status
			$riwayat 		= ['status' => 'survei', 'tanggal' => Carbon::now()->format('d/m/Y'), 'nomor_dokumen_kredit' => $kredit['id']];
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