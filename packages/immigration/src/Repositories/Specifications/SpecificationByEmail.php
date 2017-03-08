<?php

namespace Thunderlabid\Immigration\Repositories\Specifications;

use Thunderlabid\Immigration\Repositories\Specifications\Interfaces\ISpecification;
use Thunderlabid\Immigration\Repositories\Specifications\Traits\ISpecificationTrait;
use Exception;

class SpecificationByEmail implements ISpecification
{
	public function __construct($email)
	{
		////////////////////////////////////////
		// Check if model is instanceof Model //
		////////////////////////////////////////

		$this->specifications['email'] = $email;
	}

	/**
	 * Apply specification
	 * @param  [Model] $model 
	 * @return [Model] $model with applied specification
	 */
	public function apply($model)
	{
		return $model->where('email', $this->specifications['email']);
	}
}
