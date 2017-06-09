<?php

namespace App\Service\Analis;

///////////////
//   Models  //
///////////////
use TKredit\KreditAktif\Models\KreditAktif_RO as Model;
use TKredit\Pengajuan\Models\Pengajuan;
use TKredit\Pengajuan\Models\Relasi_A;
use TKredit\Pengajuan\Models\JaminanKendaraan_A;
use TKredit\Pengajuan\Models\JaminanTanahBangunan_A;

use TKredit\Survei\Models\Survei;
use TKredit\Survei\Models\Nasabah_A;
use TKredit\Survei\Models\Kepribadian_A;
use TKredit\Survei\Models\AsetUsaha_A;
use TKredit\Survei\Models\AsetKendaraan_A;
use TKredit\Survei\Models\AsetTanahBangunan_A;
use TKredit\Survei\Models\JaminanKendaraan_A as JaminanKendaraan_AS;
use TKredit\Survei\Models\JaminanTanahBangunan_A as JaminanTanahBangunan_AS;
use TKredit\Survei\Models\Rekening_A;
use TKredit\Survei\Models\Keuangan_A;

use Hash, Exception, Session, TAuth, Carbon\Carbon;

/**
 * Class Services Application
 *
 * Meyimpan visa dari user tertentu.
 *
 * @package    Thunderlabid
 * @subpackage Application
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class InspeksiDokumenCabang
{
	public $per_page 	= 15;
	public $page 		= 1;

	public function __construct()
	{
		$this->model 		= new Model;
	}

	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return array $data
	 */
	public function pengajuan($queries = [])
	{
		$user 				= TAuth::loggedUser();
		$koperasi_id 		= [];

		foreach ($user['visas'] as $key => $value) 
		{
			foreach ($value['scopes'] as $key2 => $value2) 
			{
				if((str_is('pengajuan_kredit', $value2['list'])) && (!isset($value2['expired_at']) || $value2['expired_at'] > Carbon::now()->format('d/m/Y')))
				{
					$koperasi_id[]		= $value['koperasi']['id'];
				}
			}
		}

		$kredit_aktif 		= $this->model->koperasi($koperasi_id)->status('pengajuan')->with(['cabang'])->get()->toArray();

		foreach ($kredit_aktif as $key => $value) 
		{
			//check data pengajuan
			//check data nasabah
			if(str_is($value['nama_kreditur'], 'Pengajuan Melalui HP'))
			{
				$kredit_aktif[$key]['data_nasabah']	= false;
			}
			else
			{
				$kredit_aktif[$key]['data_nasabah']	= true;
			}

			//check data keluarga
			$person 		= Pengajuan::id($value['nomor_dokumen_kredit'])->first();

			$relasi 		= Relasi_A::where('orang_id', $person->kreditur_id)->count();
			if(!$relasi)
			{
				$kredit_aktif[$key]['data_relasi']	= false;
			}
			else
			{
				$kredit_aktif[$key]['data_relasi']	= true;
			}

			//check data jaminan
			$jaminank 		= JaminanKendaraan_A::where('pengajuan_id', $person->id)->count();
			$jaminantb 		= JaminanTanahBangunan_A::where('pengajuan_id', $person->id)->count();
		
			if(!$jaminank && !$jaminantb)
			{
				$kredit_aktif[$key]['data_jaminan']	= false;
			}
			else
			{
				$kredit_aktif[$key]['data_jaminan']	= true;
			}

			if($kredit_aktif[$key]['data_nasabah'] && $kredit_aktif[$key]['data_relasi'] && $kredit_aktif[$key]['data_jaminan'])
			{
				unset($kredit_aktif[$key]);
			}
		}

		return $kredit_aktif;
	}


	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return array $data
	 */
	public function survei($queries = [])
	{
		$user 				= TAuth::loggedUser();
		$koperasi_id 		= [];

		foreach ($user['visas'] as $key => $value) 
		{
			foreach ($value['scopes'] as $key2 => $value2) 
			{
				if((str_is('survei_kredit', $value2['list'])) && (!isset($value2['expired_at']) || $value2['expired_at'] > Carbon::now()->format('d/m/Y')))
				{
					$koperasi_id[]		= $value['koperasi']['id'];
				}
			}
		}

		$kredit_aktif 		= $this->model->koperasi($koperasi_id)->status('survei')->with(['cabang'])->get()->toArray();

		foreach ($kredit_aktif as $key => $value) 
		{
			//check data survei
			//check data nasabah
			if(str_is($value['nama_kreditur'], 'Pengajuan Melalui HP'))
			{
				$kredit_aktif[$key]['data_nasabah']	= false;
			}
			else
			{
				$kredit_aktif[$key]['data_nasabah']	= true;
			}

			$survei 		= Survei::NomorDokumenKredit($value['nomor_dokumen_kredit'])->get(['id']);
			
			//check data nasabah
			$nasabah 		= Nasabah_A::whereIn('survei_id', $survei)->count();
			if(!$nasabah)
			{
				$kredit_aktif[$key]['data_nasabah']	= false;
			}
			else
			{
				$kredit_aktif[$key]['data_nasabah']	= true;
			}

			//check data kepribadian
			$kepribadian	= Kepribadian_A::whereIn('survei_id', $survei)->count();
			if(!$kepribadian)
			{
				$kredit_aktif[$key]['data_kepribadian']	= false;
			}
			else
			{
				$kredit_aktif[$key]['data_kepribadian']	= true;
			}

			//check data aset
			$aset_u 	= AsetUsaha_A::whereIn('survei_id', $survei)->count();
			$aset_k 	= AsetKendaraan_A::whereIn('survei_id', $survei)->count();
			$aset_tb	= AsetTanahBangunan_A::whereIn('survei_id', $survei)->count();

			if(!$aset_u && !$aset_k && !$aset_tb)
			{
				$kredit_aktif[$key]['data_aset']	= false;
			}
			else
			{
				$kredit_aktif[$key]['data_aset']	= true;
			}

			//check data jaminan
			$jaminan_k 	= JaminanKendaraan_AS::whereIn('survei_id', $survei)->count();
			$jaminan_tb	= JaminanTanahBangunan_AS::whereIn('survei_id', $survei)->count();

			if(!$jaminan_k && !$jaminan_tb)
			{
				$kredit_aktif[$key]['data_jaminan']	= false;
			}
			else
			{
				$kredit_aktif[$key]['data_jaminan']	= true;
			}

			//check data rekening
			$rekening	= Rekening_A::whereIn('survei_id', $survei)->count();
			if(!$rekening)
			{
				$kredit_aktif[$key]['data_rekening']	= false;
			}
			else
			{
				$kredit_aktif[$key]['data_rekening']	= true;
			}

			//check data keuangan
			$keuangan	= Keuangan_A::whereIn('survei_id', $survei)->count();
			if(!$keuangan)
			{
				$kredit_aktif[$key]['data_keuangan']	= false;
			}
			else
			{
				$kredit_aktif[$key]['data_keuangan']	= true;
			}

			if($kredit_aktif[$key]['data_nasabah'] && $kredit_aktif[$key]['data_kepribadian'] && $kredit_aktif[$key]['data_aset'] && $kredit_aktif[$key]['data_jaminan'] && $kredit_aktif[$key]['data_rekening'] && $kredit_aktif[$key]['data_keuangan'])
			{
				unset($kredit_aktif[$key]);
			}
		}

		return $kredit_aktif;
	}
}
