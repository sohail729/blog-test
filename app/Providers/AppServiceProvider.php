<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\Category;

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
        Paginator::useBootstrap();
        View::composer('layouts.front', function ($view) {
            $header = Category::where('in_header', 1)->pluck('title', 'slug')->toArray();
            $footer = Category::where('in_footer', 1)->pluck('title', 'slug')->toArray();
            $view->with(['menu_header' =>  $header, 'menu_footer' =>  $footer]);
        });
    }
}
