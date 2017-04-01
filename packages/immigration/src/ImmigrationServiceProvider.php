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
		$this->publishMigrations();
	}
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	public function publishMigrations()
	{
		$path       = $this->getMigrationsPath();
		$this->publishes([$path => database_path('migrations')], 'migrations');
	}
	
	private function getMigrationsPath()
	{
		return __DIR__ . '/Databases/Migrations/';
	}
}