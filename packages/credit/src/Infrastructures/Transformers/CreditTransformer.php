<?php

namespace Thunderlabid\Credit\Infrastructures\Transformers;

use \Thunderlabid\Credit\Infrastructures\Transformers\Interfaces\ITransformer;
use \Thunderlabid\Credit\Infrastructures\Models\Credit as Eloquent;
use \Thunderlabid\Credit\Entities\Credit as Entity;
use \Thunderlabid\Credit\Factories\CreditFactory as Factory;
use \Thunderlabid\Credit\Factories\VisaFactory;

use Thunderlabid\Credit\Entities\Interfaces\IEntity;

use \Thunderlabid\Credit\Valueobjects\JaminanKendaraan;
use \Thunderlabid\Credit\Valueobjects\JaminanTanahBangunan;

use Exception;

class CreditTransformer implements ITransformer { 

	/**
	 * Convert Eloquent Model to Entity
	 * @param [Model] $model 
	 */
	public function ToEntity($model)
	{
		////////////////////////////////////////////
		// Check if model is instance of Eloquent //
		////////////////////////////////////////////
		if (!$model instanceOf Eloquent)
		{
			throw new Exception(json_encode(['Parameter 1 must be instance of Credit Eloquent']));
		}

		//////////////////
		// Build Entity //
		//////////////////

		if(isset($model->jaminan['kendaraan']))
		{
			$kendaraan 	= $model->jaminan['kendaraan'];
		}
		else
		{
			$kendaraan 	= [];
		}

		if(isset($model->jaminan['tanah_bangunan']))
		{
			$tanah_bangunan 	= $model->jaminan['tanah_bangunan'];
		}
		else
		{
			$tanah_bangunan = [];
		}

		return Factory::build($model->_id, $model->pengajuan_kredit, $model->kemampuan_angsur, $model->jangka_waktu, $model->tujuan_kredit, $model->kreditur, $model->koperasi, $model->penjamin, $model->status, $model->riwayat_status, $kendaraan,  $tanah_bangunan);
	}

	/**
	 * Convert Entity to Eloquent
	 * @param [Model] $model 
	 */
	public function ToEloquent($entity)
	{
		////////////////////////////////////
		// Check if parameter 1 is entity //
		////////////////////////////////////
		if (!$entity instanceOf Entity)
		{
			throw new Exception(json_encode(['Parameter 1 must be instance of Credit Entity']));
		}

		///////////////////
		// Make Eloquent //
		///////////////////
		$model = Eloquent::findornew($entity->id);

		$model->_id 					= $entity->id;
		$model->pengajuan_kredit 		= (int)(string)$entity->pengajuan_kredit;
		$model->kemampuan_angsur 		= (int)(string)$entity->kemampuan_angsur;
		$model->jangka_waktu 			= $entity->jangka_waktu;
		$model->tujuan_kredit 			= $entity->tujuan_kredit;
		$model->kreditur 				= $entity->kreditur;
		$model->koperasi 				= $entity->koperasi;
		$model->penjamin 				= $entity->penjamin;
		$model->status 					= $entity->status;
		$model->riwayat_status			= $entity->riwayat_status;


		//Parse Jaminan Kendaraan
		$jaminan 	= [];
		$i 			= 0;
		$j 			= 0;

		foreach ((array)$entity->jaminan as $key => $value) 
		{
			if($value instanceOf JaminanKendaraan)
			{
				$jaminan['kendaraan'][$i]['merk']	= $value->merk;
				$jaminan['kendaraan'][$i]['jenis']	= $value->jenis;
				$jaminan['kendaraan'][$i]['warna']	= $value->warna;
				$jaminan['kendaraan'][$i]['tahun']	= $value->tahun;
				$jaminan['kendaraan'][$i]['legal']	= $value->legal;
				$jaminan['kendaraan'][$i]['nilai']	= $value->nilai;

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
				$jaminan['tanah_bangunan'][$j]['nilai']['harga_njop']	= (string)($value->nilai['harga_njop']) * 1;
				$jaminan['tanah_bangunan'][$j]['nilai']['nilai_tanah']	= (string)($value->nilai['nilai_tanah']) * 1;
				$jaminan['tanah_bangunan'][$j]['nilai']['nilai_bangunan']	= (string)($value->nilai['nilai_bangunan']) * 1;
				$jaminan['tanah_bangunan'][$j]['nilai']['nilai_taksasi']	= (string)($value->nilai['nilai_taksasi']) * 1;
				$j++;
			}
		}

		$model->jaminan 				= $jaminan;

		return $model;
	}

}
