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
			$kredit 		= Pengajuan::findorfail($this->kredit_id);
	
			DB::BeginTransaction();

			if(isset($this->survei['aset_kendaraan']))
			{
				$survei 	= new HapusSurveiAsetKendaraan(['id' => $kredit['id']], $this->survei['aset_kendaraan']);
				$survei->handle();
			}

			if(isset($this->survei['aset_usaha']))
			{
				$survei 	= new HapusSurveiAsetUsaha(['id' => $kredit['id']], $this->survei['aset_usaha']);
				$survei->handle();
			}

			if(isset($this->survei['aset_tanah_bangunan']))
			{
				$survei 	= new HapusSurveiAsetTanahBangunan(['id' => $kredit['id']], $this->survei['aset_tanah_bangunan']);
				$survei->handle();
			}

			if(isset($this->survei['jaminan_kendaraan']))
			{
				//1. find prev jaminan kendaraan
				$j_kend		= JaminanKendaraan_A::where('pengajuan_id', $this->kredit_id)->nomorbpkb($this->survei['jaminan_kendaraan']['nomor_bpkb'])->firstorfail();

				//2. parse prev jaminan kendaraan and it prev's stuffs
				$this->survei['jaminan_kendaraan']['tipe']		 = $j_kend['tipe'];
				$this->survei['jaminan_kendaraan']['merk']		 = $j_kend['merk'];
				$this->survei['jaminan_kendaraan']['tahun']		 = $j_kend['tahun'];
				$this->survei['jaminan_kendaraan']['atas_nama']	 = $j_kend['atas_nama'];
				
				$survei 	= new HapusSurveiJaminanKendaraan(['id' => $kredit['id']], $this->survei['jaminan_kendaraan']);
				$survei->handle();
			}

			if(isset($this->survei['jaminan_tanah_bangunan']))
			{
				//1. find prev jaminan kendaraan
				$j_t_ban 	= JaminanTanahBangunan_A::where('pengajuan_id', $this->kredit_id)->nomorsertifikat($this->survei['jaminan_tanah_bangunan']['nomor_sertifikat'])->with(['alamat'])->firstorfail()->toArray();

				//2. parse prev jaminan kendaraan and it prev's stuffs
				$this->survei['jaminan_tanah_bangunan']['tipe']		 		= $j_t_ban['tipe'];
				$this->survei['jaminan_tanah_bangunan']['jenis_sertifikat']	= $j_t_ban['jenis_sertifikat'];
				$this->survei['jaminan_tanah_bangunan']['masa_berlaku_sertifikat']	 = $j_t_ban['masa_berlaku_sertifikat'];
				$this->survei['jaminan_tanah_bangunan']['atas_nama'] 	= $j_t_ban['atas_nama'];
				$this->survei['jaminan_tanah_bangunan']['luas_tanah']	= $j_t_ban['luas_tanah'];
				$this->survei['jaminan_tanah_bangunan']['luas_bangunan']= $j_t_ban['luas_bangunan'];
				$this->survei['jaminan_tanah_bangunan']['alamat']		= $j_t_ban['alamat'];

				$survei 	= new HapusSurveiJaminanTanahBangunan(['id' => $kredit['id']], $this->survei['jaminan_tanah_bangunan']);
				$survei->handle();
			}

			if(isset($this->survei['kepribadian']))
			{
				$survei 	= new HapusSurveiKepribadian(['id' => $kredit['id']], $this->survei['kepribadian']);
				$survei->handle();
			}

			if(isset($this->survei['keuangan']))
			{
				$survei 	= new HapusSurveiKeuangan(['id' => $kredit['id']], $this->survei['keuangan']);
				$survei->handle();
			}

			if(isset($this->survei['nasabah']))
			{
				$this->survei['nasabah']['nama']	= $kredit['kreditur']['nama'];
				$survei 	= new HapusSurveiNasabah(['id' => $kredit['id']], $this->survei['nasabah']);
				$survei->handle();
			}

			if(isset($this->survei['rekening']))
			{
				$survei 	= new HapusSurveiRekening(['id' => $kredit['id']], $this->survei['rekening']);
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