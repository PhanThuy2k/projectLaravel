<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Paginator 
use Illuminate\pagination\paginator;
// use cart
use App\Helper\Cart;
// view shase
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
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

        // chia sẻ biến cho toàn bộ trang(// view shase)
        View::composer('*', function ($view) {
            // $view->with(compact('cart'));
            $view->with('cart', new Cart());
        });
        

        View()->composer('*', function ($view) {
            $categoryNew = Category::get();
            $view->with(compact('categoryNew'));
        });

        View()->composer('*', function ($view) {
            $userNew = User::get();
            $view->with(compact('userNew'));
        });
        
    }
}
