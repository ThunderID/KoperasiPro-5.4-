<?php

namespace Thunderlabid\Application\Services;

use Thunderlabid\Application\Services\Interfaces\IService;

///////////////////
//   Repository  //
///////////////////
use Thunderlabid\Indonesia\Repositories\ProvinceRepository as Repository;

///////////////////
// Specification //
///////////////////
use Thunderlabid\Indonesia\Repositories\Specifications\SpecificationByID;
use Thunderlabid\Indonesia\Repositories\Specifications\PageSpecification;

///////////////////
//  Transformer  //
///////////////////
use Thunderlabid\Application\DataTransformers\Indonesia\ProvinceDTODataTransformer as DataTransformer;

///////////////////
//    Factory    //
///////////////////
use Thunderlabid\Indonesia\Factories\ProvinceFactory as Factory;

/**
 * Class Services Application
 *
 * Meyimpan visa dari Province tertentu.
 *
 * @package    Thunderlabid
 * @subpackage Application
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class ProvinceService implements IService
{
	private $repository;
	private $transformer;

	public function __construct() 
	{
		$this->repository 			= new Repository;
		$this->transformer 			= new DataTransformer;
	}

	/**
	 * this function mean keep executing
	 * @param numeric $page
	 * 
	 * @return ProvinceDTODataTransformer $data
	 */
	public function read()
	{
		$data 						= $this->repository->query([]);

		$province_entities 			= [];

		foreach ($data as $key => $value) 
		{
			$province_entities[]	= $this->transformer->read($value);
		}

		return 	$province_entities;
	}
}
