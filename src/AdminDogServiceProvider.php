<?php

namespace SmallRuralDog\AdminDog;

use Illuminate\Support\ServiceProvider;

class AdminDogServiceProvider extends ServiceProvider
{

    protected $routeMiddleware = [
        'adminDog.bootstrap' => Middleware\Bootstrap::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'adminDog' => [
            'adminDog.bootstrap',
        ],
    ];

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'admin-dog');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'admin-dog');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');


        if (file_exists($routes = \AdminDog::path('routes.php'))) {
            $this->loadRoutesFrom($routes);
        }

        if ($this->app->runningInConsole()) {
            /*$this->publishes([
                __DIR__ . '/../config/config.php' => config_path('admin-dog.php'),
            ], 'config');*/

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/admin-dog'),
            ], 'views');*/

            // Publishing assets.
            $this->publishes([
                __DIR__ . '/../public' => public_path('vendor/admin-dog'),
            ], 'assets');

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/admin-dog'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'admin-dog');

        // Register the main class to use with the facade
        $this->app->singleton('admin-dog', function () {
            return new AdminDog;
        });

        $this->registerRouteMiddleware();
    }


    protected function registerRouteMiddleware()
    {
        // register route middleware.
        foreach ($this->routeMiddleware as $key => $middleware) {
            app('router')->aliasMiddleware($key, $middleware);
        }

        // register middleware group.
        foreach ($this->middlewareGroups as $key => $middleware) {
            app('router')->middlewareGroup($key, $middleware);
        }
    }
}
