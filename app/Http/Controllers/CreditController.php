<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Web\Services\Credit;
use App\Web\Services\Person;
use Input, PDF;

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

		// Paginate
		$this->paginate(route('credit.index'),100,1,10);

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
		// get data province
		$data										= new \App\UI\CountryLists\Model\Province;
		// sort data province by 'province_name'
		$data 										= $data->sortBy('province_name');
		// get all cties
		$cities_all 								= new \App\UI\CountryLists\Model\City;
		// sort cities by 'city_name_full'
		$cities_all									= $cities_all->sortBy('city_name_full');

		// get province first to set list cities
		$province_id 								= $data->first()['province_id'];
		$cities_first								= $data->where('province_id', $province_id)->withCities()->all();
		$cities_first								= $cities_first[0]['cities'];
		$cities_first 								= $cities_first->sortBy('city_name_full');

		$this->page_datas->province 				= $data->pluck('province_name', 'province_id');
		$this->page_datas->cities 					= $cities_first->pluck('city_name_full', 'city_id');
		$this->page_datas->cities_all				= $cities_all->pluck('city_name_full', 'city_id');

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
		//creditor
		$person					= Input::get('person');
		$person['id']			= null;
		$person['works']		= null;
		$person['relatives']	= null;
		$person['phones']		= null;

		//only happen if person id = null
		if(is_null($person['id']))
		{
			$person_service 	= new Person;
			$person_entity		= $person_service->store($person);
	
			//alamat
			$alamat				= Input::get('alamat');
			$alamat['country']	= 'Indonesia';
			$alamat['id']		= null;
			$alamat['latitude']	= null;
			$alamat['longitude']= null;

			$final_entity_person= $person_service->update('alamat', $alamat, $person_entity);
		}

		// warrantor
		$warrantor 				= Input::get('warrantor');
		$warrantor['id']		= null;

		if(is_null($warrantor['id']) && isset($warrantor['name']))
		{
			$warrantor['nik']					= null;
			$warrantor['place_of_birth']		= null;
			$warrantor['date_of_birth']			= null;
			$warrantor['religion']				= null;
			$warrantor['highest_education']		= null;
			$warrantor['marital_status']		= null;
			$warrantor['phones']				= [];
			$warrantor['works']					= [];
			$warrantor['relatives']				= [];

			$warrantor['gender']				= 'male';

			$warrantor_service 	= new Person;
			$warrantor_entity	= $warrantor_service->store($warrantor);
		}
		else
		{
			$warrantor_entity 					= null;
		}


		//credit
		$credit_array			= Input::get('credit');
		$credit_array['id']		= null;

		$credit_array['credit_amount']			= str_replace('IDR', '', str_replace('.', '', $credit_array['credit_amount']));
		$credit_array['installment_capacity']	= str_replace('IDR', '', str_replace('.', '', $credit_array['installment_capacity']));

		$credit_service 		= new Credit;
		$result					= $credit_service->store($credit_array, $person_entity, $warrantor_entity);

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

		// Paginate
		$this->paginate(route('credit.index'),100,1,10);	

		//parsing master data here
		$this->page_datas->credit 					= Credit::findByID($id);
		$this->page_datas->id 						= $id;

		// get active address on person
		$person_id 									= $this->page_datas->credit->credit->creditor->id;
		$this->page_datas->creditor_address_active	= Person::findByID($person_id);

		// check address for warrator (penjamin)
		if (($this->page_datas->credit->credit->warrantor) && !is_null($this->page_datas->credit->credit->warrantor->id))
		{
			$person_id 									= $this->page_datas->credit->credit->warrantor->id;
			$this->page_datas->warrantor_address_active	= Person::findByID($person_id);
			
		}

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
		$status 									= null; 
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

	/**
	 * Fungsi untuk menampilkan halaman rencana kredit yang akan di print
	 */
	public function print($id)
	{
		// set page attributes (please check parent variable)
		$this->page_attributes->title              = "Daftar Kredit";
		$this->page_attributes->breadcrumb         = [
															'Kredit'   => route('credit.index'),
													 ];

		//initialize view
		$this->view                                = view('pages.credit.print');

		//parsing master data here
		$this->page_datas->credit 					= Credit::findByID($id);
		$this->page_datas->id 						= $id;

		// get active address on person
		$person_id 									= $this->page_datas->credit->credit->creditor->id;
		$this->page_datas->creditor_address_active	= Person::findByID($person_id);

		// check address for warrator (penjamin)
		if (($this->page_datas->credit->credit->warrantor))
		{
			$person_id 									= $this->page_datas->credit->credit->warrantor->id;
			$this->page_datas->warrantor_address_active	= Person::findByID($person_id);
			
		}

		//function from parent to generate view
		return $this->generateView();
	}

	/**
	 * fungsi untuk menjadikan pdf form pengajuan credit
	 */
	public function pdf($id)
	{
		// set page attributes (please check parent variable)
		$this->page_attributes->title              = "Daftar Kredit";
		$this->page_attributes->breadcrumb         = [
															'Kredit'   => route('credit.index'),
													 ];

		//initialize view
		$this->view                                = view('pages.credit.print');

		//parsing master data here
		$this->page_datas->credit 					= Credit::findByID($id);
		$this->page_datas->id 						= $id;

		// get active address on person
		$person_id 									= $this->page_datas->credit->credit->creditor->id;
		$this->page_datas->creditor_address_active	= Person::findByID($person_id);

		// check address for warrator (penjamin)
		if (($this->page_datas->credit->credit->warrantor))
		{
			$person_id 									= $this->page_datas->credit->credit->warrantor->id;
			$this->page_datas->warrantor_address_active	= Person::findByID($person_id);
			
		}
		// return view('pages.credit.print', ['page_datas' => $this->page_datas]);
		//function from parent to generate view
		$pdf = PDF::loadView('pages.credit.print', ['page_datas' => $this->page_datas]);
		
		return $pdf->download('pengajuan-kredit.pdf');;
	}
}
