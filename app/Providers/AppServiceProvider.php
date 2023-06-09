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
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }

        $this->app->bind(
            \App\Services\Auth\IAuthService::class,
            \App\Services\Auth\SanctumAuthService::class
        );

        $this->app->bind(
            \App\Services\User\IUserService::class,
            \App\Services\User\UserService::class
        );

        $this->app->bind(
            \App\Services\Category\ICategoryService::class,
            \App\Services\Category\CategoryService::class
        );

        $this->app->bind(
            \App\Services\Tag\ITagService::class,
            \App\Services\Tag\TagService::class
        );

        $this->app->bind(
            \App\Services\Product\IProductService::class,
            \App\Services\Product\ProductService::class
        );

        $this->app->bind(
            \App\Services\Discount\IDiscountService::class,
            \App\Services\Discount\DiscountService::class
        );

        $this->app->bind(
            \App\Services\Tax\ITaxService::class,
            \App\Services\Tax\TaxService::class
        );

        $this->app->bind(
            \App\Services\Variation\IVariationService::class,
            \App\Services\Variation\VariationService::class
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
