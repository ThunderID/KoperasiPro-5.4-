<?php

namespace Thunderlabid\Credit\Infrastructures\Transformers;

use \Thunderlabid\Credit\Infrastructures\Transformers\Interfaces\ITransformer;
use \Thunderlabid\Credit\Infrastructures\Models\Credit as Eloquent;
use \Thunderlabid\Credit\Entities\Credit as Entity;
use \Thunderlabid\Credit\Factories\CreditFactory as Factory;
use \Thunderlabid\Credit\Factories\VisaFactory;

use Thunderlabid\Credit\Entities\Interfaces\IEntity;

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

		return Factory::build($model->_id, $model->pengajuan_kredit, $model->kemampuan_angsur, $model->jangka_waktu, $model->tujuan_kredit, $model->kreditur, $model->koperasi, $model->penjamin, $model->status, $model->riwayat_status);
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

		return $model;
	}

}
