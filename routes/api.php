<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('pengajuan', 	['uses' => 'KreditController@index']);

Route::post('pengajuan', 	['uses' => 'KreditController@store']);


// Route::middleware('tapi')->post('/pengajuan', function (Request $request) 
// {
// 	return $request->input('pengajuan_kredit');
// });
