<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Domain\HR\Models\Orang;

use Input, Response;

/**
 * Kelas DebiturController
 *
 * Digunakan untuk semua data Kredit.
 *
 * @author     Chelsy M <chelsy@thunderlab.id>
 */
class DebiturController extends Controller
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
		$pengguna 		= Orang::where('nik', Input::get('nik'))->first();

		return Response::json($pengguna);
	}
}
