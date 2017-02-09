<?php

namespace App\Web;

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
         $this->app->bind('TCredit', 'App\Web\Services\Credit' );
         $this->app->bind('TNavbar', 'App\Web\Services\Navbar' );
    }
}
