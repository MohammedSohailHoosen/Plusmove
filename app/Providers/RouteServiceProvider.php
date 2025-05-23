<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->routes(function () {
            // API routes with 'api' middleware and '/api' prefix
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Web routes with 'web' middleware
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    protected function mapApiRoutes()
{
    Route::prefix('api')
         ->middleware('api')
         ->group(base_path('routes/api.php'));
}

}
