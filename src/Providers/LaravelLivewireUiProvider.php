<?php

namespace Bastinald\LaravelLivewireUi\Providers;

use Bastinald\LaravelLivewireUi\Commands\LogClearCommand;
use Bastinald\LaravelLivewireUi\Commands\MakeAuthCommand;
use Bastinald\LaravelLivewireUi\Commands\MakeCrudCommand;
use Bastinald\LaravelLivewireUi\Commands\MakeUiCommand;
use Illuminate\Support\ServiceProvider;

class LaravelLivewireUiProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                LogClearCommand::class,
                MakeAuthCommand::class,
                MakeCrudCommand::class,
                MakeUiCommand::class,
            ]);
        }

        $this->publishes(
            [__DIR__ . '/../../config/laravel-livewire-ui.php' => config_path('laravel-livewire-ui.php')],
            ['laravel-livewire-ui', 'laravel-livewire-ui:config']
        );

        $this->publishes(
            [__DIR__ . '/../../resources/stubs' => resource_path('stubs/vendor/laravel-livewire-ui')],
            ['laravel-livewire-ui', 'laravel-livewire-ui:stubs']
        );
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/laravel-livewire-ui.php', 'laravel-livewire-ui');
    }
}
