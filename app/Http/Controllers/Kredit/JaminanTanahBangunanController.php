<?php

namespace App\Http\Controllers\Kredit;

use Illuminate\Http\Request;

use Thunderlabid\API\Queries\Credit\JSend;

use App\Http\Controllers\Controller;
use Thunderlabid\Web\Commands\Credit\HapusJaminanTanahBangunan;

use Input, PDF, Carbon\Carbon, Redirect;

/**
 * Kelas JaminanKendaraanController
 *
 * Digunakan untuk semua data jaminan kendaraan.
 *
 * @author     Agil M <agil@thunderlab.id>
 */
class JaminanTanahBangunanController extends Controller
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
	public function destroy($kredit_id, $nomor_sertifikat)
	{
		dispatch(new HapusJaminanTanahBangunan($kredit_id, $nomor_sertifikat));

		return Redirect::route('credit.show', ['id' => $kredit_id]);
	}
}
