<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Web\Services\AddressBook as Address;
use App\Web\Services\Person;
use Input;

/**
 * Kelas AddressController
 *
 * Digunakan untuk semua data Address.
 *
 * @author     Agil M <agil@thunderlab.id>
 */
class AddressController extends Controller
{
	/**
	 * Creates construct from controller to get instate some stuffs
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * lihat semua data Address
	 *
	 * @return Response
	 */
	public function index()
	{
		// set page attributes (please check parent variable)
		$this->page_attributes->title				= "Buku Alamat";
		$this->page_attributes->breadcrumb			= [
															'Alamat'   => route('address.index'),
													 ];

		//this function to set all needed variable in lists Address (sidebar)
		$this->getAddressLists();

		//initialize view
		$this->view									= view('pages.address.index');

		//function from parent to generate view
		return $this->generateView();
	}

	/**
	 * lihat data Address tertentu
	 *
	 * @param string $id
	 * @return Response
	 */
	public function show($id)
	{
		// set page attributes (please check parent variable)
		$this->page_attributes->title              = "Daftar Kredit";
		$this->page_attributes->breadcrumb         = [
															'Kredit'   => route('address.index'),
													 ];

		//initialize view
		$this->view                                = view('pages.Address.show');

		//this function to set all needed variable in lists Address (sidebar)
		$this->getAddressLists();

		//parsing master data here
		$this->page_datas->Address 					= Address::findByID($id);

		//function from parent to generate view
		return $this->generateView();
	}

	/**
	 * Fungsi ini untuk menampilkan Address lists, fungsi sidebar.
	 * variable filter dan search juga di parse disini
	 * data dari view pages.Address.lists diatur disini
	 */
	private function getAddressLists()
	{
		//1. Parsing status
		$status 									= 'rumah'; 
		if(Input::has('status'))
		{
			$status 								= Input::get('status');
		}

		$this->page_datas->address					= null;

		//2. Parsing search box
		if(Input::has('q') && str_is($status, 'rumah'))
		{
			$this->page_datas->persons			= Person::findByName(Input::get('q'));
		}
		elseif(str_is($status, 'rumah'))
		{
			$this->page_datas->persons			= Person::all();
		}
		else
		{
			$this->page_datas->persons			= null;
		}

		if(Input::has('id'))
		{
			$this->page_datas->address				= Address::findByOwnerID($status, Input::get('id'));
		}

		//3. Memanggil fungsi filter active
		$this->page_datas->person_filters 			= Address::addressLists();
	}
}
