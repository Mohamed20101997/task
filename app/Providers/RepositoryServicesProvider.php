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
            'App\Http\Interfaces\AuthInterface',
            'App\Http\Repositories\AuthRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\ArticleInterface',
            'App\Http\Repositories\ArticleRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\CategoryInterface',
            'App\Http\Repositories\CategoryRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\TagInterface',
            'App\Http\Repositories\TagRepository'
        );

        //for EndUser
      $this->app->bind(
            'App\Http\Interfaces\FrontInterface',
            'App\Http\Repositories\FrontRepository'
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
