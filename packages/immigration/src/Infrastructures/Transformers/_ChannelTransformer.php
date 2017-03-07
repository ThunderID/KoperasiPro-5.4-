<?php

namespace Thunderlabid\Immigration\Infrastructures\Transformers;

use \Thunderlabid\Immigration\Infrastructures\Transformers\Interfaces\ITransformer;
use \Thunderlabid\Immigration\Infrastructures\Models\Channel as Eloquent;
use \Thunderlabid\Immigration\Entities\Channel as Entity;
use \Thunderlabid\Immigration\Factories\ChannelFactory as Factory;
use Exception;

class ChannelTransformer implements ITransformer { 

	/**
	 * Convert Eloquent Model to Entity
	 * @param [Model] $model 
	 */
	public function ToEntity($model)
	{
		///////////////////////////////////////////////////
		// Check if model is instance of Eloquent //
		///////////////////////////////////////////////////
		if (!$model instanceOf Eloquent)
		{
			throw new Exception(json_encode(['Parameter 1 must be instance of Channel Eloquent']));
		}

		//////////////////
		// Build Entity //
		//////////////////
		return Factory::build($model->id, $model->name, $model->url, $model->logo_sm, $model->logo_md, $model->logo_lg);
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
			throw new Exception(json_encode(['Parameter 1 must be instance of Channel Entity']));
		}

		///////////////////
		// Make Eloquent //
		///////////////////
		if ($entity->id)
		{
			$model = Eloquent::find($entity->id);
		}
		else
		{
			$model = new Eloquent;
		}

		foreach ($entity->toArray() as $field => $value)
		{
			$model->$field = $entity->$field;
		}

		return $model;
	}

}
