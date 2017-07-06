<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Pagination\LengthAwarePaginator;

use Redirect, Request, View, TAuth, Route;

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

	protected function setGlobal()
	{
		$this->acl_active_office 		= TAuth::activeOffice();
		$this->acl_logged_user 			= TAuth::loggedUser();

		define('acl_active_office', $this->acl_active_office);
		define('acl_logged_user', $this->acl_logged_user);

		View::share('acl_active_office', $this->acl_active_office);
		View::share('acl_logged_user', $this->acl_logged_user);

	}
	public function generateView()
	{
		return $this->view
            ->with('page_attributes', $this->page_attributes)
			->with('page_datas', $this->page_datas)
			;
	} 

	public function generateRedirect($route_to){

		if(isset($this->page_attributes->msg['error'])){
			// return Redirect::back()
			return Redirect::to($route_to)
					->withInput(Request::all())
					->with('msg', ['danger' => $this->page_attributes->msg['error']])
					;
		}

		if(isset($this->page_attributes->msg['warning'])){
			return Redirect::to($route_to)
					->with('msg', $this->page_attributes->msg)
					;
		}

		if(isset($this->page_attributes->msg['info'])){
			return Redirect::to($route_to)
					->with('msg', $this->page_attributes->msg)
					;
		}

		if(isset($this->page_attributes->msg['success'])){
			return Redirect::to($route_to)
					->with('msg', $this->page_attributes->msg)
					;
		}

		// no message
		return Redirect::to($route_to);
	} 

	//pagination
	public function paginate($route = null, $count = null, $current = null, $take = 15)
		{
			//README
			//$route : route current page. $route = route('admin.product.index')
			//$count : number of data. $count = count($data)
			//$current : current page. $current = input::get($page)

			$this->page_attributes->paging = new LengthAwarePaginator($count, $count, $take, $current);
		    $this->page_attributes->paging->setPath($route);
		}		
}
