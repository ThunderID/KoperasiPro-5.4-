<?php

namespace Thunderlabid\Application\Queries\ACL;

///////////////
//   Models  //
///////////////
use Thunderlabid\Immigration\Models\Pengguna as Model;

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
class SessionBasedAuthenticator
{
	public function __construct()
	{
		$this->model 		= new Model;
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

		$user 	= $this->model->email($credentials['email'])->first();

		if(!$user)
		{
			throw new Exception("Email tidak terdaftar!", 1);
		}

		if(!Hash::check($credentials['password'], $user->password))
		{
			throw new Exception("Password Tidak Cocok!", 1);
		}

		Session::put('logged.id', $user->id);
		Session::put('accesses.idx', $user->visas[0]['id']);
	
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
		$user 	= $this->model->findorfail(Session::get('logged.id'));

		if(!$user)
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
		$user 	= $this->model->findorfail(Session::get('logged.id'));

		if(!$user)
		{
			throw new Exception("Invalid Login!", 1);
		}

		return $user->toArray();
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
