<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Paginator
use Illuminate\pagination\paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // phan trang 
        Paginator::useBootstrap();
    }
}
