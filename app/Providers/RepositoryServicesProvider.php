<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\CompanyInterface',
            'App\Http\Repositories\CompanyRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\EmployeeInterface',
            'App\Http\Repositories\EmployeeRepository'
        );



        // Api ////////////////////////

        $this->app->bind(
            'App\Http\Interfaces\Api\AuthInterface',
            'App\Http\Repositories\Api\AuthRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\Api\EmployeeInterface',
            'App\Http\Repositories\Api\EmployeeRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\Api\CompanyInterface',
            'App\Http\Repositories\Api\CompanyRepository'
        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
