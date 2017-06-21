<?php

namespace App\Service\Akses;

///////////////
//   Models  //
///////////////
use App\Domain\Akses\Models\PandoraBox as Model;

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
class APIAuthenticator
{
	public function __construct()
	{
		$this->model 		= new Model;
	}

	/**
	 * this function mean keep executing
	 * @param array $data
	 * 
	 * @return boolean $data
	 */
	public function authenticating($credentials)
	{
		$user 	= $this->model->key($credentials['key'])->first();

		if(!$user)
		{
			throw new Exception("Key tidak terdaftar!", 1);
		}

		if(!Hash::check($credentials['secret'], $user->secret))
		{
			throw new Exception("secret Tidak Cocok!", 1);
		}

		return true;
	}
}
