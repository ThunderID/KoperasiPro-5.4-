<?php

namespace App\Service\Analis;

///////////////
//   Models  //
///////////////
use App\Domain\Pengajuan\Models\Pengajuan as Model;

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
	public function pengajuan($queries = [], $user)
	{
		$koperasi_ids 		= $this->getKoperasiIDS($user);

		$kredit_aktif 		= $this->model->whereIn('akses_koperasi_id', $koperasi_ids)->status('pengajuan')->with(['debitur', 'debitur.relasi', 'jaminan_kendaraan', 'jaminan_tanah_bangunan', 'koperasi'])->skip(0)->take(30)->get()->toArray();
		
		return $this->dokumenChecker($kredit_aktif);
	}

	private function getKoperasiIDS($user)
	{
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

		return $koperasi_id;
	}

	private function dokumenChecker($kredit_aktif)
	{
		foreach ($kredit_aktif as $key => $value) 
		{
			//check data pengajuan
			//check data nasabah
			if(str_is($value['debitur']['nama'], 'Pengajuan Melalui HP'))
			{
				$kredit_aktif[$key]['data_nasabah']	= false;
			}
			else
			{
				$kredit_aktif[$key]['data_nasabah']	= true;
			}

			$relasi 		= count($value['debitur']['relasi']);
			if(!$relasi)
			{
				$kredit_aktif[$key]['data_relasi']	= false;
			}
			else
			{
				$kredit_aktif[$key]['data_relasi']	= true;
			}

			//check data jaminan
			$jaminank 		= count($value['jaminan_kendaraan']);
			$jaminantb 		= count($value['jaminan_tanah_bangunan']);
		
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

	public function pengajuan_online($queries = [], $user)
	{
		$koperasi_ids 		= $this->getKoperasiIDS($user);

		$kredit_aktif 		= $this->model->whereIn('akses_koperasi_id', $koperasi_ids)->status('pengajuan')->wherehas('followup', function($q){$q->where('is_called', false);})->with(['debitur', 'followup','debitur.relasi', 'jaminan_kendaraan', 'jaminan_tanah_bangunan', 'koperasi'])->get()->toArray();

		return $this->dokumenChecker($kredit_aktif);
	}


	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return array $data
	 */
	public function survei($queries = [], $user)
	{
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

		$kredit_aktif 		= $this->model->whereIn('akses_koperasi_id', $koperasi_id)->status('survei')->with(['survei_kepribadian', 'survei_nasabah', 'survei_aset_usaha', 'survei_aset_tanah_bangunan', 'survei_aset_kendaraan', 'jaminan_kendaraan', 'jaminan_kendaraan.survei_jaminan_kendaraan', 'jaminan_tanah_bangunan', 'jaminan_tanah_bangunan.survei_jaminan_tanah_bangunan', 'survei_rekening', 'survei_keuangan', 'koperasi', 'debitur'])->skip(0)->take(30)->get()->toArray();

		foreach ($kredit_aktif as $key => $value) 
		{
			//check data survei
			//check data nasabah
			$nasabah 		= count($value['survei_nasabah']);
			if(!$nasabah)
			{
				$kredit_aktif[$key]['data_nasabah']	= false;
			}
			else
			{
				$kredit_aktif[$key]['data_nasabah']	= true;
			}

			//check data kepribadian
			$kepribadian 	= count($value['survei_kepribadian']);
			if(!$kepribadian)
			{
				$kredit_aktif[$key]['data_kepribadian']	= false;
			}
			else
			{
				$kredit_aktif[$key]['data_kepribadian']	= true;
			}

			//check data aset
			$aset_u 	= count($value['survei_aset_usaha']);
			$aset_k 	= count($value['survei_aset_kendaraan']);
			$aset_tb 	= count($value['survei_aset_tanah_bangunan']);

			if(!$aset_u && !$aset_k && !$aset_tb)
			{
				$kredit_aktif[$key]['data_aset']	= false;
			}
			else
			{
				$kredit_aktif[$key]['data_aset']	= true;
			}

			//check data jaminan
			$jaminan_k 	= 0;
			$jaminan_tb = 0;
			foreach ($value['jaminan_kendaraan'] as $key2 => $value2) 
			{
				$jaminan_k 	= $jaminan_k + count($value2['survei_jaminan_kendaraan']);
			}
			foreach ($value['jaminan_tanah_bangunan'] as $key2 => $value2) 
			{
				$jaminan_tb	= $jaminan_tb + count($value2['survei_jaminan_tanah_bangunan']);
			}

			if(!$jaminan_k && !$jaminan_tb)
			{
				$kredit_aktif[$key]['data_jaminan']	= false;
			}
			else
			{
				$kredit_aktif[$key]['data_jaminan']	= true;
			}

			//check data rekening
			$rekening 	= count($value['survei_rekening']);
			if(!$rekening)
			{
				$kredit_aktif[$key]['data_rekening']	= false;
			}
			else
			{
				$kredit_aktif[$key]['data_rekening']	= true;
			}

			//check data keuangan
			$keuangan 	= count($value['survei_keuangan']);
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
