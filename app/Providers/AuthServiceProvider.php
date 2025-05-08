<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User; // Pastikan ini di-import

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // Jika Anda membuat kebijakan untuk Model spesifik (seperti AssetPolicy, CategoryPolicy), daftarkan di sini
        // Contoh: App\Models\Asset::class => App\Policies\AssetPolicy::class,
        // App\Models\Category::class => App\Policies\CategoryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies(); // Baris ini yang tadinya error karena dicari di AppServiceProvider

        // Definisikan Gate 'manage-assets'
        Gate::define('manage-assets', function (User $user) {
            // Kita cek apakah user memiliki kolom is_admin dan nilainya true
            return $user->is_admin ?? false; // Tambahkan ?? false untuk menghindari error jika kolom is_admin somehow missing
        });

         // Definisikan Gate 'manage-categories'
        Gate::define('manage-categories', function (User $user) {
             // Kita cek apakah user memiliki kolom is_admin dan nilainya true
            return $user->is_admin ?? false;
        });

        // ... Tambahkan definisi Gates atau Policies lain di sini jika ada
    }
}