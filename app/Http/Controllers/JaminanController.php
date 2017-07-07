<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Domain\Pengajuan\Models\JaminanTanahBangunan;
use App\Domain\Survei\Models\AsetTanahBangunan;

use App\Domain\Pengajuan\Models\JaminanKendaraan;
use App\Domain\Survei\Models\AsetKendaraan;

use Input, Response;

/**
 * Kelas JaminanController
 *
 * Digunakan untuk semua data Kredit.
 *
 * @author     Chelsy M <chelsy@thunderlab.id>
 */
class JaminanController extends Controller
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
	public function tanah_bangunan()
	{
		$jtb 		= JaminanTanahBangunan::where('nomor_sertifikat', Input::get('nomor_sertifikat'))->first();

		if(!$jtb)
		{
			$jtb 	= AsetTanahBangunan::where('nomor_sertifikat', Input::get('nomor_sertifikat'))->first();
			
			if($jtb)
			{
				switch (strtolower($jtb['tipe'])) 
				{
					case 'ruko': case 'rumah':
						$jtb['tipe']		= 'tanah_bangunan';
						$jtb['luas_tanah']	= $jtb['luas'];
						break;
					case 'tanah': case 'tambak' : case 'lain_lain' : 
						$jtb['tipe']		= 'tanah';
						$jtb['luas_tanah']	= $jtb['luas'];
						break;
					default:
						$jtb['tipe']		= 'tanah';
						$jtb['luas_tanah']	= $jtb['luas'];
						break;
				}

				$jtb['alamat']		= $jtb['alamat'][0];
			}
			else
			{
				$jtb 	= null;
			}
		}

		return Response::json($jtb);
	}

	public function kendaraan()
	{
		$jk 		= JaminanKendaraan::where('nomor_bpkb', Input::get('nomor_bpkb'))->first();

		if(!$jk)
		{
			$jk 	= AsetKendaraan::where('nomor_bpkb', Input::get('nomor_bpkb'))->first();
			
			if(!$jk)
			{
				$jk 	= null;
			}
		}

		return Response::json($jk);
	}
}
