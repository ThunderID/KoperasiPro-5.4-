<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class kreditController extends Controller
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

        $this->view                                = View('pages.kredit.permohonan_kredit');

        return $this->generateView();
    }

    public function store(Request $request){
        $this->page_attributes->msg['error']       = ['hai','halo2', 'haloooooooo!!!'];
        return $this->generateRedirect(route('dashboard.index'));
    }
}
