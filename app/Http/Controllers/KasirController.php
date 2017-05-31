<?php

namespace App\Http\Controllers;

use TQueries\Kredit\DaftarKreditur;

use Illuminate\Http\Request;
use Exception;

class KasirController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct();
        $this->request      = $request;
    }

    public function billing ()
    {
        $this->page_attributes->title			= "Form Billing";
		$this->page_attributes->breadcrumb		= 	[
														'Billing'   => route('kasir.billing'),
													];
        
        // get list kreditur
        $this->listKreditur();

        $this->view								= view('pages.kasir.billing');

		//function from parent to generate view
		return $this->generateView();
    }

    private function listKreditur ()
    {
        $call                                   = new DaftarKreditur;

        $kreditur 						        = collect($call->get());
        $kreditur 							    = $kreditur->sortBy('nama');
        $kreditur                               = $kreditur->pluck('nama', 'id');
        
        $this->page_datas->kreditur             = $kreditur;
    }

    public function billingStore ()
    {
        
    }

}