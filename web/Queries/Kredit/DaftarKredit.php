<?php

namespace TQueries\Kredit;

///////////////
//   Models  //
///////////////
use TKredit\KreditAktif\Models\KreditAktif_RO as Model;

use TKredit\Pengajuan\Models\Pengajuan;

use TKredit\Survei\Models\Survei;
use TKredit\Survei\Models\AsetKendaraan_A;
use TKredit\Survei\Models\AsetUsaha_A;
use TKredit\Survei\Models\AsetTanahBangunan_A;
use TKredit\Survei\Models\JaminanKendaraan_A;
use TKredit\Survei\Models\JaminanTanahBangunan_A;
use TKredit\Survei\Models\Kepribadian_A;
use TKredit\Survei\Models\Keuangan_A;
use TKredit\Survei\Models\Nasabah_A;
use TKredit\Survei\Models\Rekening_A;

use Hash, Exception, Session, TAuth;

/**
 * Class Services Application
 *
 * Meyimpan visa dari user tertentu.
 *
 * @package    Thunderlabid
 * @subpackage Application
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class DaftarKredit
{
	public function __construct()
	{
		$this->model 		= new Model;
	}

	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return UserDTODataTransformer $data
	 */
	public function get($queries = [])
	{
		$model 		= $this->queries($queries);

		//2. pagination
		if(isset($queries['per_page']))
		{
			$queries['take']	= $queries['per_page'];
		}
		else
		{
			$queries['take']	= 15;
		}

		if(isset($queries['page']))
		{
			$queries['skip']	= (($queries['page'] - 1) * $queries['take']);
		}
		else
		{
			$queries['skip']	= 0;
		}
		
		$model  				= $model->skip($queries['skip'])->take($queries['take'])->orderby('created_at', 'desc')->get();

		return 	$model;
	}

	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return UserDTODataTransformer $data
	 */
	public function detailed($id)
	{
		$model 			= $this->model->nomordokumenkredit($id)->first();

		switch ($model->status) 
		{
			case 'pengajuan':
				$complete	= Pengajuan::id($id)->with(['kreditur', 'kreditur.alamat', 'jaminan_kendaraan', 'jaminan_tanah_bangunan', 'jaminan_tanah_bangunan.alamat', 'kreditur.relasi'])->first();
				$parsed_credit 	=  $complete;

				if(!$parsed_credit['kreditur']['alamat']->count())
				{
					$parsed_credit['kreditur']['alamat'][0]	= null;
				}

				$parsed_credit['status_berikutnya']	= 'survei';
				$parsed_credit['status_sebelumnya']	= '';
				$parsed_credit['status']			= 'pengajuan';
				$parsed_credit['nomor_kredit']		= '';
				break;

			case 'survei':
				$complete	= Pengajuan::id($id)->with(['kreditur', 'kreditur.alamat', 'kreditur.relasi', 'jaminan_tanah_bangunan', 'jaminan_kendaraan'])->first()->toArray();
				$survei 	= Survei::nomordokumenkredit($id)->get(['id']);

				$parsed_credit 	=  $complete;

				if($survei->count())
				{
					$parsed_credit['aset_kendaraan']		= AsetKendaraan_A::whereIn('survei_id', $survei)->with(['survei', 'survei.petugas'])->get()->toArray();
					
					$parsed_credit['aset_usaha']			= AsetUsaha_A::whereIn('survei_id', $survei)->with(['survei', 'survei.petugas'])->get()->toArray();
					
					$parsed_credit['aset_tanah_bangunan']	= AsetTanahBangunan_A::whereIn('survei_id', $survei)->with(['alamat', 'survei', 'survei.petugas'])->get()->toArray();
					
					$parsed_credit['jaminan_kendaraan']		= JaminanKendaraan_A::whereIn('survei_id', $survei)->with(['survei', 'survei.petugas'])->get()->toArray();
					
					$parsed_credit['jaminan_tanah_bangunan']= JaminanTanahBangunan_A::whereIn('survei_id', $survei)->with(['alamat', 'survei', 'survei.petugas'])->get()->toArray();
					
					$parsed_credit['kepribadian']			= Kepribadian_A::whereIn('survei_id', $survei)->with(['survei', 'survei.petugas'])->get()->toArray();
					
					$parsed_credit['keuangan']				= Keuangan_A::whereIn('survei_id', $survei)->with(['survei', 'survei.petugas'])->first();

					if($parsed_credit['keuangan'])
					{
						$parsed_credit['keuangan']			= $parsed_credit['keuangan']->toArray();
					}
					
					$parsed_credit['nasabah']				= Nasabah_A::whereIn('survei_id', $survei)->with(['survei', 'survei.petugas'])->first();
					if($parsed_credit['nasabah'])
					{
						$parsed_credit['nasabah']			= $parsed_credit['nasabah']->toArray();
					}

					$rekening				= Rekening_A::whereIn('survei_id', $survei)->with(['survei', 'survei.petugas'])->orderby('nama_bank', 'desc')->orderby('tanggal', 'desc')->get();

					if($rekening->count())
					{
						$bank 				= 'none';
						$rek 				= -1;
						foreach ($rekening as $key => $value) 
						{
							if(!str_is(strtolower($bank), strtolower($value['nama_bank'])))
							{
								$rek  		= $rek + 1;
								$parsed_credit['rekening'][$rek]['id'] 			= $value['id'];
								$parsed_credit['rekening'][$rek]['nama_bank'] 	= $value['nama_bank'];
								$parsed_credit['rekening'][$rek]['atas_nama'] 	= $value['atas_nama'];
								$parsed_credit['rekening'][$rek]['saldo_awal'] 	= $value['saldo'];
								$parsed_credit['rekening'][$rek]['saldo_akhir'] = $value['saldo'];
								$parsed_credit['rekening'][$rek]['survei'] 		= $value['survei']->toArray();
								$bank = $value['nama_bank'];
							}
							else
							{
								$parsed_credit['rekening'][$rek]['saldo_awal'] 	= $value['saldo'];
							}
						}
					}
					else
					{
						$parsed_credit['rekening']		= null;
					}

					$parsed_credit['status_berikutnya']	= 'setujui';
					$parsed_credit['status_sebelumnya']	= 'pengajuan';
					$parsed_credit['status']			= 'survei';
					$parsed_credit['nomor_kredit']		= '';
				}
				else
				{
					$parsed_credit['aset_kendaraan']		= null;
					$parsed_credit['aset_usaha']			= null;
					$parsed_credit['aset_tanah_bangunan']	= null;
					// $parsed_credit['jaminan_kendaraan']		= null;
					// $parsed_credit['jaminan_tanah_bangunan']= null;
					$parsed_credit['kepribadian']			= null;
					$parsed_credit['keuangan']				= null;
					$parsed_credit['nasabah']				= null;
					$parsed_credit['rekening']				= null;

					$parsed_credit['status_berikutnya']	= 'setujui';
					$parsed_credit['status_sebelumnya']	= 'pengajuan';
					$parsed_credit['status']			= 'survei';
					$parsed_credit['nomor_kredit']		= '';	
				}
				break;
			default:
				throw new Exception("NOT FOUND", 404);
				break;
		}

		return $parsed_credit;
	}

	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return UserDTODataTransformer $data
	 */
	public function count($queries = [])
	{
		$model 		= $this->queries($queries);
		$model		= $model->count();

		return 	$model;
	}
	
	/**
	 * this function mean keep executing
	 * @param numeric $page
	 * 
	 * @return CreditDTODataTransformer $data
	 */
	public function statusLists()
	{
		$current_user 	= TAuth::activeOffice();
		switch (strtolower($current_user['role'])) 
		{
			case 'pimpinan':
				return ['pengajuan', 'survei', 'realisasi', 'tolak'];
				break;
			case 'marketing':
				return ['pengajuan'];
				break;
			case 'surveyor':
				return ['pengajuan', 'survei'];
				break;
			
			default:
				throw new Exception("Forbidden", 1);
				break;
		}
	}

	private function queries($queries)
	{
		$model 					= $this->model;
		
		//1.allow status
		if(isset($queries['status']))
		{
			if(!in_array($queries['status'], $this->statusLists()))
			{
				throw new Exception("Forbidden", 1);
				
			}
		}
		else
		{
			$queries['status']	= $this->statusLists();
		}
		$model  				= $model->status($queries['status']);
		
		//2.allow koperasi
		$queries['koperasi_id']	= [TAuth::activeOffice()['koperasi']['id'], "0"];

		$model  				= $model->koperasi($queries['koperasi_id']);

		//3.allow kreditur
		if(isset($queries['kreditur']))
		{
			$model  			= $model->kreditur($queries['kreditur']);
		}
		
		return $model;
	} 
}
