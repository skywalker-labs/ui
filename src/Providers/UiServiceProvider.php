<?php

namespace Skywalker\Ui\Providers;

use Skywalker\Ui\Console\Commands\AuthCommand;
use Skywalker\Ui\Console\Commands\ControllersCommand;
use Skywalker\Ui\Console\Commands\UiCommand;
use Skywalker\Ui\Routing\AuthRouteMethods;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Skywalker\Support\ToolkitServiceProvider;

/**
 * Class UiServiceProvider
 *
 * @package   Skywalker\Ui
 * @author    Skywalker Labs Team <skywalkerlknw@gmail.com>
 * @version   1.0.0
 * @since     1.0.0
 */
class UiServiceProvider extends ServiceProvider
{
    /**
     * Register the package services.
     *
     * @return void
     */
    public function register()
    {
        // Deeply Embed Skywalker Toolkit
        if (! $this->app->providerIsLoaded(ToolkitServiceProvider::class)) {
            $this->app->register(ToolkitServiceProvider::class);
        }

        if ($this->app->runningInConsole()) {
            $this->commands([
                AuthCommand::class,
                ControllersCommand::class,
                UiCommand::class,
            ]);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::mixin(new AuthRouteMethods);
    }
}
