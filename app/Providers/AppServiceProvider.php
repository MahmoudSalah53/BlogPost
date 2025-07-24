<?php

namespace App\Providers;

use App\Observers\SubscriptionObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Models\Subscription;

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
            return Auth::check() && Auth::user()->role === 'author';
        });

        Subscription::observe(SubscriptionObserver::class);
    }
}
