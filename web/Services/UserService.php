<?php

namespace Thunderlabid\Application\Services;

use Thunderlabid\Application\Services\Interfaces\IService;

///////////////////
//   Repository  //
///////////////////
use Thunderlabid\Immigration\Repositories\UserRepository as Repository;

///////////////////
// Specification //
///////////////////
use Thunderlabid\Immigration\Repositories\Specifications\SpecificationByID;
use Thunderlabid\Immigration\Repositories\Specifications\PageSpecification;

///////////////////
//  Transformer  //
///////////////////
use Thunderlabid\Application\DataTransformers\User\UserDTODataTransformer as DataTransformer;

///////////////////
//    Factory    //
///////////////////
use Thunderlabid\Immigration\Factories\VisaFactory;
use Thunderlabid\Immigration\Factories\UserFactory as Factory;

///////////////////
//     Entity    //
///////////////////
use Thunderlabid\Immigration\Entities\User;

/**
 * Class Services Application
 *
 * Meyimpan visa dari user tertentu.
 *
 * @package    Thunderlabid
 * @subpackage Application
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class UserService implements IService
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
	 * @return UserDTODataTransformer $data
	 */
	public function signup($data)
	{
		$user	= $this->factory->build(null, $data['email'], $data['password'], $data['name'], []);

		$saved 	= $this->repository->store($user);

		return $this->transformer->read($saved);
	}

	/**
	 * this function mean keep executing
	 * @param numeric $page
	 * 
	 * @return UserDTODataTransformer $data
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

	/**
	 * this function mean keep executing
	 * @param string $data['user_id']
	 * @param string $data['office']['id']
	 * @param string $data['office']['name']
	 * @param string $data['office']['role']
	 * 
	 * @return UserDTODataTransformer $data
	 */
	public function grantVisa($data)
	{
		$job 			= (new \Thunderlabid\Immigration\Jobs\FireEventVisaGranted());

		$user 			= $this->repository->query([new SpecificationByID($data['user_id'])]);
		$data['user'] 	= $user[0];
		
		$visa			= new VisaFactory;
		$visa 			= $visa->build(null, $data['user_id'], $data['office']['id'], $data['office']['name'], $data['role']);
		
		$user_entity 	= $data['user']->addVisa($visa);

		$user_entity 	= $this->repository->store($data['user']);

		dispatch($job);

		return $this->transformer->read($user_entity);
	}

	/**
	 * this function mean keep executing
	 * @param string $data['user_id']
	 * @param string $data['office']['id']
	 * @param string $data['office']['name']
	 * @param string $data['office']['role']
	 * 
	 * @return UserDTODataTransformer $data
	 */
	public function removeVisa($data)
	{
		$user 			= $this->repository->query([new SpecificationByID($data['user_id'])]);
		$data['user'] 	= $user[0];
		
		$user_entity 	= $data['user']->removeVisa($data['visa_id']);

		$user_entity 	= $this->repository->store($data['user']);

		return $this->transformer->read($user_entity);
	}
}
