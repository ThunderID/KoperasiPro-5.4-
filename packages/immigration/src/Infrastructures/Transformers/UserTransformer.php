<?php

namespace Thunderlabid\Immigration\Infrastructures\Transformers;

use \Thunderlabid\Immigration\Infrastructures\Transformers\Interfaces\ITransformer;
use \Thunderlabid\Immigration\Infrastructures\Models\User as Eloquent;
use \Thunderlabid\Immigration\Entities\User as Entity;
use \Thunderlabid\Immigration\Factories\UserFactory as Factory;
use \Thunderlabid\Immigration\Factories\VisaFactory;

use Thunderlabid\Immigration\Entities\Interfaces\IEntity;

use Exception;

class UserTransformer implements ITransformer { 

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
			throw new Exception(json_encode(['Parameter 1 must be instance of User Eloquent']));
		}

		//////////////////
		// Build Entity //
		//////////////////
		$visa_entities 	= [];
		foreach ((array)$model->visas as $key => $value) 
		{
			$visa_entities[]	= VisaFactory::build($value['id'], $model->id, $value['office']['id'], $value['office']['name'], $value['role']);
		}

		return Factory::build($model->id, $model->email, $model->password, $model->name, $visa_entities);
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
			throw new Exception(json_encode(['Parameter 1 must be instance of User Entity']));
		}

		///////////////////
		// Make Eloquent //
		///////////////////
		// if ($entity->id)
		// {
			$model = Eloquent::findornew($entity->id);
		// }
		// else
		// {
		// 	$model = new Eloquent;
		// }

		$model->_id 		= $entity->id;
		$model->email 		= $entity->email;
		$model->password 	= $entity->password;
		$model->name 		= $entity->name;

		/////////////
		//  visas  //
		/////////////
		$visas				= [];
		foreach ((array)$entity->visas as $visa) 
		{
			$visas[]			= [
				'id'			=> $visa->id,
				'office'		=> [
					'id' 		=> $visa->office['id'], 
					'name' 		=> $visa->office['name'], 
				],
				'role' 		=> $visa->role
			];
		}

		$model->visas	= $visas;

		return $model;
	}

}
