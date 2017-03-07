<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/check', function () 
{
	$data 	= new Thunderlabid\Application\Services\ReadUserService;

	dd($data->execute(1));
    // return view('welcome');
});

// Here lies credit controller all things started here
Route::group(['middleware' => ['pjax', 'authenticated']], function()
{
	//Menu Kredit
	Route::resource('credit', 'CreditController');

	//Menu Survey
	Route::resource('survey', 'CreditSurveyController');

	//Menu Status Kredit
	Route::any('propose/credit/{id}',		['uses' => 'CreditStatusController@propose', 	'as' => 'credit.propose']);
	
	//Menu Registrasi
	Route::resource('person', 'PersonController');
});

Route::group(['middleware' => ['pjax']], function()
{
	//Menu Login
	Route::get('login', 	['uses' => 'LoginController@index', 		'as' => 'login.index']);
	Route::post('login',	['uses' => 'LoginController@logging', 		'as' => 'login.store']);
	Route::get('logout',	['uses' => 'LoginController@logout', 		'as' => 'login.destroy']);

	//Menu Settings
	//This one to change which office currently active
	Route::get('activate/{idx}', 	['uses' => 'LoginController@activateOffice', 'as' => 'office.activate']);

	//Dashboard page
	Route::get('/', 				['uses' => 'DashboardController@index', 		'as' => 'dashboard.index']);
	
	//Notification page
	Route::get('/notification',		['uses' => 'DashboardController@notification', 	'as' => 'notification.index']);

	//here lies test routes
	Route::get('/index', 	['uses' => 'DashboardController@indextest1', 'as' => 'dashboard.sample.index']);
	Route::get('/index2', 	['uses' => 'DashboardController@indextest2', 'as' => 'dashboard.sample.index2']);
});

Route::any('cities',			['uses' => 'HelperController@getCities', 'as' => 'cities.index']);

// route for print credit
Route::get('credit/print/rencana-kredit/{id}', 	['uses' => 'CreditController@print',			'as' => 'credit.print']);
// route for pdf credit
Route::get('credit/pdf/rencana-kredit/{id}', 	['uses' => 'CreditController@pdf',				'as' => 'credit.pdf']);
