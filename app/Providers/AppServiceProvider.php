<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register (): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot (): void
    {
        // add author directive
        Blade::if('author', function () {
            return auth()->check() && auth()->user()->role->value === 'author';
        });
    }
}
