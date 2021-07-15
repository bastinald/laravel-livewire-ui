<?php

namespace Bastinald\LaravelLivewireUi\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class LogClearCommand extends Command
{
    protected $signature = 'log:clear';

    public function handle()
    {
        $filesystem = new Filesystem;
        $logFile = storage_path('logs/laravel.log');

        if ($filesystem->exists($logFile)) {
            $filesystem->delete($logFile);
        }

        $this->info('Log file cleared!');
    }
}
