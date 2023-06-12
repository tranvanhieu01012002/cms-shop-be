<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Services\Auth\IAuthService::class,
            \App\Services\Auth\SanctumAuthService::class
        );

        $this->app->bind(
            \App\Services\User\IUserService::class,
            \App\Services\User\UserService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
