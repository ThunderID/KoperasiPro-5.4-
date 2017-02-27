<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Web\Services\Credit;
use App\Web\Services\Person;
use Input;

/**
 * Kelas CreditSurveyController
 *
 * Digunakan untuk semua data Credit.
 *
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class CreditSurveyController extends Controller
{
	/**
	 * Creates construct from controller to get instate some stuffs
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * lihat semua data Survey
	 *
	 * @return Response
	 */
	public function index()
	{
		// set page attributes (please check parent variable)
		$this->page_attributes->title				= "Daftar Survey";
		$this->page_attributes->breadcrumb			= [
															'Survey Kredit'   => route('survey.index'),
													 ];

		//this function to set all needed variable in lists Survey (sidebar)
		$this->getSurveyLists();

		//initialize view
		$this->view									= view('pages.survey.index');

		//function from parent to generate view
		return $this->generateView();
	}

	/**
	 * menampilkan data kredit dan input data survey
	 *
	 * @return Response
	 */
	public function show($id)
	{
		// set page attributes (please check parent variable)
		$this->page_attributes->title              = "Daftar Survey";
		$this->page_attributes->breadcrumb         = [
															'Survey'   => route('survey.index'),
													 ];

		//initialize view
		$this->view                                = view('pages.survey.show');

		//this function to set all needed variable in lists credit (sidebar)
		$this->getSurveyLists();

		//parsing master data here
		$this->page_datas->credit 					= Credit::findByID($id);
		$this->page_datas->id 						= $id;

		//function from parent to generate view
		return $this->generateView();
	}

	/**
	 * simpan kredit
	 *
	 * @return Response
	 */
	public function store()
	{
		$credit_id 				= Input::get('id');

		$kepribadian 			= Input::get('kepribadian');
		$makro 					= Input::get('makro');
		$aset 					= Input::get('aset');
		$keuangan 				= Input::get('keuangan');
		$jaminan 				= Input::get('jaminan');


		$credit 				= Credit::findByID($credit_id);

		$service 				= new Credit;
		if(!is_null($kepribadian)){
			$service->update('kepribadian', $kepribadian, $credit->credit);
		}
		if(!is_null($makro)){
			$service->update('makro', $makro, $credit->credit);
		}
		if(!is_null($aset)){
			$service->update('aset', $aset, $credit->credit);
		}
		if(!is_null($keuangan)){
			$service->update('keuangan', $keuangan, $credit->credit);
		}
		if(!is_null($keuangan)){
			$service->update('jaminan', $jaminan, $credit->credit);
		}

		//function from parent to redirecting
		return $this->generateRedirect(route('survey.show',['id' => $credit_id]));
	}

	/**
	 * Fungsi ini untuk menampilkan credit lists, fungsi sidebar.
	 * variable filter dan search juga di parse disini
	 * data dari view pages.credit.lists diatur disini
	 */
	private function getSurveyLists()
	{
		//1. Parsing status
		$status 									= 'analyzing'; 

		//2. Parsing search box
		if(Input::has('q'))
		{
			$this->page_datas->credits				= Credit::findByName($status, Input::get('q'));
		}
		else
		{
			$this->page_datas->credits				= Credit::all($status);
		}

		//3. Memanggil fungsi filter active
		$this->page_datas->credit_filters 			= [];
	}
}
