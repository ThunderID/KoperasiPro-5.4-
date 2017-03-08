<?php

namespace Thunderlabid\Credit\Repositories\Specifications\Interfaces;

interface ISpecification
{
	/**
	 * Apply specification
	 * @return [Model] $model with applied specification
	 */
	public function apply($model);
}
