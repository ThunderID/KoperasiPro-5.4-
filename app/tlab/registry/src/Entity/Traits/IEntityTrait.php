<?php

namespace Thunderlabid\Registry\Entity\Traits;

use Thunderlabid\Registry\Entity\Interfaces\IEntity;
use Exception;

trait IEntityTrait 
{ 
	private $original_attributes;
	private $attributes;

	//////////////
	// Accessor //
	//////////////
	public function __get($property)
	{
		$func = 'get'.$property.'attribute';
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
				throw new Exception("$property not found", 1);
			}
		}
	}

	/////////////
	// Mutator //
	/////////////
	public function __set($property, $value)
	{
		$func = 'set'.str_replace('_', '', $property).'attribute';
		if (method_exists($this, $func))
		{
			return $this->$func($value);
		} 
		else
		{
			throw new Exception("Unknown property $property", 1);
		}
	}

	/////////////
	// Method  //
	/////////////
	/**
	 * Return false if data already modified after initialization
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
	 * Return original data before initialization
	 * @return array
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
	 * Compare this object with other object, and return true if they have the same id
	 * @param  IEntity $entity [description]
	 * @return boolean         [true if both object has the same id]
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
}