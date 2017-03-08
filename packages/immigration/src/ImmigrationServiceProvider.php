<?php

namespace Thunderlabid\Immigration;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ImmigrationServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Validator::extend('extension', '\Thunderlabid\Immigration\Policies\Extension@validate');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}
}