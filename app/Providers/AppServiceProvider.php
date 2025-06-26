<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use livewire\Livewire;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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
         Livewire::setScriptRoute(function ($handle) {
            return Route::get('/chat/public/livewire/livewire.js', $handle);
        });

        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/chat/public/livewire/update', $handle);
        });
    }

}
