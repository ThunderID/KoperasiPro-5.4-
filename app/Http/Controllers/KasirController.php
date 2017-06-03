<?php

namespace App\Http\Controllers;

use TQueries\Kredit\DaftarKreditur;


Header Transaksi
use App\Domain\Kasir\Models\DetailTransaksi;
use App\Domain\Kasir\Models\HeaderTransaksi;

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
        try{
            // init
            $DetailTransaksi                    = new DetailTransaksi;
            $HeaderTransaksi                    = new HeaderTransaksi;

            // parase inputs
            $input                              = Input::all();

            // validate inputs

            // save inputs


        }catch (Exception $e){
            if (is_array($e->getMessage()))
            {
                $this->page_attributes->msg['error']    = $e->getMessage();
            }
            else
            {
                $this->page_attributes->msg['error']    = [$e->getMessage()];
            }
        
            return $this->generateRedirect(route('kasir.billing'));
        }

    }

}