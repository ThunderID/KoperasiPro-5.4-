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
			dispatch(new AjukanKredit($this->request->input()));
		} catch (Exception $e) {
			return JSend::error($e->getMessage())->asArray();
		}

		return JSend::success([])->asArray();
	}
}