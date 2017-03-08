<?php

namespace Thunderlabid\Registry\Repositories\Specifications;

use Thunderlabid\Registry\Repositories\Specifications\Interfaces\ISpecification;
use Thunderlabid\Registry\Repositories\Specifications\Traits\ISpecificationTrait;

/**
 * Class implement Specifications
 *
 * Digunakan query reading model eloquent/moloquent.
 *
 * @package    Thunderlabid
 * @subpackage Registry
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class PageSpecification implements ISpecification
{ 
	/**
	 * construct fungsi page paginasi
	 * 
	 * @param numeric $page
	 * @param numeric $per_page
	 */
	public function __construct($page, $per_page = 15)
	{
		$this->specifications['page']  		= $page;
		$this->specifications['per_page']  	= $per_page;
	}

	/**
	 * apply fungsi paginasi
	 * 
	 * @param Eloquent/Moloquent $model
	 * @return Eloquent/Moloquent $model
	 */
	public function apply($model)
	{
		$skip 			= ($this->specifications['page'] - 1) * $this->specifications['per_page'];

		return $model->skip($skip)->take($this->specifications['per_page']);
	}
}
