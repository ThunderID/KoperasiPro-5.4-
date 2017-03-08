<?php

namespace Thunderlabid\Credit\Repositories\Specifications;

use Thunderlabid\Credit\Repositories\Specifications\Interfaces\ISpecification;
use Thunderlabid\Credit\Repositories\Specifications\Traits\ISpecificationTrait;
use Exception;

class SpecificationByKoperasiID implements ISpecification
{
	public function __construct($koperasiID)
	{
		////////////////////////////////////////
		// Check if model is instanceof Model //
		////////////////////////////////////////

		$this->specifications['koperasiID'] = $koperasiID;
	}

	/**
	 * Apply specification
	 * @param  [Model] $model 
	 * @return [Model] $model with applied specification
	 */
	public function apply($model)
	{
		return $model->koperasiID($this->specifications['koperasiID']);
	}
}
