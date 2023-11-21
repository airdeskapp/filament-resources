<?php

namespace Airdesk\FilamentResources;

use Illuminate\Support\ServiceProvider;

class FilamentResourcesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'filament-resources');
    }

    public function boot()
    {
    }
}
