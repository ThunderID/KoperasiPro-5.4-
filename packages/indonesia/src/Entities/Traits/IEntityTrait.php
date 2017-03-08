<?php

namespace Thunderlabid\Indonesia\Entities\Traits;

use Thunderlabid\Indonesia\Entities\Interfaces\IEntity;
use Thunderlabid\Indonesia\Events\Traits\IEventQueueTrait;
use Exception, InvalidArgumentException;

trait IEntityTrait { 

	use IEventQueueTrait;

	private $original_attributes;
	private $attributes;

	//////////////
	// Accessor //
	//////////////
	/**
	 * Retrieving private propery
	 * @param  [string] $property 
	 * @return [mixed]           	value of the property
	 */
	public function __get($property)
	{
		$func = 'get'.str_replace('_', '', $property).'attribute';
		if (method_exists($this, $func))
		{
			return $this->$func();
		} 
		else 
		{
			if (array_key_exists($property, $this->attributes))
			{
				return $this->attributes[$property];
			}
			else
			{
				throw new InvalidArgumentException("$property not found");
			}
		}
	}

	/////////////
	// Mutator //
	/////////////
	/**
	 * Rules for setting property with function
	 * @param  [string] $property 
	 * @return [mixed]           	value of the property
	 */
	public function __set($property, $value)
	{
		$func = 'set'.str_replace('_', '', $property).'attribute';
		if (method_exists($this, $func))
		{
			if (array_key_exists($property, $this->policies))
			{
				try 
				{
					$this->ApplyPolicies($this->policies[$property], $property, $value);
				} 
				catch (Exception $e) 
				{
					throw $e;
				}
			}
			return $this->$func($value);
		} 
		elseif (in_array(strtolower($property), array_map('strtolower', array_keys($this->policies))))
		{
			try 
			{
				$this->ApplyPolicies($this->policies[$property], $property, $value);
			} 
			catch (Exception $e) 
			{
				throw $e;
			}
			$this->attributes[$property] = $value;
		}
		elseif ($property == 'id')
		{
			$this->attributes['id'] = $value;
		}
		else
		{
			throw new InvalidArgumentException("Unknown property $property");
		}
	}

	/////////////
	// Method  //
	/////////////
	/**
	 * Return true if entity in modified
	 * @return boolean 
	 */
	public function isDirty()
	{
		foreach ($this->attributes as $k => $v)
		{
			if ($this->attributes[$k] !== $this->original()[$k])
			{
				return true;
			}
		}

		return false;
	}

	/**
	 * Get original attribute
	 * @return [array] original value
	 */
	public function original($property = null) 
	{
		if ($property)
		{
			return $this->original_attributes[$property];
		}
		else
		{
			return $this->original_attributes;
		}
	}

	/**
	 * Check entity is the same as the passed parameter
	 * @param  IEntity $entity  entity to be checked
	 * @return [boolean]
	 */
	public function equals(IEntity $entity)
	{
		if ($this->attributes['id'] === $entity->id)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Get all attributes in array
	 * @return [array] 
	 */
	public function toArray()
	{
		foreach ($this->attributes as $field => $value)
		{
			$attributes[$field] = $this->attributes[$field];
		}

		return $attributes;
	}

	/**
	 * Apply Policies
	 * @param array  $policies [description]
	 * @param mixed $value    [description]
	 */
	protected function ApplyPolicies($policies = [], $property, $value)
	{
		foreach ($policies as $policy)
		{
			try {
				///////////////////////////////////////
				// Extract Policy class & parameters //
				///////////////////////////////////////
				list($policy_class, $policy_parameters) = explode(":", $policy);

				//////////////////////////////
				// Create policy & validate //
				//////////////////////////////
				$new_policy = new $policy_class($property, $value, explode(',', $policy_parameters));
				$new_policy->apply();
			} catch (Exception $e) {
				throw $e;
			}
		}
	}

	/**
	 * next identity
	 * @return [string] guid
	 */
	public function createID()
	{
		if (function_exists('com_create_guid') === true)
		{
			return trim(com_create_guid(), '{}');
		}

		return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));		
	}
}