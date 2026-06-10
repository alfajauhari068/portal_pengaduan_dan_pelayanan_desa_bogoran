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
        // ============================================================================
        // KONFIGURASI HTTPS UNTUK PRODUCTION - MENCEGAH MIXED CONTENT WARNING
        // ============================================================================
        // 
        // PROBLEM: Website di-deploy dengan HTTPS tapi asset dimuat via HTTP
        // IMPACT: Browser warning "Mixed Content" pada login admin
        // SOLUTION: Force HTTPS untuk semua URL generation di production
        //
        // Perhatian: Pastikan APP_URL di Railway di-set dengan HTTPS, contoh:
        // APP_URL=https://portalpengaduandanpelayanandesabogoran-production.up.railway.app
        //
        if ($this->app->environment('production')) {
            // Force HTTPS untuk semua URL yang dihasilkan oleh helper: 
            // route(), url(), asset(), secure_asset(), Storage::url(), dll
            URL::forceScheme('https');
            
            // PENTING: Verifikasi APP_URL di environment production sudah HTTPS
            // Jika APP_URL tidak di-set atau menggunakan HTTP, ini akan menjadi masalah
            $appUrl = config('app.url');
            if ($appUrl && !str_starts_with($appUrl, 'https://')) {
                \Log::warning(
                    'Mixed Content Risk: APP_URL tidak menggunakan HTTPS',
                    ['APP_URL' => $appUrl, 'environment' => $this->app->environment()]
                );
            }
        }
    }
}
