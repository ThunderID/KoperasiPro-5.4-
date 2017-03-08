<?php

namespace Thunderlabid\Immigration\Repositories\Specifications;

use Thunderlabid\Immigration\Repositories\Specifications\Interfaces\ISpecification;
use Thunderlabid\Immigration\Repositories\Specifications\Traits\ISpecificationTrait;
use Exception;

class SpecificationByID implements ISpecification
{
	public function __construct($id)
	{
		////////////////////////////////////////
		// Check if model is instanceof Model //
		////////////////////////////////////////

		$this->specifications['id'] = $id;
	}

	/**
	 * Apply specification
	 * @param  [Model] $model 
	 * @return [Model] $model with applied specification
	 */
	public function apply($model)
	{
		return $model->id($this->specifications['id']);
	}
}
