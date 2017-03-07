<?php

namespace Thunderlabid\Indonesia\Repositories\Specifications;

use Thunderlabid\Indonesia\Repositories\Specifications\Interfaces\ISpecification;
use Thunderlabid\Indonesia\Repositories\Specifications\Traits\ISpecificationTrait;
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
