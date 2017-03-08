<?php

namespace Thunderlabid\Application\DataTransformers\Credit;

use Thunderlabid\Application\DataTransformers\Interfaces\IDataTransformer;

use \Thunderlabid\Credit\Valueobjects\JaminanKendaraan;
use \Thunderlabid\Credit\Valueobjects\JaminanTanahBangunan;

/**
 * Interface class untuk Services Application
 *
 * Digunakan untuk scaffold dari data transformer lain.
 *
 * @package    Thunderlabid
 * @subpackage Application
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class CreditDTODataTransformer implements IDataTransformer
{ 
	/**
	 * Constructor
	 * 
	 * rarely used since change DTO to model kinda work of other 
	 * 
	 * @param array $credit
	 * @return true
	 */
	public function write($credit)
	{
		return true;
	}

	/**
	 * Constructor
	 * 
	 * Convert entity to DTO 
	 * 
	 * @param Thunderlabid\Immigration\Entities\Credit $credit
	 * @return array $credit
	 */
	public function read($credit)
	{
		$jaminan 	= [];
		$i 			= 0;
		$j 			= 0;

		foreach ((array)$credit->jaminan as $key => $value) 
		{
			if($value instanceOf JaminanKendaraan)
			{
				$jaminan['kendaraan'][$i]['merk']	= $value->merk;
				$jaminan['kendaraan'][$i]['jenis']	= $value->jenis;
				$jaminan['kendaraan'][$i]['warna']	= $value->warna;
				$jaminan['kendaraan'][$i]['tahun']	= $value->tahun;
				$jaminan['kendaraan'][$i]['legal']	= $value->legal;
				$jaminan['kendaraan'][$i]['nilai']	= $value->nilai;
				$jaminan['kendaraan'][$i]['nilai']['harga_taksasi']	= $value->nilai['harga_taksasi']->IDR();
				$jaminan['kendaraan'][$i]['nilai']['harga_bank']	= $value->nilai['harga_bank']->IDR();
				$i++;
			}

			if($value instanceOf JaminanTanahBangunan)
			{
				$jaminan['tanah_bangunan'][$j]['tipe_jaminan']			= $value->tipe_jaminan;
				$jaminan['tanah_bangunan'][$j]['tanah']					= $value->tanah;
				$jaminan['tanah_bangunan'][$j]['spesifikasi_bangunan']	= $value->spesifikasi_bangunan;
				$jaminan['tanah_bangunan'][$j]['legal']					= $value->legal;
				$jaminan['tanah_bangunan'][$j]['alamat']				= $value->alamat;
				$jaminan['tanah_bangunan'][$j]['nilai']					= $value->nilai;
				$jaminan['tanah_bangunan'][$j]['nilai']['harga_njop']		= $value->nilai['harga_njop']->IDR();
				$jaminan['tanah_bangunan'][$j]['nilai']['nilai_tanah']		= $value->nilai['nilai_tanah']->IDR();
				$jaminan['tanah_bangunan'][$j]['nilai']['nilai_bangunan']	= $value->nilai['nilai_bangunan']->IDR();
				$jaminan['tanah_bangunan'][$j]['nilai']['nilai_taksasi']	= $value->nilai['nilai_taksasi']->IDR();
				$j++;
			}
		}

		return ['id' 				=> $credit->id, 
				'pengajuan_kredit' 	=> $credit->pengajuan_kredit->IDR(), 
				'kemampuan_angsur' 	=> $credit->kemampuan_angsur->IDR(), 
				'jangka_waktu' 		=> $credit->jangka_waktu, 
				'tujuan_kredit' 	=> $credit->tujuan_kredit, 
				'kreditur' 			=> $credit->kreditur, 
				'koperasi' 			=> $credit->koperasi, 
				'penjamin'	 		=> $credit->penjamin, 
				'status' 			=> $credit->status, 
				'riwayat_status' 	=> $credit->riwayat_status,
				'jaminan' 			=> $jaminan
				];
	}
}
