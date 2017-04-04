<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Thunderlabid\Web\Commands\UIHelper\UploadGambar;

use Input, Carbon\Carbon, TAuth;

/**
 * Kelas CreditController
 *
 * Digunakan untuk semua data Kredit.
 *
 * @author     Agil M <agil@thunderlab.id>
 */
class TestController extends Controller
{
	/**
	 * Creates construct from controller to get instate some stuffs
	 */
	public function __construct()
	{
		parent::__construct();

		// $this->service 		= new UploadGambar;
	}

	/**
	 * lihat semua data kredit
	 *
	 * @return Response
	 */
	public function upload()
	{
		$credentials 	= ['email' => 'admin@ksp.id', 'password' => 'admin'];
		TAuth::login($credentials);


		$upload = new UploadGambar(Input::file('gambar'));
		$url 	= $upload->handle();
		dd($url);
	}
}
