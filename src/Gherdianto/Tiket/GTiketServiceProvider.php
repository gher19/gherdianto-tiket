<?php

namespace Gherdianto\Tiket;

use Illuminate\Support\ServiceProvider;

class GTiketServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes(array(
            __DIR__.'/../../config/config.php' => config_path('gtiket.php')
        ));

        include __DIR__.'/Routes/routes.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'gtiket');

        $this->app->singleton('gtiket', function ($app) {
            return new GTiket($app['config']->get('gtiket'));
        });

        $this->app->alias('gtiket', 'Gherdianto\Tiket\GTiket');
    }
}
