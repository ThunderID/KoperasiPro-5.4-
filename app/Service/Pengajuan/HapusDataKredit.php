<?php

namespace App\Service\Pengajuan;

use App\Domain\Pengajuan\Models\Relasi;
use App\Domain\Pengajuan\Models\Pengajuan;
use App\Domain\Pengajuan\Models\JaminanKendaraan;
use App\Domain\Pengajuan\Models\JaminanTanahBangunan;

use App\Domain\Survei\Models\AsetUsaha;
use App\Domain\Survei\Models\AsetKendaraan;
use App\Domain\Survei\Models\AsetTanahBangunan;

use App\Domain\Survei\Models\Rekening;
use App\Domain\Survei\Models\Keuangan;

use Exception, DB, TAuth, Carbon\Carbon;

class HapusDataKredit
{
	protected $id;

	/**
	 * Create a new job instance.
	 *
	 * @param  $kredit
	 * @return void
	 */
	public function __construct($id)
	{
		$this->id     				= $id;
		$this->pengajuan 			= Pengajuan::id($id)->where('akses_koperasi_id', TAuth::activeOffice()['koperasi']['id'])->firstorfail();
	}

	public function hapusJaminanKendaraan($id)
	{
		$this->jaminan_kendaraan_ids[] 				= $id;

		return $this;
	}

	public function hapusJaminanTanahBangunan($id)
	{
		$this->jaminan_tanah_bangunan_ids[] 		= $id;

		return $this;
	}

	public function hapusSurveiJaminanKendaraan($id)
	{
		$this->survei_jaminan_kendaraan_ids[] 		= $id;

		return $this;
	}

	public function hapusSurveiJaminanTanahBangunan($id)
	{
		$this->survei_jaminan_tanah_bangunan_ids[] 	= $id;

		return $this;
	}

	public function hapusSurveiAsetUsaha($id)
	{
		$this->survei_aset_usaha_ids[] 				= $id;

		return $this;
	}

	public function hapusSurveiAsetTanahBangunan($id)
	{
		$this->survei_aset_tanah_bangunan_ids[] 	= $id;

		return $this;
	}

	public function hapusSurveiAsetKendaraan($id)
	{
		$this->survei_aset_kendaraan_ids[] 			= $id;

		return $this;
	}

	public function hapusSurveiRekening($id)
	{
		$this->survei_rekening_ids[] 				= $id;

		return $this;
	}

	public function hapusSurveiKepribadian($id)
	{
		$this->survei_kepribadian_ids[] 			= $id;

		return $this;
	}

	public function hapusSurveiKeuangan($id)
	{
		$this->survei_keuangan_ids[] 				= $id;

		return $this;
	}

	public function hapusRelasiDebitur($id)
	{
		$this->relasi_ids[] 						= $id;

		return $this;
	}
	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function save()
	{
		try
		{
			// DB::BeginTransaction();

			$jaminan_k 		= JaminanKendaraan::id($this->jaminan_kendaraan_ids)->where('pengajuan_id', $this->id)->delete();

			$jaminan_tb 	= JaminanTanahBangunan::id($this->jaminan_tanah_bangunan_ids)->where('pengajuan_id', $this->id)->delete();

			$sjaminan_k 	= SJaminanKendaraan::id($this->survei_jaminan_kendaraan_ids)->whereIn('jaminan_kendaraan_id', $this->jaminan_kendaraan_ids)->delete();
			$sjaminan_tb 	= SJaminanTanahBangunan::id($this->survei_jaminan_tanah_bangunan_ids)->whereIn('jaminan_tanah_bangunan_id', $this->jaminan_tanah_bangunan_ids)->delete();

			$aset_u 		= AsetUsaha::id($this->survei_aset_usaha_ids)->where('pengajuan_id', $this->id)->delete();
			$aset_k 		= AsetKendaraan::id($this->survei_aset_kendaraan_ids)->where('pengajuan_id', $this->id)->delete();
			$aset_tb 		= AsetTanahBangunan::id($this->survei_aset_tanah_bangunan_ids)->where('pengajuan_id', $this->id)->delete();

			$rekening 		= Rekening::id($this->survei_rekening_ids)->where('pengajuan_id', $this->id)->delete();
			$keuangan 		= Keuangan::id($this->survei_keuangan_ids)->where('pengajuan_id', $this->id)->delete();
			
			$relasi 		= Relasi::id($this->relasi_ids)->where('orang_id', $this->pengajuan->orang_id)->delete();

			// DB::commit();

			return $this->pengajuan->toArray();
		}
		catch(Exception $e)
		{
			// DB::rollback();
			throw $e;
		}
	}
}