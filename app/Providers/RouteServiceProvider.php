<?php

use Illuminate\Support\Facades\Route; // Add this at top if missing

class RouteServiceProvider extends ServiceProvider
{
public function boot()
{
    $this->routes(function () {
        Route::prefix('api')
            ->middleware('api')
            ->group(base_path('routes/api.php'));

        Route::middleware('web')
            ->group(base_path('routes/web.php'));
    });
}
}
