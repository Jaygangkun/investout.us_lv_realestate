<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class viewComposer extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using Closure based composers...
        // if (auth()->check()) {
        View::composer('*', function ($view) {
            $view->with('user', auth()->user());
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
