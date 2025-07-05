<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

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
        /**
         * Konstanta HOME untuk redirect setelah login/register
         */
        if (!defined('HOME')) {
            define('HOME', '/dashboard');
        }
    }
}
