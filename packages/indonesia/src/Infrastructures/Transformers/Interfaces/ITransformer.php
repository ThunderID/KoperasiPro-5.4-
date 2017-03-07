<?php

namespace Thunderlabid\Indonesia\Infrastructures\Transformers\Interfaces;

use Exception;

interface ITransformer { 

	/**
	 * Convert Eloquent Model to Entity
	 * @param [Model] $model 
	 */
	public function ToEntity($model);

	/**
	 * Convert Entity to Eloquent
	 * @param [Model] $model 
	 */
	public function ToEloquent($entity);

}
