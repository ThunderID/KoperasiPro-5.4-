<?php

namespace App\API\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Thunderlabid\API\Queries\Credit\JSend;
use Thunderlabid\API\Queries\Credit\DaftarKredit;
use Thunderlabid\API\Commands\Credit\AjukanKredit;
use Thunderlabid\API\Commands\Credit\UploadGambarKTP;

use Input;

class KreditController extends Controller
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct(Request $request)
	{
		$this->request 	= $request;
	}

	public function index()
	{
		$data 	= new DaftarKredit;
		
		return JSend::success($data->get(['model' => $this->request->input('model')]))->asArray();
	}

	public function store()
	{
		try {
			$data_kredit 	= new AjukanKredit($this->request->input());
			$data_kredit 	= $data_kredit->handle();
		} catch (Exception $e) {
			return JSend::error($e->getMessage())->asArray();
		}

		return JSend::success(['nomor_kredit' => $data_kredit['nomor_kredit']])->asArray();
	}

	public function upload($nomor_kredit = null)
	{
		$ktp 			= Input::file('gambar');
		$data_kredit 	= new UploadGambarKTP($nomor_kredit, $ktp);
		$data_kredit 	= $data_kredit->handle();

		return JSend::success(['nomor_kredit' => $data_kredit['nomor_kredit']])->asArray();
	}
}