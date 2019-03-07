<?php

namespace Corp\Providers;

use Illuminate\Support\ServiceProvider;

use DB;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::listen(function($query){
            //echo '<h1>' . $query->sql . '</h1>';
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
