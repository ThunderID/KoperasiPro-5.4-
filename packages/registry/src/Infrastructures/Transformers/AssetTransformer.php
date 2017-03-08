<?php

namespace Thunderlabid\Registry\Infrastructures\Transformers;

use \Thunderlabid\Registry\Infrastructures\Transformers\Interfaces\ITransformer;
use \Thunderlabid\Registry\Infrastructures\Models\Asset as Eloquent;
use \Thunderlabid\Registry\Entities\Person as Entity;
use \Thunderlabid\Registry\Factories\AssetFactory as Factory;

use Thunderlabid\Registry\Entities\Interfaces\IEntity;

use Exception;

class AssetTransformer implements ITransformer { 

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
		return Factory::build($model->rumah, $model->kendaraan, $model->usaha);
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
		
		$model->person 				= ['id' => $entity->id];

		$rumah						= $entity->aset->rumah;
		$rumah['angsuran']			= (string)($entity->aset->rumah['angsuran']) * 1;
		$rumah['nilai_rumah']		= (string)($entity->aset->rumah['nilai_rumah']) * 1;
		$model->rumah 				= $rumah;

		$kendaraan						= $entity->aset->kendaraan;
		$kendaraan['nilai_kendaraan']	= (string)($entity->aset->kendaraan['nilai_kendaraan']) * 1;
		$model->kendaraan 				= $kendaraan;

		$model->usaha 				= $entity->aset->usaha;

		return $model;
	}

}
