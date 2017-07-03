<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Thunderlabid\Web\Services\SessionBasedAuthenticator;
use Input, Exception, Redirect, URL, TAuth;

/**
 * Kelas LoginController
 *
 * Digunakan untuk semua data Credit.
 *
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class LoginController extends Controller
{
	/**
	 * Creates construct from controller to get instate some stuffs
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * lihat semua data credit
	 *
	 * @return Response
	 */
	public function index()
	{
		// set page attributes (please check parent variable)
		$this->page_attributes->title				= "Login";

		//initialize view
		$this->view									= view('pages.uac.login');

		//function from parent to generate view
		return $this->generateView();
	}

	/**
	 * login process
	 *
	 * @return Response
	 */
	public function logging()
	{
		//get input
		$credentials				= Input::only('nip', 'key');
		$credentials['password']	= $credentials['key'];

		// $credentials['email']		= 'admin@ksp.id';
		// $credentials['password']	= 'admin';

		try
		{
			//do authenticate
			$auth			= TAuth::login($credentials);
		}
		catch(Exception $e)
		{
			if(is_array($e->getMessage()))
			{
				$this->page_attributes->msg['error'] 	= $e->getMessage();
			}
			else
			{
				$this->page_attributes->msg['error'] 	= [$e->getMessage()];
			}
			return $this->generateRedirect(route('login.index'));
		}

		//function from parent to redirecting
		return $this->generateRedirect(route('credit.index'));
	}

	/**
	 * logout
	 *
	 * @return Response
	 */
	public function logout()
	{
		//do authenticate
		$auth			= TAuth::signoff();

		//function from parent to redirecting
		return $this->generateRedirect(route('login.index'));
	}

	/**
	 * setting which office should be activate
	 *
	 * @return Response
	 */
	public function activateOffice($idx)
	{
		try
		{
			//do authenticate
			$auth			= TAuth::setOffice($idx);
		}
		catch(Exception $e)
		{
			if(is_array($e->getMessage()))
			{
				$this->page_attributes->msg['error'] 	= $e->getMessage();
			}
			else
			{
				$this->page_attributes->msg['error'] 	= [$e->getMessage()];
			}

			return Redirect::back()
					->with('msg', $this->page_attributes->msg)
					;
		}

		//function from parent to redirecting
		return redirect(URL::previous());
	}
}
