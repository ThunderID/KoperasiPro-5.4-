<?php

namespace Thunderlabid\Registry\Infrastructures\Transformers;

use \Thunderlabid\Registry\Infrastructures\Transformers\Interfaces\ITransformer;
use \Thunderlabid\Registry\Infrastructures\Models\Finance as Eloquent;
use \Thunderlabid\Registry\Entities\Person as Entity;
use \Thunderlabid\Registry\Factories\FinanceFactory as Factory;

use Thunderlabid\Registry\Entities\Interfaces\IEntity;

use Exception;

class FinanceTransformer implements ITransformer { 

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
			throw new Exception(json_encode(['Parameter 1 must be instance of Registry Eloquent']));
		}

		//////////////////
		// Build Entity //
		//////////////////
		return Factory::build($model->pendapatan, $model->pengeluaran);
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
			throw new Exception(json_encode(['Parameter 1 must be instance of Registry Entity']));
		}

		///////////////////
		// Make Eloquent //
		///////////////////
		$model = Eloquent::personid($entity->id)->first();
		if(!$model)
		{
			$model 	= new Eloquent;
		}
		
		$model->person 							= ['id' => $entity->id];

		$pendapatan								= $entity->keuangan->pendapatan;
		$pendapatan['penghasilan_gaji']			= (string)($entity->keuangan->pendapatan['penghasilan_gaji']) * 1;
		$pendapatan['penghasilan_non_gaji']		= (string)($entity->keuangan->pendapatan['penghasilan_non_gaji']) * 1;
		$pendapatan['penghasilan_lain']			= (string)($entity->keuangan->pendapatan['penghasilan_lain']) * 1;
		
		$model->pendapatan 						= $pendapatan;

		$pengeluaran							= $entity->keuangan->pengeluaran;
		$pengeluaran['biaya_rumah_tangga']		= (string)($entity->keuangan->pengeluaran['biaya_rumah_tangga']) * 1;
		$pengeluaran['biaya_pendidikan']		= (string)($entity->keuangan->pengeluaran['biaya_pendidikan']) * 1;
		$pengeluaran['biaya_telepon']			= (string)($entity->keuangan->pengeluaran['biaya_telepon']) * 1;
		$pengeluaran['biaya_pdam']				= (string)($entity->keuangan->pengeluaran['biaya_pdam']) * 1;
		$pengeluaran['biaya_listrik']			= (string)($entity->keuangan->pengeluaran['biaya_listrik']) * 1;
		$pengeluaran['biaya_produksi']			= (string)($entity->keuangan->pengeluaran['biaya_produksi']) * 1;
		$pengeluaran['pengeluaran_lain']		= (string)($entity->keuangan->pengeluaran['pengeluaran_lain']) * 1;

		$model->pengeluaran 			= $pengeluaran;

		return $model;
	}

}
