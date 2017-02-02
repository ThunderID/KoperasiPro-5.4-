<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	//public page data
	protected $page_attributes;
	protected $page_datas;

	function __construct() 
	{
		$this->page_attributes 			= new \Stdclass;
		$this->page_datas 				= new \Stdclass;
	}   

	public function generateView(){
		return $this->view
            ->with('page_attributes', $this->page_attributes)
			->with('page_datas', $this->page_attributes)
			;
	} 
}
