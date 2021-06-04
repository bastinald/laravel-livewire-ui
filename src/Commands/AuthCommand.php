<?php

namespace Bastinald\LaravelLivewireUi\Commands;

use Bastinald\LaravelLivewireUi\Traits\MakesStubs;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Livewire\Commands\ComponentParser;

class AuthCommand extends Command
{
    use MakesStubs;

    protected $signature = 'make:auth {--force}';

    public function handle()
    {
        $homeParser = new ComponentParser(
            config('livewire.class_namespace'),
            config('livewire.view_path'),
            'home'
        );

        if ($this->filesystem()->exists($homeParser->classPath()) && !$this->option('force')) {
            $this->warn('Auth already made! Use the <info>--force</info> to overwrite it.');

            return;
        }

        if (!Str::contains($this->filesystem()->get(base_path('package.json')), 'bootstrap') &&
            $this->confirm('Bootstrap not installed, install now? (requires NPM)', true)) {
            Artisan::call('install:bs', [], $this->getOutput());
        }

        $this->makeStubs(
            'auth',
            ['app/Http/Livewire', 'resources/views/livewire'],
            $homeParser
        );

        Artisan::call('migrate:auto', [], $this->getOutput());

        $this->info('Auth made!');
    }
}
