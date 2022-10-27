<?php

namespace App\Providers;

use App\Services\FHRS\Service;
use Illuminate\Support\ServiceProvider;

class FHRSServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Service::class, function ($app) {
            return new Service(baseUri: config('services.fhrs.baseuri'), timeout: config('services.fhrs.timeout'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
