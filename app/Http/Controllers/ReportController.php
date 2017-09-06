<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Service\Pengaturan\GrantVisa;

use App\Domain\HR\Models\Orang;
use App\Domain\Akses\Models\Koperasi;
use App\Domain\Akses\Models\Visa;

use TAuth, URL, Response;

/**
 * Kelas PenggunaController
 *
 * Digunakan untuk semua data Kredit.
 *
 * @author     Agil M <agil@thunderlab.id>
 */
class ReportController extends Controller
{
	/**
	 * Creates construct from controller to get instate some stuffs
	 */
	public function __construct(Request $request)
	{
		parent::__construct();

		$this->request 		= $request;
	}

	/**
	 * lihat semua data kredit
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->setGlobal();
		
		//initialize view
		$this->view									= view('pages.report.template');

		//function from parent to generate view
		return $this->generateView();
	}
}