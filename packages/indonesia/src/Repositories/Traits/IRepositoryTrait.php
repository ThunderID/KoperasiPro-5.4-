<?php

namespace Thunderlabid\Indonesia\Repositories\Traits;

use \Thunderlabid\Indonesia\Repositories\Specifications\Interfaces\ISpecification;
use Thunderlabid\Indonesia\Events\Traits\IEventQueueTrait;
use Exception, InvalidArgumentException, DB;

trait IRepositoryTrait
{
	use IEventQueueTrait;
	
	/**
	 * Add entity to collection or update entity in collections
	 * @param  [IEntity] $entity 
	 */
	public function store($entity)
	{
		$model = $this->model->newInstance();

		try {

			///////////////////////
			// Begin Transaction //
			///////////////////////
			// DB::beginTransaction();

			/////////////////////////
			// Convert to Eloquent //
			/////////////////////////
			$model = $this->transformer->toEloquent($entity);

			///////////////////
			// Save Eloquent //
			///////////////////
			$model->save();

			//////////////////
			// Raise Events //
			//////////////////
			$entity->raiseEvent();

			////////////
			// Commit //
			////////////
			// DB::commit();

		} catch (Exception $e) {

			//////////////
			// Rollback //
			//////////////
			DB::rollback();

			///////////////
			// Exception //
			///////////////
			throw $e;
		}

		return $this->transformer->toEntity($model);
	}

	/**
	 * Query collection
	 * @param  [ISpecification[]] $specifications
	 * @return  [array] $entities
	 */
	public function query($specifications = [])
	{
		///////////////////////////////////////////////////////
		// Check if specifications is type of ISpecification //
		///////////////////////////////////////////////////////
		foreach ($specifications as $specification)
		{
			if (!$specification instanceOf ISpecification)
			{
				throw new InvalidArgumentException('Parameter 1 is not instance of ISpecification');
			}
		}
		
		//////////////////////////////
		// Apply each specification //
		//////////////////////////////
		$model = $this->model->withCities();
		foreach ($specifications as $specification)
		{
			$model = $specification->apply($model);
		}

		$entities = [];
		$data 		= $model->sortby('province_name');
		foreach ($data as $x)
		{
			$entities[] = $this->transformer->toEntity($x);
		}
		return $entities;
	}

	/**
	 * count collection
	 * @param  [ISpecification[]] $specifications
	 * @return  [integer] 
	 */
	public function count($specifications = [])
	{
		///////////////////////////////////////////////////////
		// Check if specifications is type of ISpecification //
		///////////////////////////////////////////////////////
		foreach ($specifications as $specification)
		{
			if (!$specification instanceOf ISpecification)
			{
				throw new InvalidArgumentException('Parameter 1 is not instance of ISpecification');
			}
		}

		//////////////////////////////
		// Apply each specification //
		//////////////////////////////
		$model = $this->model->newInstance();
		foreach ($specifications as $specification)
		{
			$model = $specification->apply($model);			
		}

		return $model->count();
	}


	/**
	 * get Model Instance
	 * @return [Model] new model object
	 */
	public function getModel()
	{
		return $this->model->newInstance();
	}

}
