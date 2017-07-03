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
	Route::get('/pengaturan', function (Request $request) 
	{
		if($request->has('referensi'))
		{
			return \App\Service\Helpers\API\JSend::success(['minimum_pengajuan' => 2500000, 'minimum_shgb' => Carbon\Carbon::now()->format('Y'), 'remain_pengajuan' => 1])->asArray();
		}

		$mobile_id  = $request->get('id');

		$total 		= \App\Domain\Pengajuan\Models\Pengajuan::whereHas('hp', function($q)use($mobile_id){$q->where('mobile_id', $mobile_id)})->status('pengajuan')->count();

		return \App\Service\Helpers\API\JSend::success(['minimum_pengajuan' => 2500000, 'minimum_shgb' => Carbon\Carbon::now()->format('Y'), 'remain_pengajuan' => (3 - $total)])->asArray();
	});

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
			return \App\Service\Helpers\API\JSend::error($e->getMessage())->asArray();
		}

		$returned 		= TAuth::loggedUser();
	
		return \App\Service\Helpers\API\JSend::success(['id' => $returned['id'], 'nama' => $returned['nama']])->asArray();
	});

});
