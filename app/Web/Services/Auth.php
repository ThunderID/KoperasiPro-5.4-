<?php

namespace App\Web\Services;

use Session, Hash, Exception;
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
	 * Mengecek user yang sedang login
	 *
	 */
	public static function loggedUser()
	{
		$data 	= new UserRepository;
		
		return $data->findByID(Session::get('logged.id'));
	}

	/**
	 * Autentikasi user yang akan login
	 *
	 * @param array $credentials
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

	/**
	 * Membuat object asset baru dari data array
	 *
	 */
	public static function die()
	{
		Session::forget('logged.id');

		return true;
	}
}