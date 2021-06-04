<?php

namespace Bastinald\LaravelLivewireUi\Providers;

use Bastinald\LaravelLivewireUi\Commands\AuthCommand;
use Bastinald\LaravelLivewireUi\Commands\CrudCommand;
use Bastinald\LaravelLivewireUi\Components\Modal;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LaravelLivewireUiProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                AuthCommand::class,
                CrudCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'laravel-livewire-ui');

        $this->publishes(
            [__DIR__ . '/../../config/laravel-livewire-ui.php' => config_path('laravel-livewire-ui.php')],
            ['laravel-livewire-ui', 'laravel-livewire-ui:config']
        );

        $this->publishes(
            [__DIR__ . '/../../resources/stubs' => resource_path('stubs/vendor/laravel-livewire-ui')],
            ['laravel-livewire-ui', 'laravel-livewire-ui:stubs']
        );

        $this->publishes(
            [__DIR__ . '/../../resources/views' => resource_path('views/vendor/laravel-livewire-ui')],
            ['laravel-livewire-ui', 'laravel-livewire-ui:views']
        );

        Livewire::component('modal', Modal::class);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/laravel-livewire-ui.php', 'laravel-livewire-ui');
    }
}
