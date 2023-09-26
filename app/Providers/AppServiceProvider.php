<?php

namespace App\Providers;

use App\Models\Libros;
use App\Models\Prestamos;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Libros::class , function ($app){
            return new Libros();
        });

        $this->app->bind(Prestamos::class , function ($app){
            return new Prestamos();
        });

        $this->app->bind(User::class , function ($app){
            return new User();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
