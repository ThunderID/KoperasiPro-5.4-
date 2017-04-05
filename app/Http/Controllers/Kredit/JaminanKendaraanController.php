<?php

namespace App\Http\Controllers\Kredit;

use Illuminate\Http\Request;

use TAPIQueries\Credit\JSend;

use App\Http\Controllers\Controller;
use TCommands\Kredit\HapusJaminanKendaraan;

use App\Web\Services\Person;
use Input, PDF, Carbon\Carbon, Redirect;

/**
 * Kelas JaminanKendaraanController
 *
 * Digunakan untuk semua data jaminan kendaraan.
 *
 * @author     Agil M <agil@thunderlab.id>
 */
class JaminanKendaraanController extends Controller
{
	/**
	 * Creates construct from controller to get instate some stuffs
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * menghapus credit tertentu
	 *
	 * @param string $id
	 * @return Response
	 */
	public function destroy($kredit_id, $nomor_bpkb)
	{
		dispatch(new HapusJaminanKendaraan($kredit_id, $nomor_bpkb));

		return Redirect::route('credit.show', ['id' => $kredit_id]);
	}
}
