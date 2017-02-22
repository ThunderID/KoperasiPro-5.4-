<?php

Route::group(['namespace' => 'Thunderlabid\\Credit\\Web\\Controllers'], function () 
{
	// Route::resource('asset', 	'AssetController');
	// Route::resource('finance', 	'FinanceController');
	// Route::resource('credit', 	'CreditController');
	Route::resource('collateral', 	'CollateralController');
});