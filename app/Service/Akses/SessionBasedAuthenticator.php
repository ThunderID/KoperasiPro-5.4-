<?php

namespace App\Service\Akses;

///////////////
//   Models  //
///////////////
use App\Domain\HR\Models\Orang as Model;
use App\Domain\Akses\Models\Visa;

use Hash, Exception, Session;
use Carbon\Carbon;

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

		$user 	= $this->model->where('email', $credentials['email'])->first();

		if(!$user)
		{
			throw new Exception("Email tidak terdaftar!", 1);
		}

		if(!Hash::check($credentials['password'], $user->password))
		{
			throw new Exception("Password Tidak Cocok!", 1);
		}

		$visa 	= Visa::id($user->visas[0]->id)->first();

		$visa->last_logged		= Carbon::now()->format('Y-m-d H:i:s');
		$visa->save();

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
		try 
		{
			$user 	= $this->model->findorfail(Session::get('logged.id'));
		} 
		catch (Exception $e) 
		{
			return $e;
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
		$user 	= $this->model->id(Session::get('logged.id'))->with(['visas', 'visas.koperasi'])->first();

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
		$visa 				= Visa::where('orang_id', Session::get('logged.id'))->id($idx)->firstorfail();
		$visa->last_logged 	= Carbon::now()->format('Y-m-d H:i:s');
		$visa->save();

		Session::put('accesses.idx', $idx);

		return true;
	}
}
