<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\View;
use App\Models\Category;


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
        });
    }
}
