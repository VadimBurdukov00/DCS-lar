<?php

namespace App\Providers;

use App\Models\Doer;
use App\Observers\DoerObserver;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Doer::observe(DoerObserver::class);
    }
}
