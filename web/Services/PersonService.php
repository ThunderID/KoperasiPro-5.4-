<?php

namespace Thunderlabid\Application\Services;

use Thunderlabid\Application\Services\Interfaces\IService;

///////////////////
//   Repository  //
///////////////////
use Thunderlabid\Registry\Repositories\PersonRepository as Repository;

///////////////////
// Specification //
///////////////////
use Thunderlabid\Registry\Repositories\Specifications\SpecificationByID;
use Thunderlabid\Registry\Repositories\Specifications\PageSpecification;

///////////////////
//  Transformer  //
///////////////////
use Thunderlabid\Application\DataTransformers\Registry\PersonDTODataTransformer as DataTransformer;

///////////////////
//    Factory    //
///////////////////
use Thunderlabid\Registry\Factories\PersonFactory as Factory;

///////////////////
//     Entity    //
///////////////////
use Thunderlabid\Registry\Entities\Person;

/**
 * Class Services Application
 *
 * Meyimpan person tertentu.
 *
 * @package    Thunderlabid
 * @subpackage Application
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class PersonService implements IService
{
	private $factory;
	private $repository;
	private $transformer;

	public function __construct() 
	{
		$this->repository 			= new Repository;
		$this->factory 				= new Factory;
		$this->transformer 			= new DataTransformer;
	}

	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return PersonDTODataTransformer $data
	 */
	public function register($data)
	{
		//build person factory
		$person				= $this->factory->build(null, 
												$data['nik'], 
												$data['nama'], 
												$data['tempat_lahir'], 
												$data['tanggal_lahir'], 
												$data['jenis_kelamin'], 
												$data['agama'], 
												$data['pendidikan_terakhir'], 
												$data['status_perkawinan'], 
												$data['kewarganegaraan'],
												$data['alamat'],
												$data['kontak'],
												$data['relasi'],
												$data['pekerjaan']
											);

		$saved 				= $this->repository->store($person);

		return $this->transformer->read($saved);
	}

	/**
	 * this function mean keep executing
	 * @param numeric $page
	 * 
	 * @return PersonDTODataTransformer $data
	 */
	public function read($page, $per_page = 15)
	{
		$data 						= $this->repository->query([new PageSpecification($page, $per_page)]);
		
		$user_entities 				= [];

		$transformer 				= new DataTransformer;

		foreach ($data as $key => $value) 
		{
			$user_entities[]		= $transformer->read($value);
		}

		return 	$user_entities;
	}
}
