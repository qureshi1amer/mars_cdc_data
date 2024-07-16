<?php

namespace App\Providers;

use App\Repositories\CdcDataRepository;
use App\Services\CdcDataFetcher;
use App\Services\CdcDataParser;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CdcDataFetcher::class, function ($app) {
            return new CdcDataFetcher();
        });

        $this->app->singleton(CdcDataParser::class, function ($app) {
            return new CdcDataParser();
        });

        $this->app->singleton(CdcDataRepository::class, function ($app) {
            return new CdcDataRepository(new CdcDataParser());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
