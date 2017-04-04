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
Route::get('/test', function () 
{

});

//Menu Login
Route::get('/',			['uses'	=> 'LoginController@index',			'as' => 'index']);
Route::get('login', 	['uses' => 'LoginController@index', 		'as' => 'login.index']);
Route::post('login',	['uses' => 'LoginController@logging', 		'as' => 'login.store']);
Route::get('logout',	['uses' => 'LoginController@logout', 		'as' => 'login.destroy']);

// Here lies credit controller all things started here
Route::group(['middleware' => ['pjax', 'authenticated']], function()
{
	//Menu Kredit
	Route::resource('credit', 'KreditController');

	//Menu Status Kredit
	Route::any('kredit/{id}/{status}',		['uses' => 'KreditController@status', 	'as' => 'credit.status']);
	
	//Menu jaminan
	Route::any('hapus/jaminan/kendaraan/{kredit_id}/{nomor_bpkb}',	['uses' => 'Kredit\JaminanKendaraanController@destroy', 	'as' => 'jaminan.kendaraan.destroy']);
	Route::any('hapus/jaminan/tanah/bangunan/{kredit_id}/{nomor_sertifikat}',	['uses' => 'Kredit\JaminanTanahBangunanController@destroy', 	'as' => 'jaminan.tanah.bangunan.destroy']);

	// route for print kredit
	Route::get('print/kredit/{mode}/{id}', 	['uses' => 'KreditController@prints',	'as' => 'credit.print']);
	
	//SEEMS NO USE
	// route for pdf kredit
	Route::get('kredit/pdf/rencana-kredit/{id}', 	['uses' => 'CreditController@pdf',				'as' => 'credit.pdf']);

});


Route::group(['middleware' => ['pjax', 'authenticated']], function()
{

	//Menu Settings
	//This one to change which office currently active
	Route::get('activate/{idx}', 				['uses' => 'LoginController@activateOffice', 	'as' => 'office.activate']);

	//Dashboard page
	Route::get('/dashboard', 					['uses' => 'DashboardController@index', 		'as' => 'dashboard.index']);
	
	//Notification page
	Route::get('/notification',					['uses' => 'DashboardController@notification', 	'as' => 'notification.index']);

	//here lies test routes
	Route::get('/index', 						['uses' => 'DashboardController@indextest1', 	'as' => 'dashboard.sample.index']);
	Route::get('/index2', 						['uses' => 'DashboardController@indextest2', 	'as' => 'dashboard.sample.index2']);
});

// route to get json from helper for get address to select2
Route::any('regensi',							['uses' => 'HelperController@getRegensi', 		'as' => 'regensi.index']);
Route::any('distrik',							['uses'	=> 'HelperController@getDistrik',		'as' => 'distrik.index']);
Route::any('desa',								['uses' => 'HelperController@getDesa',			'as' => 'desa.index']);

// route to get daftar nik from daftar kreditur
Route::any('daftar/kreditur',					['uses' => 'HelperController@getDaftarKreditur', 'as' => 'get.kreditur.index']);

// Route::get('daftar/kreditur', function() {
// 	$data = new Thunderlabid\Web\Queries\Credit\DaftarKreditur;

// 	dd($data->get(['nik' => '35-73-03-478656-0003']));
// });