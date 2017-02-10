<?php

namespace App\Web\Services;

use Session;
use Thunderlabid\Registry\Repository\UserRepository;

/**
 * Kelas Auth
 *
 * Digunakan untuk pengajuan Auth.
 *
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class Auth 
{
	/**
	 * Membuat object asset baru dari data array
	 *
	 * @param string $type
	 * @param array $array
	 */
	public static function loggedUser()
	{
		$data 	= new UserRepository;
		
		return $data->findByID(Session::get('logged.id'));
	}

	/**
	 * Membuat object asset baru dari data array
	 *
	 * @param string $type
	 * @param array $array
	 */
	public static function authenticate($credentials)
	{
		$data 	= new UserRepository;
		
		$data 	= $data->findByEmail($credentials['email']);

		if(!Hash::check($credentials['password'], $data->password))
		{
			throw new Exception("Password Tidak Cocok!", 1);
		}

		Session::put('logged.id', $data->id);

		return true;
	}
}