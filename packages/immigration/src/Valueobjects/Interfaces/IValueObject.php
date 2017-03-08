<?php 

namespace Thunderlabid\Immigration\ValueObjects\Interfaces;

interface IValueObject { 

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
	 * Check entity is the same as the passed parameter
	 * @param  [type] $entity  entity to be checked
	 * @return [boolean]
	 */
	public function equals($entity);
}