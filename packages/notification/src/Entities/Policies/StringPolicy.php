<?php

namespace Thunderlabid\Notification\Entities\Policies;

use \Thunderlabid\Notification\Entities\Policies\Interfaces\IPolicy;
use Exception;
use Validator;

class StringPolicy implements IPolicy { 

	/**
	 * [__construct description]
	 * @param [string] 	$attribute  attribute name
	 * @param [mixed] 	$value      value to be applied using this policy
	 * @param array  $parameters 	extra parameters
	 */
	public function __construct($attribute, $value, $parameters = [])
	{
		if (!is_string($attribute))
		{
			throw new InvalidArgumentException(json_encode('Parameter 1 must be string'));
		}

		$this->attribute		= $attribute;
		$this->value			= $value;
	}

	/**
	 * Apply
	 * @return  [Exception]
	 */
	public function apply()
	{
		///////////////////
		// Set Attribute //
		///////////////////
		$attr[$this->attribute] = $this->value;

		///////////////
		// Set Rules //
		///////////////
		$rules[$this->attribute] = ['string'];

		///////////////////
		// Set Validator //
		///////////////////
		$validator = Validator::make($attr, $rules);

		//////////////
		// Validate //
		//////////////
		if ($validator->fails())
		{
			throw new Exception(json_encode($validator->messages()->toArray()));
		}
	}
}
