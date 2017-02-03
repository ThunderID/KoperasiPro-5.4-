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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', ['uses' => 'dashboardController@index', 'as' => 'dashboard.index']);

Route::get('/store', ['uses' => 'dashboardController@store', 'as' => 'dashboard.store']);
