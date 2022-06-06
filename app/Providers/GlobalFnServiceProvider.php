<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GlobalFnServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach (glob(app_path('GlobalFn') . '/*.php') as $file) {
            require_once $file;
        }
    }
}
