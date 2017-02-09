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

    public function index(){
    	// init page attributes
    	$this->page_attributes->title              = "Pengajuan Kredit Baru";
        $this->page_attributes->breadcrumb         = [
                                                            'one'   => '#',
                                                            'two'   => '#',
                                                            'three' => null,
                                                     ];

        $this->view                                = View('pages.index');

        return $this->generateView();
    }

    public function index2(){
        // init page attributes
        $this->page_attributes->title              = "Pengajuan Kredit lama";
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
