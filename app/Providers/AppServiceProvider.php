<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use BezhanSalleh\PanelSwitch\PanelSwitch;
use Illuminate\Support\Facades\Auth;

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
        //
        PanelSwitch::configureUsing(function (PanelSwitch $panelSwitch) {
            // Custom configurations go here
            $panelSwitch
                ->simple()
                ->visible(fn (): bool => Auth::user()?->hasAnyRole([
                    'super-admin',
                ]));
        });
    }
}
