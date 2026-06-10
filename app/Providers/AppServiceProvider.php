<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS pada environment production
        // Memastikan seluruh URL yang dihasilkan Laravel (route, asset, url helper, redirect)
        // menggunakan protokol HTTPS secara konsisten untuk mencegah mixed content warning
        // dan browser security warning pada form POST login
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
