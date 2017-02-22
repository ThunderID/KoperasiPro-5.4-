<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
	// Construct
    public function __construct()
    {
        parent::__construct();
    }

	/**
	 * lihat index
	 *
	 * @return Response
	 */
	public function index()
	{
		// set page attributes (please check parent variable)
		$this->page_attributes->title		= "Dashboard";

		//initialize view
		$this->view							= view('pages.dashboard.index');

		//function from parent to generate view
		return $this->generateView();
	}

	/**
	 * lihat notification
	 *
	 * @return Response
	 */
	public function notification()
	{
		// set page attributes (please check parent variable)
		$this->page_attributes->title		= "Notifikasi";

		//initialize view
		$this->view							= view('pages.dashboard.notification');

		//function from parent to generate view
		return $this->generateView();
	}

	public function indextest1(){
		// init page attributes
		$this->page_attributes->title              = "Dashboard";
		$this->page_attributes->breadcrumb         = [
															'one'   => '#',
															'two'   => '#',
															'three' => null,
													 ];

		$this->view                                = View('pages.index');

		return $this->generateView();
	}

	public function indextest2(){
		// init page attributes
		$this->page_attributes->title              = "Daftar Kredit";
		$this->page_attributes->breadcrumb         = [
															'one'   => '#',
															'two'   => '#',
															'three' => null,
													 ];

		$this->view                                = View('pages.index2');

		return $this->generateView();
	}    

	public function store(Request $request){
		$this->page_attributes->msg['error']       = ['hai','halo2', 'haloooooooo!!!'];
		return $this->generateRedirect(route('dashboard.index'));
	}
}
