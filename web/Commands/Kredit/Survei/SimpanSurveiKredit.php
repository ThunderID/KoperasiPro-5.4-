<?php

namespace TCommands\Kredit;

use TKredit\Pengajuan\Models\Pengajuan;
use TKredit\Pengajuan\Models\JaminanKendaraan_A;
use TKredit\Pengajuan\Models\JaminanTanahBangunan_A;

use TKredit\Survei\Services\SimpanSurveiAsetKendaraan;
use TKredit\Survei\Services\SimpanSurveiAsetUsaha;
use TKredit\Survei\Services\SimpanSurveiAsetTanahBangunan;
use TKredit\Survei\Services\SimpanSurveiJaminanKendaraan;
use TKredit\Survei\Services\SimpanSurveiJaminanTanahBangunan;
use TKredit\Survei\Services\SimpanSurveiKepribadian;
use TKredit\Survei\Services\SimpanSurveiKeuangan;
use TKredit\Survei\Services\SimpanSurveiNasabah;
use TKredit\Survei\Services\SimpanSurveiRekening;

use TKredit\Survei\Services\HapusSurveiRekening;

use Exception, DB, TAuth, Carbon\Carbon;

class SimpanSurveiKredit
{
	protected $survei;
	protected $kredit_id;
	private $survei_base;

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
		$this->survei_base	= [];
	}

	public function setDuplicate($survei_base)
	{
		$this->survei_base	= $survei_base;
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

			if(isset($this->survei['tanggal_survei']))
			{
				$tanggal 	= $this->survei['tanggal_survei'];
			}
			else
			{
				$tanggal 	= Carbon::now()->format('d/m/Y');
			}

			if(!(array)$this->survei_base)
			{
				$survei_base 	= 	[
										'petugas' 	=> [
											'id'	=> TAuth::loggedUser()['id'],
											'nama'	=> TAuth::loggedUser()['nama'],
											'role' 	=> TAuth::activeOffice()['role'],
										],
										'nomor_dokumen_kredit'	=> $this->kredit_id,
										'tanggal_survei'		=> $tanggal,
									];
			}
			else
			{
				$survei_base 	= 	$this->survei_base;
			}


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
				// //1. find prev jaminan kendaraan
				// $j_kend		= JaminanKendaraan_A::where('pengajuan_id', $this->kredit_id)->nomorbpkb($this->survei['jaminan_kendaraan']['nomor_bpkb'])->firstorfail();

				// //2. parse prev jaminan kendaraan and it prev's stuffs
				// $this->survei['jaminan_kendaraan']['tipe']		 = $j_kend['tipe'];
				// $this->survei['jaminan_kendaraan']['merk']		 = $j_kend['merk'];
				// $this->survei['jaminan_kendaraan']['tahun']		 = $j_kend['tahun'];
				// $this->survei['jaminan_kendaraan']['atas_nama']	 = $j_kend['atas_nama'];
				
				$survei 	= new SimpanSurveiJaminanKendaraan($survei_base, $this->survei['jaminan_kendaraan']);
				$survei->handle();
			}

			if(isset($this->survei['jaminan_tanah_bangunan']))
			{
				// //1. find prev jaminan kendaraan
				// $j_t_ban 	= JaminanTanahBangunan_A::where('pengajuan_id', $this->kredit_id)->nomorsertifikat($this->survei['jaminan_tanah_bangunan']['nomor_sertifikat'])->with(['alamat'])->firstorfail()->toArray();

				// //2. parse prev jaminan kendaraan and it prev's stuffs
				// $this->survei['jaminan_tanah_bangunan']['tipe']		 		= $j_t_ban['tipe'];
				// $this->survei['jaminan_tanah_bangunan']['jenis_sertifikat']	= $j_t_ban['jenis_sertifikat'];
				// $this->survei['jaminan_tanah_bangunan']['masa_berlaku_sertifikat']	 = $j_t_ban['masa_berlaku_sertifikat'];
				// $this->survei['jaminan_tanah_bangunan']['atas_nama'] 	= $j_t_ban['atas_nama'];
				// $this->survei['jaminan_tanah_bangunan']['luas_tanah']	= $j_t_ban['luas_tanah'];
				// $this->survei['jaminan_tanah_bangunan']['luas_bangunan']= $j_t_ban['luas_bangunan'];
				// $this->survei['jaminan_tanah_bangunan']['alamat']		= $j_t_ban['alamat'];

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
				$this->survei['nasabah']['nama']	= $kredit['kreditur']['nama'];
				$survei 	= new SimpanSurveiNasabah($survei_base, $this->survei['nasabah']);
				$survei->handle();
			}

			if(isset($this->survei['rekening']))
			{
				$this->survei['rekening']['tanggal_awal']	= Carbon::createFromFormat('d/m/Y', $kredit['tanggal_pengajuan'])->subMonths(3)->format('d/m/Y');
				$this->survei['rekening']['tanggal_akhir']	= $kredit['tanggal_pengajuan'];

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