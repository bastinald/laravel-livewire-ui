<?php

namespace Bastinald\LaravelLivewireUi\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeAuthCommand extends Command
{
    protected $signature = 'make:auth {--force}';
    private $filesystem;

    public function handle()
    {
        $this->filesystem = new Filesystem;

        if ($this->filesystem->exists(app_path('Http/Livewire/Auth/Login.php')) && !$this->option('force')) {
            $this->warn('It looks like Auth was already made.');
            $this->warn('Use the <info>--force</info> to overwrite it.');

            return;
        }

        $this->makeStubs();

        $this->info('Auth made successfully.');
    }

    private function makeStubs()
    {
        $stubs = config('laravel-livewire-ui.stub_path') . '/auth';

        foreach ($this->filesystem->allFiles($stubs) as $stub) {
            $path = base_path($stub->getRelativePathname());

            $this->filesystem->ensureDirectoryExists(dirname($path));
            $this->filesystem->put($path, $this->filesystem->get($stub));

            $this->warn('File created: <info>' . $stub->getRelativePathname() . '</info>');
        }
    }
}
