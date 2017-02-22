<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Web\Services\Person;
use Input;

/**
 * Kelas PersonController
 *
 * Digunakan untuk semua data Person.
 *
 * @author     Chelsy M <chelsy@thunderlab.id>
 */
class PersonController extends Controller
{
	/**
	 * Creates construct from controller to get instate some stuffs
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * lihat semua data person
	 *
	 * @return Response
	 */
	public function index()
	{
		// set page attributes (please check parent variable)
		$this->page_attributes->title				= "Data Orang";
		$this->page_attributes->breadcrumb			= [
															'Data Orang'   => route('person.index'),
													 ];

		//this function to set all needed variable in lists person (sidebar)
		$this->getPersonLists();

		//initialize view
		$this->view									= view('pages.person.index');

		//function from parent to generate view
		return $this->generateView();
	}

	/**
	 * lihat data person tertentu
	 *
	 * @param string $id
	 * @return Response
	 */
	public function show($id)
	{
		// set page attributes (please check parent variable)
		$this->page_attributes->title				= "Data Orang";
		$this->page_attributes->breadcrumb         = [
															'Data Orang'   => route('person.index'),
													 ];

		//initialize view
		$this->view                                = view('pages.person.show');

		//this function to set all needed variable in lists credit (sidebar)
		$this->getPersonLists();

		//parsing master data here
		$this->page_datas->person 					= Person::findByID($id);
		$this->page_datas->id 						= $id;

		//function from parent to generate view
		return $this->generateView();
	}

	/**
	 * simpan data Person tertentu
	 *
	 * @param string $id
	 * @return Response
	 */
	public function store($id = null)
	{
		$id 					= '3B14A88B-158A-4AD0-93F5-D7623EA9BC57';

		if(is_null($id))
		{
			$data_person 		= Input::all();
			$data_person['id']	= null;

			$person 			= Person::store($data_person);
		}
		else
		{
			$person_whole 		= Person::findByID($id);
			$person 			= $person_whole->person;
		}

		$alamat 				= Input::get('alamat');

		$service 				= new Person;
		$service->update('alamat', $alamat, $person);

		//function from parent to redirecting
		return $this->generateRedirect(route('person.index'));
	}


	/**
	 * Fungsi ini untuk menampilkan person lists, fungsi sidebar.
	 * variable filter dan search juga di parse disini
	 * data dari view pages.address.lists diatur disini
	 */
	private function getPersonLists()
	{
		//1. Parsing search box
		if(Input::has('q') && str_is($status, 'rumah'))
		{
			$this->page_datas->persons			= Person::findByName(Input::get('q'));
		}
		else
		{
			$this->page_datas->persons			= Person::all();
		}
	}
}

