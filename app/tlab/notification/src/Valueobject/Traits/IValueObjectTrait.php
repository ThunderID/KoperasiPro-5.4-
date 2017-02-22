<?php

namespace Thunderlabid\Notification\Valueobject\Traits;

trait IValueObjectTrait { 

	/**
	 * [__get description]
	 * @param  [string] $var 
	 * @return [mixed]  
	 */
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
			if (property_exists($this, $property))
			{
				return $this->$property;
			}
			else
			{
				throw new \Exception("$property not found", 1);
			}
		}
	}

}