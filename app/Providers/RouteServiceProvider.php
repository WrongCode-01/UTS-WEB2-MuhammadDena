<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel's authentication scaffolding to redirect users after login.
     *
     * @var string
     */
    // Ini konstanta HOME yang digunakan di RegisterController dan LoginController
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        // Konfigurasi rate limiting untuk API (opsional, tapi bawaan Laravel)
        $this->configureRateLimiting();

        // Memuat file-file route
        $this->routes(function () {
            // Route API: Diberi prefix '/api' dan middleware 'api'
            // Route::prefix('api')
            //     ->middleware('api')
            //     ->group(base_path('routes/api.php'));

            // Route Web: Diberi middleware 'web'
            // File web.php berisi route-route utama aplikasi web Anda
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        // Contoh rate limit untuk API per menit
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        // Anda bisa menambahkan rate limit lain di sini jika diperlukan
    }
}