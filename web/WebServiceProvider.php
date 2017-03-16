<?php

namespace Thunderlabid\Application;

use Illuminate\Support\ServiceProvider;

class WebServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
		$this->app->bind('TAuth', 'Thunderlabid\Application\Queries\ACL\SessionBasedAuthenticator');
	}
}
