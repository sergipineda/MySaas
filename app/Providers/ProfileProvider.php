<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ProfileProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        app::bind(\App\Profile::class, \App\CreadorDePerfilsHTML::class);
        app::bind('\App\Profile::class', 'App\CreadorDePerfilsHTML');
    }
}
