<?php

namespace Thunderlabid\Immigration\Repositories\Specifications\Interfaces;

interface ISpecification
{
	/**
	 * Apply specification
	 * @return [Model] $model with applied specification
	 */
	public function apply($model);
}
