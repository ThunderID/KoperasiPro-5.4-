<?php 

namespace Thunderlabid\Notification\Entities\Interfaces;
use Thunderlabid\Notification\Events\Interfaces\IEventQueue;

interface IEntity extends IEventQueue { 

	//////////////
	// Accessor //
	//////////////
	/**
	 * Retrieving private propery
	 * @param  [string] $property 
	 * @return [mixed]           	value of the property
	 */
	public function __get($property);

	/////////////
	// Mutator //
	/////////////
	/**
	 * Rules for setting property with function
	 * @param  [string] $property 
	 * @return [mixed]           	value of the property
	 */
	public function __set($property, $value);
	
	/////////////
	// Methods //
	/////////////
	/**
	 * Return true if entity in modified
	 * @return boolean 
	 */
	public function isDirty();

	/**
	 * Get original attribute
	 * @return [array] original value
	 */
	public function original();

	/**
	 * Get all attributes in array
	 * @return [array] 
	 */
	public function toArray();

	/**
	 * Check entity is the same as the passed parameter
	 * @param  IEntity $entity  entity to be checked
	 * @return [boolean]
	 */
	public function equals(IEntity $entity);

	/**
	 * Check new entity ID
	 * @return [string]
	 */
	public function createID();
}