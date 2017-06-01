<?php

namespace TCommands\Kredit;

use TKredit\Pengajuan\Models\Pengajuan;
use TKredit\Survei\Models\Survei;
use TKredit\KreditAktif\Models\KreditAktif_RO;
use TKredit\RiwayatKredit\Models\RiwayatKredit_RO;

use TKredit\Survei\Models\AsetKendaraan_A;
use TKredit\Survei\Models\AsetUsaha_A;
use TKredit\Survei\Models\AsetTanahBangunan_A;
use TKredit\Survei\Models\JaminanKendaraan_A;
use TKredit\Survei\Models\JaminanTanahBangunan_A;
use TKredit\Survei\Models\Kepribadian_A;
use TKredit\Survei\Models\Keuangan_A;
use TKredit\Survei\Models\Nasabah_A;
use TKredit\Survei\Models\Rekening_A;

use Exception, DB, TAuth, Carbon\Carbon, Validator;

class GandakanSurvei
{
	protected $kopi_dari;
	protected $kopi_ke;

	/**
	 * Create a new job instance.
	 *
	 * @param  $pengajuan
	 * @return void
	 */
	public function __construct($kopi_dari, $kopi_ke)
	{
		$this->kopi_dari	= $kopi_dari;
		$this->kopi_ke		= $kopi_ke;
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
			$dari 		= Pengajuan::id($this->kopi_dari)->with(['kreditur'])->firstorfail();

			$validate 	= KreditAktif_RO::NomorDokumenKredit($this->kopi_ke)->where('status', 'survei')->firstorfail();

			$survei_untuk_dikopi 		= Survei::NomorDokumenKredit($this->kopi_dari)->with(['petugas'])->get();
		
			DB::BeginTransaction();

			foreach ($survei_untuk_dikopi as $key => $value) 
			{
				$survei 				= [];

				$check_aset_kend 		= AsetKendaraan_A::where('survei_id', $value->id)->first();

				if($check_aset_kend)
				{
					$survei['aset_kendaraan']	= $check_aset_kend->toArray();
					unset($survei['aset_kendaraan']['id']);
				}

				$check_aset_usaha 		= AsetUsaha_A::where('survei_id', $value->id)->with(['alamat'])->first();

				if($check_aset_usaha)
				{
					$survei['aset_usaha']= $check_aset_usaha->toArray();
					unset($survei['aset_usaha']['id']);
				}

				$check_aset_tb 			= AsetTanahBangunan_A::where('survei_id', $value->id)->with(['alamat'])->first();

				if($check_aset_tb)
				{
					$survei['aset_tanah_bangunan']	= $check_aset_tb->toArray();
					unset($survei['aset_tanah_bangunan']['id']);
				}

				$check_jaminan_kend 	= JaminanKendaraan_A::where('survei_id', $value->id)->with(['alamat'])->first();

				if($check_jaminan_kend)
				{
					$survei['jaminan_kendaraan']	= $check_jaminan_kend->toArray();
					unset($survei['jaminan_kendaraan']['id']);
				}

				$check_jaminan_tb 		= JaminanTanahBangunan_A::where('survei_id', $value->id)->with(['alamat'])->first();

				if($check_jaminan_tb)
				{
					$survei['jaminan_tanah_bangunan']	= $check_jaminan_tb->toArray();
					unset($survei['jaminan_tanah_bangunan']['id']);
				}

				$check_kepribadian 		= Kepribadian_A::where('survei_id', $value->id)->first();

				if($check_kepribadian)
				{
					$survei['kepribadian']				= $check_kepribadian->toArray();
					unset($survei['kepribadian']['id']);
				}

				$check_keuangan 		= Keuangan_A::where('survei_id', $value->id)->first();

				if($check_keuangan)
				{
					$survei['keuangan']	= $check_keuangan->toArray();
					unset($survei['keuangan']['id']);
				}

				$check_nasabah 			= Nasabah_A::where('survei_id', $value->id)->first();

				if($check_nasabah)
				{
					$survei['nasabah']	= $check_nasabah->toArray();
					unset($survei['nasabah']['id']);
				}

				$check_rekening 		= Rekening_A::where('survei_id', $value->id)->first();

				if($check_rekening)
				{
					$survei['rekening']	= $check_rekening->toArray();
					unset($survei['rekening']['id']);
				}

				$survei_base 	= $value->toArray();
				unset($survei_base['id']);
				$survei_base['nomor_dokumen_kredit']	= $this->kopi_ke;
				
				$simpan 	= new SimpanSurveiKredit($this->kopi_ke, $survei);
				$simpan->setDuplicate($survei_base);
				$simpan->handle();
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