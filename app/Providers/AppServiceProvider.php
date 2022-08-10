<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        //Laravel incluye vistas de paginación creadas con Bootstrap CSS .
        //Para usar estas vistas en lugar de las vistas predeterminadas de Tailwind,
        //puede llamar al método del paginador useBootstrapdentro del bootmétodo
        //de su App\Providers\AppServiceProviderclase
        Paginator::useBootstrap();
    }
}
