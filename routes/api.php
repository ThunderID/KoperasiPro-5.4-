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

Route::group(['middleware' => ['tapi']], function()
{
	// Here lies credit controller all things started here
	Route::get('pengajuan', 	['uses' => 'KreditController@index']);

	Route::post('pengajuan', 	['uses' => 'KreditController@store']);

	Route::post('upload/ktp/{nomor_kredit}', 	['uses' => 'KreditController@upload']);


	Route::post('/login', function () 
	{
		try {
			$credentials 	= Input::only('email', 'password');
			$login 			= TAuth::login($credentials);
		} catch (Exception $e) {
			return \TAPIQueries\UIHelper\JSend::error($e->getMessage())->asArray();
		}

		$returned 		= TAuth::loggedUser();
	
		return \TAPIQueries\UIHelper\JSend::success(['id' => $returned['id'], 'nama' => $returned['nama']])->asArray();
	});

});
