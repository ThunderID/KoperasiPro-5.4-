<?php

namespace Thunderlabid\Registry\Infrastructures\Transformers;

use \Thunderlabid\Registry\Infrastructures\Transformers\Interfaces\ITransformer;
use \Thunderlabid\Registry\Infrastructures\Models\Personality as Eloquent;
use \Thunderlabid\Registry\Entities\Person as Entity;
use \Thunderlabid\Registry\Factories\PersonalityFactory as Factory;

use Thunderlabid\Registry\Entities\Interfaces\IEntity;

use Exception;

class PersonalityTransformer implements ITransformer { 

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
		return Factory::build($model->lingkungan_tinggal, $model->lingkungan_pekerjaan, $model->karakter, $model->pola_hidup, $model->keterangan);
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
		$model->lingkungan_tinggal 		= $entity->kepribadian->lingkungan_tinggal;
		$model->lingkungan_pekerjaan 	= $entity->kepribadian->lingkungan_pekerjaan;
		$model->karakter 				= $entity->kepribadian->karakter;
		$model->pola_hidup 				= $entity->kepribadian->pola_hidup;
		$model->keterangan 				= $entity->kepribadian->keterangan;

		return $model;
	}

}
