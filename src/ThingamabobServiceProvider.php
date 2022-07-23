<?php

namespace Humweb\Thingamabob;

use Humweb\Thingamabob\Contracts\WidgetManager;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ThingamabobServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('thingamabob')
            ->hasConfigFile(['widgets'])
            ->hasRoute('web');
    }

    public function boot()
    {
        parent::boot();
//        $this->publishes([
//            $this->package->basePath('/../resources/js') => resource_path("js/widgets/{$this->package->shortName()}"),
//        ], "{$this->package->shortName()}-assets");
    }

    public function register()
    {
        parent::register();
        $this->app->singleton(WidgetManager::class, function ($app) {
            return new Widgets();
        });
    }
}
