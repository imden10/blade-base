<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->includeHelpers();
    }

    /**
     * Include helper functions
     *
     * @return void
     */
    protected function includeHelpers(): void
    {
        foreach (glob(__DIR__ . '/../Helpers/*.php') as $file) {
            require_once $file;
        }
    }
}
