<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\IsAdmin;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('admin.middleware', function ($app) {
            return new AdminMiddleware();
        });

        $this->app->singleton('isadmin.middleware', function ($app) {
            return new IsAdmin();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::aliasMiddleware('admin', AdminMiddleware::class);
        Route::aliasMiddleware('isadmin', IsAdmin::class);
    }
}
