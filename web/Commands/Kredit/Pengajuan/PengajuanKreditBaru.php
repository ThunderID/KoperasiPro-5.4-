<?php

namespace TCommands\Kredit;

use TKredit\Pengajuan\Models\Pengajuan;
use TKredit\Pengajuan\Models\PengajuanMobile_RO;
use TKredit\Pengajuan\Models\Petugas_RO;

use TKredit\KreditAktif\Models\KreditAktif_RO;
use TKredit\RiwayatKredit\Models\RiwayatKredit_RO;

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

			if(isset($this->kredit['spesimen_ttd']))
			{
				$kredit 		= $kredit->setSpesimenTTD($this->kredit['spesimen_ttd']);
			}

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
			elseif(isset($this->kredit['lokasi']))
			{
				$kaktif['ro_koperasi_id']		= $this->kredit['lokasi'];
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

				if(isset($this->kredit['referensi']))
				{
					$referensi			= new Petugas_RO;
					$referensi_ro		= $referensi->findornew($this->kredit['referensi']['id']);
					$referensi_ro->fill([
						'id' 	=> $this->kredit['referensi']['id'],
						'nama' 	=> $this->kredit['referensi']['nama'],
						'role' 	=> 'AO/Marketing',
					]);

					$referensi_ro->save();

					$kredit->referensi_id		= $referensi_ro->id;
				}
				else
				{
					//3a. check if it has previous pengajuan
					$total_mobile  	= PengajuanMobile_RO::where('mobile_id', $this->kredit['mobile'])->get(['kredit_id']);

					$check_kredit 	= KreditAktif_RO::nomordokumenkredit($total_mobile)->status('pengajuan')->count();

					if($check_kredit > 2)
					{
						throw new Exception("Maksimal pengajuan kredit adalah 3", 1);
					}
				}
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

			//6. parse perubahan status
			$riwayat 		= ['status' => 'pengajuan', 'tanggal' => Carbon::now()->format('d/m/Y'), 'nomor_dokumen_kredit' => $kredit['id']];
			$status 		= new RiwayatKredit_RO;
			$status->fill($riwayat);
			$status->save();

			DB::commit();

			return $kredit_aktif;
		}
		catch(Exception $e)
		{
			DB::rollback();
			throw $e;
		}
	}
}