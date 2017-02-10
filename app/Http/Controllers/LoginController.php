<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Web\Services\Auth;
use Input;

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
		$credentials	= Input::only('email', 'key');
		$credentials['password']	= $credentials['key'];

		//do authenticate
		$auth			= Auth::authenticate($credentials);

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
		$auth			= Auth::die();

		//function from parent to redirecting
		return $this->generateRedirect(route('login.index'));
	}
}
