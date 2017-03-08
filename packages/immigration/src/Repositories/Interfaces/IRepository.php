<?php

namespace Thunderlabid\Immigration\Repositories\Interfaces;
use Thunderlabid\Immigration\Events\Interfaces\IEventQueue;

interface IRepository extends IEventQueue { 
	/**
	 * Add entity to collection or update entity in collections
	 * @param  [IEntity] $entity 
	 */
	public function store($entity);

	/**
	 * Remove entity in collections
	 * @param  [IEntity] $entity 
	 */
	public function remove($entity);

	/**
	 * Query collection
	 * @param  [ISpecification[]] $specifications
	 * @return  [array] $entities
	 */
	public function query($specifications = []);

	/**
	 * Count collection
	 * @param  [ISpecification[]] $specifications
	 * @return  [integer] 
	 */
	public function count($specifications = []);

	/**
	 * get Model Instance
	 * @return [Model] new model object
	 */
	public function getModel();

}
