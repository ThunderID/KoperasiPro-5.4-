<?php

namespace Thunderlabid\Credit\Valueobjects\Traits;

use Thunderlabid\Credit\Entities\Interfaces\IEntity;
use Exception;
use \Illuminate\Support\MessageBag;

trait IValueObjectTrait { 

	private $original_attributes;
	private $attributes;

	//////////////
	// Accessor //
	//////////////
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
				throw new Exception(new MessageBag(['message' => "$property not found"]), 1);
			}
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
		$is_equal = true;
		foreach ($this->attributes as $attr => $value)
		{
			if ($value !== $entity->$attr)
			{
				$is_equal = false;
			}
		}
		return $is_equal;
	}
}