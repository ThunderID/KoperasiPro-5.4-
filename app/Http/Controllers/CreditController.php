<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Web\Services\Credit;
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
		$this->page_attributes->title              = "Kredit Baru";
		$this->page_attributes->breadcrumb         = [
															'Kredit'   => route('credit.create'),
													 ];

		//initialize view
		$this->view                                = view('pages.credit.create');

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
		//get input
		$person     = Input::only('person');
		$finance    = Input::only('finance');
		$asset      = Input::only('asset');
		$credit     = Input::only('credit');


		//here
		$person  =   [
				'id'					=> '1280651E-D780-48C6-8857-68A401F7D901',
				'nik'					=> '123456789',
				'name'					=> 'Annita Li',
				'place_of_birth'		=> 'Dili',
				'date_of_birth'			=> '23 years ago',
				'gender'				=> 'female',
				'religion'				=> 'Christian',
				'highest_education'		=> 'Bachelor',
				'marital_status'		=> 'single',
				'phone_number'			=> '089654562911',
				'works'					=> [
					[
						'position' 		=> 'Web Developer', 
						'area' 			=> 'IT', 
						'since' 		=> '3 years ago', 
						'office' 		=> ['id' => '589d9c415590a800073cd078', 'name' => 'Thunderlab Indonesia'], 
					]
				],
				'relatives'					=> [
					[
						'relation' 		=> 'ibu', 
						'id' 			=> '897daec75590a8000818784e', 
						'name' 			=> 'Lolita Li', 
					]
				],
			];


		$credit  =   [
				'id'					=> 'ECAECC9D-CD14-4CBE-A2CF-2510EDB7472B',
				// 'creditor'				=> [
				// 	'id'				=> '1280651E-D780-48C6-8857-68A401F7D901',
				// 	'name'				=> 'Annita L',
				// ],
				'credit_amount'			=> 9500000,
				'installment'			=> 500000,
				'period'				=> 18,
				'purpose'				=> 'Modal usaha',
				'warrantor'				=> [
					'id'				=> '897daec75590a8000818784e',
					'name'				=> 'Lolita L',
				],
				'collaterals'			=> [
					[
						'type' 				=> 'motor', 
						'legal' 			=> 'bpkb', 
						'ownership_status' 	=> 'milik_pribadi', 
					]
				],
				'office'				=> [
					'id'				=> '123445667879',
					'name'				=> 'ThunderlabIndonesia',
				],
				'statuses'				=> [
					[
						'status' 		=> 'pending', 
						'description' 	=> 'Menunggu notifikasi', 
						'date'		 	=> 'today', 
						'author'		=> ['id' => '123456789', 'name' => 'Yuyu Soleha', 'role' => 'Marketing'], 
					]
				],
			];

			$finance  =   [
				'id'					=> null,
				// 'owner'					=> [
				// 	'id'				=> '1280651E-D780-48C6-8857-68A401F7D901',
				// 	'name'				=> 'Annita Li',
				// ],
				'finances'				=> [
					[
						'type' 				=> 'in', 
						'description' 		=> 'pokok', 
						'amount' 			=> 5000000, 
					],
					[
						'type' 				=> 'out', 
						'description' 		=> 'cicilan rumah', 
						'amount' 			=> 2000000, 
					],
					[
						'type' 				=> 'out', 
						'description' 		=> 'pengeluaran rutin', 
						'amount' 			=> 1000000, 
					]
				],
			];

			$asset  =   [
				'id'					=> '1280651E-D780-48C6-8857-68A401F7D901',
				// 'owner'					=> [
				// 	'id'				=> '123456789',
				// 	'name'				=> 'C Mooy',
				// ],
				'assets'				=> [
					[
						'type' 				=> 'rumah', 
						'ownership_status' 	=> 'milik_pribadi', 
						'since' 			=> '1 year ago', 
					],
					[
						'type' 				=> 'motor', 
						'ownership_status' 	=> 'milik_pribadi', 
						'since' 			=> '1 year ago', 
					],
					[
						'type' 				=> 'usaha', 
						'ownership_status' 	=> 'bagi_hasil', 
						'since' 			=> '1 year ago', 
					]
				],
			];

		//store all data that shaped an entity
		$tcredit    = Credit::save($person, $finance, $asset, $credit);

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
