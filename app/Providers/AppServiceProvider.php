<?php

namespace App\Providers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Cart;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->composeHeader();
    }
    public function composeHeader()
    {
        View::composer(['components.header', 'product.index'], function ($view) {
            $categories = Category::where('c_active', Category::STATUS_PUBLIC)->get();
            $view->with('categories', $categories);
            $cartItemCount = 0;
            if (Auth::check()) {

                $cartItemCount = Cart::where('id_account', Auth::user()->id)->count();
              
            }
            $view->with('cartItemCount', $cartItemCount);
        });
    }
}
