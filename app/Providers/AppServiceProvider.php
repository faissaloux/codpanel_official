<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\System\Load;




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
        



      //  dd(Load::cities());
     //  dd(\Hash::make('1234'));

    }
}
