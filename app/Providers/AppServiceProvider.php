<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

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
        Schema::defaultStringLength(191);
        //If user belongs to an organization
        Blade::if('bto', function () {
            return auth()->user() && auth()->user()->belongsToOrganization();
        });
        Blade::if('user',function(){
            return auth()->user() && auth()->user()->isUser();
        });


    }
}
