<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()    {

        // Swagger
        $this->app->bind(
            'Illuminate\Contracts\Auth\Registrar',
            'App\Services\Registrar'
        );

        //Register Swagger Provider
        $this->app->register('Darkaonline\L5Swagger\L5SwaggerServiceProvider');
    }
}
