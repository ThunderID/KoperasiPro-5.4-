<?php

namespace Thunderlabid\Registry\Infrastructures\Transformers;

use \Thunderlabid\Registry\Infrastructures\Transformers\Interfaces\ITransformer;
use \Thunderlabid\Registry\Infrastructures\Models\Macro as Eloquent;
use \Thunderlabid\Registry\Entities\Person as Entity;
use \Thunderlabid\Registry\Factories\MacroFactory as Factory;

use Thunderlabid\Registry\Entities\Interfaces\IEntity;

use Exception;

class MacroTransformer implements ITransformer { 

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
		return Factory::build($model->persaingan_usaha, $model->prospek_usaha, $model->perputaran_usaha, $model->pengalaman_usaha, $model->resiko_usaha, $model->jumlah_pelanggan_harian, $model->keterangan);
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
		
		$model->person 					= ['id' => $entity->id];
		$model->persaingan_usaha 		= $entity->makro->persaingan_usaha;
		$model->prospek_usaha 			= $entity->makro->prospek_usaha;
		$model->perputaran_usaha 		= $entity->makro->perputaran_usaha;
		$model->pengalaman_usaha 		= $entity->makro->pengalaman_usaha;
		$model->resiko_usaha 			= $entity->makro->resiko_usaha;
		$model->jumlah_pelanggan_harian = $entity->makro->jumlah_pelanggan_harian;
		$model->keterangan 				= $entity->makro->keterangan;

		return $model;
	}

}
