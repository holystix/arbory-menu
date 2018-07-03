<?php

namespace CubeAgency\ArboryMenu;

use Illuminate\Support\ServiceProvider;

class ArboryMenuServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'cubeagency');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'cubeagency');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__.'/../config/arborymenu.php' => config_path('arborymenu.php'),
            ], 'arborymenu.config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/cubeagency'),
            ], 'arborymenu.views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/cubeagency'),
            ], 'arborymenu.views');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/cubeagency'),
            ], 'arborymenu.views');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/arborymenu.php', 'arborymenu');

        // Register the service the package provides.
        $this->app->singleton('arborymenu', function ($app) {
            return new ArboryMenu;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['arborymenu'];
    }
}