<?php

namespace Thunderlabid\Credit\Entities\Policies\Interfaces;

interface IPolicy { 

	/**
	 * [__construct description]
	 * @param [string] 	$attribute  attribute name
	 * @param [mixed] 	$value      value to be applied using this policy
	 * @param array  $parameters 	extra parameters
	 */
	public function __construct($attribute, $value, $parameters = []);

	/**
	 * Apply this policy
	 * @return [Exception] 
	 */
	public function apply();

}