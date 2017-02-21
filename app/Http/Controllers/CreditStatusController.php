<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Web\Services\Credit;
use App\Web\Services\TAuth;

use Thunderlabid\Credit\Valueobject\Author;
use Thunderlabid\Credit\Valueobject\Status;

use Thunderlabid\Credit\Repository\CreditRepository;

use Redirect;

/**
 * Kelas CreditStatusController
 *
 * Digunakan untuk update status data kredit.
 *
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class CreditStatusController extends Controller
{
	/**
	 * Creates construct from controller to get instate some stuffs
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * ajukan data kredit
	 *
	 * @return Response
	 */
	public function propose($id)
	{
		//temporary still in here
		$credit		= Credit::findByID($id);

		//generate status attributes
		$author 	= new Author(TAuth::loggedUser()->id, TAuth::loggedUser()->owner->name, TAuth::activeOffice()->role);
		$status 	= new Status('analyzing', 'Pengajuan untuk analisa', 'today', $author);

		$credit->credit->addStatus($status);

		$credit_repo	= new CreditRepository;
		$credit_repo->store($credit->credit);

		return Redirect::back();
	}
}
