<?php

namespace Thunder\Procitind;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
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
		$this->app->bind('Procitind', 'Thunderlabid\Procitind\Procitind');
	}
}
