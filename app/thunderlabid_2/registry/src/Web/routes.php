<?php

Route::group(['namespace' => 'Thunderlabid\\Registry\\Web\\Controllers'], function () 
{
	Route::resource('person', 	'PersonController');
	// Route::resource('address', 	'AddressController');
	Route::resource('user', 		'UserController');
	Route::resource('personality', 	'PersonalityController');
});