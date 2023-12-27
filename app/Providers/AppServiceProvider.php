<?php

namespace App\Providers;

use App\Services\BestSellingProductsService;
use App\Services\CategoriesService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BestSellingProductsService::class, function ($app) {
            return new BestSellingProductsService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $bestSellingProductsService = new BestSellingProductsService();
        $bestSellingProducts = $bestSellingProductsService->getBestSellingProducts();



    // Deljenje podataka sa svim Blade-ovima putem Composer-a
    View::composer('*', function ($view) use ($bestSellingProducts) {
        $view->with('bestSellingProducts', $bestSellingProducts);
    });
    }
}
