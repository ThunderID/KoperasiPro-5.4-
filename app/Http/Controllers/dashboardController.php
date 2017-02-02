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
}
