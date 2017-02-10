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

Route::get('/', function () 
{
    return view('welcome');
});

Route::get('/login', function () 
{
    return view('pages.uac.login');
});

// Here lies credit controller all things started here
Route::group(['middleware' => 'pjax'], function()
{
	Route::resource('credit', 'CreditController');

});

//here lies test routes
Route::group(['middleware' => 'pjax'], function(){
	Route::get('/index', ['uses' => 'dashboardController@index', 'as' => 'dashboard.index']);
	Route::get('/index2', ['uses' => 'dashboardController@index2', 'as' => 'dashboard.index2']);
});
