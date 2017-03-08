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
use Thunderlabid\Immigration\Repositories\Specifications\SpecificationByEmail;

///////////////////
//  Transformer  //
///////////////////
use Thunderlabid\Application\DataTransformers\User\UserDTODataTransformer as DataTransformer;

///////////////////
//    Factory    //
///////////////////
use Thunderlabid\Immigration\Factories\VisaFactory as Factory;

///////////////////
//     Entity    //
///////////////////
use Thunderlabid\Immigration\Entities\User;

use Hash, Exception, Session;

/**
 * Class Services Application
 *
 * Meyimpan visa dari user tertentu.
 *
 * @package    Thunderlabid
 * @subpackage Application
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class SessionBasedAuthenticator implements IService
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
	 * @param array $data
	 * 
	 * @return UserDTODataTransformer $data
	 */
	public function login($credentials)
	{
		// $event 	= (new \App\Jobs\FireEventUserLogged(['test']));

		$user 	= $this->repository->query([new SpecificationByEmail($credentials['email'])]);

		if(!Hash::check($credentials['password'], $user[0]->password))
		{
			throw new Exception("Password Tidak Cocok!", 1);
		}

		Session::put('logged.id', $user[0]->id);
		Session::put('accesses.idx', $user[0]->visas[0]->id);
	
		// dispatch($event);

		return true;
	}

	/**
	 * this function mean keep executing
	 * 
	 * @return UserDTODataTransformer $data
	 */
	public function isLogged()
	{
		$user 	= $this->repository->query([new SpecificationByID(Session::get('logged.id'))]);

		if(!$user[0])
		{
			throw new Exception("Invalid Login!", 1);
		}

		return true;
	}

	/**
	 * this function mean keep executing
	 * 
	 * @return UserDTODataTransformer $data
	 */
	public function loggedUser()
	{
		$user 	= $this->repository->query([new SpecificationByID(Session::get('logged.id'))]);

		if(!$user[0])
		{
			throw new Exception("Invalid Login!", 1);
		}

		return $this->transformer->read($user[0]);
	}

	/**
	 * Mengecek office yang sedang active
	 *
	 * @return UserDTODataTransformer $data
	 */
	public function activeOffice()
	{
		$user 	= $this->loggedUser();

		$visas 	= collect($user['visas']);

		$office = $visas->where('id', Session::get('accesses.idx'));

		foreach ($office as $key => $value) 
		{
			return $value;
		}
	}

	/**
	 * Membuat object asset baru dari data array
	 *
	 */
	public static function signoff()
	{
		Session::forget('logged.id');

		return true;
	}

	/**
	 * Mengganti setting - an kantor yang active
	 *
	 */
	public static function setOffice($idx)
	{
		Session::put('accesses.idx', $idx);

		return true;
	}
}
