<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Web\Services\Credit;
use App\Web\Services\Person;
use Input;

/**
 * Kelas CreditController
 *
 * Digunakan untuk semua data Credit.
 *
 * @author     Agil M <agil@thunderlab.id>
 */
class CreditController extends Controller
{
	/**
	 * Creates construct from controller to get instate some stuffs
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * lihat semua data credit
	 *
	 * @return Response
	 */
	public function index()
	{
		// set page attributes (please check parent variable)
		$this->page_attributes->title				= "Daftar Kredit";
		$this->page_attributes->breadcrumb			= [
															'Kredit'   => route('credit.index'),
													 ];

		//this function to set all needed variable in lists credit (sidebar)
		$this->getCreditLists();

		//initialize view
		$this->view									= view('pages.credit.index');

		//function from parent to generate view
		return $this->generateView();
	}

	/**
	 * membuat data kredit baru
	 *
	 * @return Response
	 */
	public function create()
	{
		// set page attributes (please check parent variable)
		$this->page_attributes->title 				= "Kredit Baru";
		$this->page_attributes->breadcrumb 			= [
															'Kredit'   => route('credit.create'),
														];
		//initialize view
		$this->view 								= view('pages.credit.create');

		$data										= new \App\UI\CountryLists\Model\Province();
		$this->page_datas->province					= $data->pluck('province_name', 'province_id');

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
		// use service 
		$credit 													= new Credit;

		//get input

		//person
		$credit->datas->person										= Input::get('person');
		$credit->datas->person['id']								= null;
		$credit->datas->person['works']								= null;
		$credit->datas->person['relatives']							= null;



		//address
		$credit->datas->address										= Input::get('address');
		$credit->datas->address['id']								= null;
		$credit->datas->address['houses']							= null;
		$credit->datas->address['offices']							= null;
		$credit->datas->address['latitude']							= null;
		$credit->datas->address['longitude']						= null;


		// warrantor
		$credit->datas->warrantor 									= Input::get('warrantor');
		$credit->datas->warrantor['id']								= null;
		$credit->datas->warrantor['nik']							= null;
		$credit->datas->warrantor['place_of_birth']					= null;
		$credit->datas->warrantor['date_of_birth']					= null;

		$credit->datas->warrantor['religion']						= null;
		$credit->datas->warrantor['highest_education']				= null;
		$credit->datas->warrantor['marital_status']					= null;
		$credit->datas->warrantor['phone_number']					= null;
		$credit->datas->warrantor['works']							= [];
		$credit->datas->warrantor['relatives']						= [];

		$credit->datas->warrantor['address']['id']					= null;
		$credit->datas->warrantor['address']['latitude']			= null;
		$credit->datas->warrantor['address']['longitude']			= null;

		$credit->datas->warrantor['gender']							= 'male';


		//credit
		$credit->datas->credit										= Input::get('credit');
		$credit->datas->credit['id']								= null;


		$credit->datas->finance										= null;
		$credit->datas->asset										= null;


		//store all data that shaped an entity
		$result														= $credit->save();
		dd($result);

		//function from parent to redirecting
		return $this->generateRedirect(route('credit.index'));
	}

	/**
	 * lihat data credit tertentu
	 *
	 * @param string $id
	 * @return Response
	 */
	public function show($id)
	{
		// set page attributes (please check parent variable)
		$this->page_attributes->title              = "Daftar Kredit";
		$this->page_attributes->breadcrumb         = [
															'Kredit'   => route('credit.index'),
													 ];

		//initialize view
		$this->view                                = view('pages.credit.show');

		//this function to set all needed variable in lists credit (sidebar)
		$this->getCreditLists();

		//parsing master data here
		$this->page_datas->credit 					= Credit::findByID($id);
		$this->page_datas->id 						= $id;

		//function from parent to generate view
		return $this->generateView();
	}

	/**
	 * menghapus credit tertentu
	 *
	 * @param string $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//using credit service to delete credit data
		$credit    = Credit::delete($id);

		//function from parent to redirecting
		return $this->generateRedirect(route('credit.index'));
	}

	/**
	 * Fungsi ini untuk menampilkan credit lists, fungsi sidebar.
	 * variable filter dan search juga di parse disini
	 * data dari view pages.credit.lists diatur disini
	 */
	private function getCreditLists()
	{
		//1. Parsing status
		$status 									= 'drafting'; 
		if(Input::has('status'))
		{
			$status 								= Input::get('status');
		}

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
		$this->page_datas->credit_filters 			= Credit::statusLists();
	}
}
