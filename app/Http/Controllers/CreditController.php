<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Kelas CreditController
 *
 * Digunakan untuk semua data Credit.
 *
 * @author     C Mooy <chelsymooy1108@gmail.com>
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
    	$this->page_attributes->title              = "Daftar Kredit";
        $this->page_attributes->breadcrumb         = [
                                                            'Kredit'   => route('credit.index'),
                                                     ];

        //initialize view
        $this->view                                = view('pages.credit.index');

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

        //store all data that shaped an entity
        $tcredit    = \App\Web\Services\Credit::save($person, $finance, $asset, $credit);

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
        $this->view                                = view('pages.credit.show', compact('id'));

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
        $credit    = \App\Web\Services\Credit::delete($id);

        //function from parent to redirecting
        return $this->generateRedirect(route('credit.index'));
    }
}
