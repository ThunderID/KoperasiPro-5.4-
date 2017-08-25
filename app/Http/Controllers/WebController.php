<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Thunderlabid\Web\Services\SessionBasedAuthenticator;
use Input, Exception, Redirect, URL, TAuth;

/**
 * Kelas WebController
 *
 * Digunakan untuk semua data Credit.
 *
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class WebController extends Controller
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
	public function privacypolicy()
	{
		// set page attributes (please check parent variable)
		$this->page_attributes->title				= "PRIVACY POLICY";

		//initialize view
		$this->view									= view('pages.privacy.policy');

		//function from parent to generate view
		return $this->generateView();
	}
}
