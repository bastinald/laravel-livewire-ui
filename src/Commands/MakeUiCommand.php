<?php

namespace Bastinald\LaravelLivewireUi\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;

class MakeUiCommand extends Command
{
    protected $signature = 'make:ui {--a|--auth} {--force}';
    private $filesystem;

    public function handle()
    {
        $this->filesystem = new Filesystem;

        if ($this->filesystem->exists(app_path('Http/Livewire/Layouts/Nav.php')) && !$this->option('force')) {
            $this->warn('It looks like UI was already made.');
            $this->warn('Use the <info>--force</info> to overwrite it.');

            return;
        }

        if ($this->option('auth')) {
            $this->makeAuth();
        }

        $this->makeStubs();
        $this->executeCommands();

        $this->info('UI made successfully.');
        $this->info(config('app.url'));
    }

    private function makeAuth()
    {
        Artisan::call('make:auth', [
            '--force' => $this->option('force'),
        ], $this->getOutput());
    }

    private function makeStubs()
    {
        foreach ($this->filesystem->allFiles(config('laravel-livewire-ui.stub_path') . '/ui') as $stub) {
            $path = base_path($stub->getRelativePathname());

            $this->filesystem->ensureDirectoryExists(dirname($path));
            $this->filesystem->put($path, $this->filesystem->get($stub));

            $this->warn('File created: <info>' . $stub->getRelativePathname() . '</info>');
        }
    }

    private function executeCommands()
    {
        Artisan::call('migrate:auto', [], $this->getOutput());

        exec('npm install');
        exec('npm run dev');
    }
}
