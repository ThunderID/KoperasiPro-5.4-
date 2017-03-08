<?php

namespace Thunderlabid\Credit\Repositories\Specifications;

use Thunderlabid\Credit\Repositories\Specifications\Interfaces\ISpecification;
use Thunderlabid\Credit\Repositories\Specifications\Traits\ISpecificationTrait;
use Exception;

class SpecificationByStatus implements ISpecification
{
	public function __construct($status)
	{
		////////////////////////////////////////
		// Check if model is instanceof Model //
		////////////////////////////////////////

		$this->specifications['status'] = $status;
	}

	/**
	 * Apply specification
	 * @param  [Model] $model 
	 * @return [Model] $model with applied specification
	 */
	public function apply($model)
	{
		return $model->status($this->specifications['status']);
	}
}
