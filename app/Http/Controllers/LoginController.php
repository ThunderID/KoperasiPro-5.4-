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
	 * simpan kredit
	 *
	 * @return Response
	 */
	public function store()
	{
		//get input
		$credentials	= Input::only('email', 'password');

		//do authenticate
		$auth			= Auth::authenticate($credentials);

		//function from parent to redirecting
		return $this->generateRedirect(route('dashboard.index'));
	}
}
