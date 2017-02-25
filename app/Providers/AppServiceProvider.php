<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Blade::directive('gender', function ($expression) {
			return "<?php echo ($expression == 'male') ? 'Laki-laki' : 'Perempuan'; ?>";
		});

		Blade::directive('marital', function ($expression) {
            return "<?php echo ($expression == 'single') ? 'Belum Menikah' : 'Menikah'; ?>";
        });
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
}
