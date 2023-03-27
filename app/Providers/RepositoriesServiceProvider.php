<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Contracts\DepartmentInterface',
            'App\Repositories\DepartmentRepository'
        );

        $this->app->bind(
            'App\Contracts\ArticlesInterface',
            'App\Repositories\ArticleRepository'
        );

        $this->app->bind(
            'App\Contracts\UserInterface',
            'App\Repositories\UserRepository'
        );

        $this->app->bind(
            'App\Contracts\OrderInterface',
            'App\Repositories\OrderRepository'
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
