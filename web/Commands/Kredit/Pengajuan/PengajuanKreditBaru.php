<?php

namespace TCommands\Kredit;

use TKredit\Pengajuan\Models\Pengajuan;
use TKredit\Pengajuan\Models\PengajuanMobile_RO;

use TKredit\KreditAktif\Models\KreditAktif_RO;

use TKredit\Pengajuan\Services\SimpanPengajuanKreditur;
use TKredit\Pengajuan\Services\SimpanPengajuanJaminanKendaraan;
use TKredit\Pengajuan\Services\SimpanPengajuanJaminanTanahBangunan;

use Exception, DB, TAuth, Carbon\Carbon;

class PengajuanKreditBaru
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

			if(isset($this->kredit['tanggal_pengajuan']))
			{
				$tanggal 		= $this->kredit['tanggal_pengajuan'];
			}
			else
			{
				$tanggal 		= Carbon::now()->format("d/m/Y");
			}


			//1. init kredit
			$kredit 			= new Pengajuan;
			$kredit 			= $kredit->fill([
				'jenis_kredit'			=> $this->kredit['jenis_kredit'],
				'pengajuan_kredit'		=> $this->kredit['pengajuan_kredit'],
				'tanggal_pengajuan'		=> $tanggal,
				'jangka_waktu'			=> $this->kredit['jangka_waktu'],
				'kreditur_id'			=> 0,
				'ro_petugas_id'			=> 0,
			]);

			//1b. parse kaktif
			$kaktif				=	[
				'nomor_dokumen_kredit'	=> $kredit->id,
				'pengajuan_kredit'		=> $kredit->pengajuan_kredit,
				'status'				=> 'pengajuan',
				'tanggal'				=> $tanggal,
				'nomor_kredit'			=> 0,
				'ro_mobile_model_id'	=> 0,
				'ro_koperasi_id'		=> 0,
			];

			//2. simpan kreditur
			if(isset($this->kredit['kreditur']))
			{
				$kreditur 		= new SimpanPengajuanKreditur($kredit, $this->kredit['kreditur']);
				$kreditur->handle();

				$kaktif['nama_kreditur']	= $this->kredit['kreditur']['nama'];
			}

			//2. simpan petugas
			if(TAuth::isLogged())
			{
				$petugas 		=	[
						'petugas'	=> [
							'id' 	=> TAuth::loggedUser()['id'],
							'nama' 	=> TAuth::loggedUser()['nama'],
							'role' 	=> TAuth::activeOffice()['role'],
						],
				];

				$kredit 						=  $kredit->SetPetugas($petugas);

				$kaktif['ro_koperasi_id']		= TAuth::activeOffice()['koperasi']['id'];
			}

			//3. store mobile
			if(isset($this->kredit['mobile']))
			{
				$param			= [
					'mobile_id'			=> $this->kredit['mobile']['id'],
					'mobile_model'		=> $this->kredit['mobile']['model'],
					'kredit_id'			=> $kredit->id
				];

				$mobile 		= new PengajuanMobile_RO;
				$mobile 		= $mobile->fill($param);
				$mobile->save();
			
				$kaktif['ro_mobile_model_id']	= $mobile->mobile_id;
			}

			//4. store jaminan kendaraan
			if(isset($this->kredit['jaminan_kendaraan']))
			{
				foreach ($this->kredit['jaminan_kendaraan'] as $key => $value) 
				{
					$jaminan 	= new SimpanPengajuanJaminanKendaraan($kredit, $value);
					$jaminan->handle();
				}
			}
			
			if(isset($this->kredit['jaminan_tanah_bangunan']))
			{
				foreach ($this->kredit['jaminan_tanah_bangunan'] as $key => $value) 
				{
					$jaminan 	= new SimpanPengajuanJaminanTanahBangunan($kredit, $value);
					$jaminan->handle();
				}
			}
			
			$kredit->save();

			//5. simpan kredit aktif
			$kredit_aktif 		= new KreditAktif_RO;
			$kredit_aktif 		= $kredit_aktif->fill($kaktif);
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