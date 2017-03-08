<?php

namespace Thunderlabid\Credit\Repositories\Specifications;

use Thunderlabid\Credit\Repositories\Specifications\Interfaces\ISpecification;
use Thunderlabid\Credit\Repositories\Specifications\Traits\ISpecificationTrait;
use Exception;

class SpecificationByCreditorName implements ISpecification
{
	public function __construct($creditorName)
	{
		////////////////////////////////////////
		// Check if model is instanceof Model //
		////////////////////////////////////////

		$this->specifications['creditorName'] = $creditorName;
	}

	/**
	 * Apply specification
	 * @param  [Model] $model 
	 * @return [Model] $model with applied specification
	 */
	public function apply($model)
	{
		return $model->namaKreditur($this->specifications['creditorName']);
	}
}
