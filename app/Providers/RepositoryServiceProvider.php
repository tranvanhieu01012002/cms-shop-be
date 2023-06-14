<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\User\IUserRepository::class,
            \App\Repositories\User\UserRepository::class,
        );

        $this->app->bind(
            \App\Repositories\Category\ICategoryRepository::class,
            \App\Repositories\Category\CategoryRepository::class
        );

        $this->app->bind(
            \App\Repositories\Media\IMediaRepository::class,
            \App\Repositories\Media\MediaRepository::class,
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
