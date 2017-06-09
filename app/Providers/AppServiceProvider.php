<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
//        Response::macro('caps', function ($value) {
//            return response(strtoupper($value));
//        });

        //做一次过滤
        View::share('key', 'value');

        View::composer('layouts/app', function ( $view) {
            //
            $view->with('count',12);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
