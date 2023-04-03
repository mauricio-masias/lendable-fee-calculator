<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\FeeBreakpointStaticRepository;

class FeeBreakpointsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(FeeBreakpointStaticRepository::class, function(Application $app) {
            return (new FeeBreakpointStaticRepository())->getBreakpoints();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }
}
