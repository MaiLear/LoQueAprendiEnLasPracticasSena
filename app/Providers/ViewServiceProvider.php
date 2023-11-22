<?php

namespace App\Providers;

use App\View\Composers\ClientComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::share('saludo','Hola como estas');

        View::composer('customer.*', ClientComposer::class);
    }
}
