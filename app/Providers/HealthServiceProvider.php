<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Spatie\Health\Facades\Health;
use Spatie\Health\Checks\Checks\CacheCheck;
use Spatie\CpuLoadHealthCheck\CpuLoadCheck;

class HealthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {


        Health::checks([
            CacheCheck::new(),
            CpuLoadCheck::new()
                ->failWhenLoadIsHigherInTheLast5Minutes(2.0)
                ->failWhenLoadIsHigherInTheLast15Minutes(1.5),
        ]);
    }
}