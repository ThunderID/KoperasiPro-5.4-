<?php

namespace Thunderlabid\Notification;

use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishMigrations();

        $this->publishViews();

        $this->publishRoutes();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
         $this->app->bind('Notification', 'Thunderlabid\Notification\Service\Notification' );
    }

    public function publishMigrations()
    {
        $path       = $this->getMigrationsPath();
        $this->publishes([$path => database_path('migrations')], 'migrations');
    }

    public function publishViews()
    {
        $this->loadViewsFrom(__DIR__.'/Web/views', 'notification');

        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/vendor/notification'),
        ]);
    }

    public function publishRoutes()
    {
        $this->loadRoutesFrom(__DIR__.'/Web/routes.php');
    }

    private function getMigrationsPath()
    {
        return __DIR__ . '/database/migrations/';
    }
}
