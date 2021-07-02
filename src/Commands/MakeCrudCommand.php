<?php

namespace Bastinald\LaravelLivewireUi\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Livewire\Commands\ComponentParser;

class MakeCrudCommand extends Command
{
    protected $signature = 'make:crud {class} {--force}';
    private $filesystem;
    private $componentParser;
    private $modelParser;
    private $componentDir;
    private $viewDir;
    private $replaces;

    public function handle()
    {
        $this->filesystem = new Filesystem;

        $this->componentParser = new ComponentParser(
            config('livewire.class_namespace'),
            config('livewire.view_path'),
            Str::plural($this->argument('class')) . '\\Index'
        );

        $this->modelParser = new ComponentParser(
            is_dir(app_path('Models')) ? 'App\\Models' : 'App',
            config('livewire.view_path'),
            Str::singular(Arr::last(explode('\\', $this->componentParser->classNamespace()))),
        );

        $this->componentDir = Str::replaceLast('/Index.php', '', $this->componentParser->relativeClassPath());
        $this->viewDir = Str::replaceLast('/index.blade.php', '', $this->componentParser->relativeViewPath());

        if ($this->filesystem->exists($this->componentParser->classPath()) && !$this->option('force')) {
            $this->warn('CRUD exists: <info>' . $this->componentDir . '</info>');
            $this->warn('Use the <info>--force</info> to overwrite it.');

            return;
        }

        $this->setReplaces();
        $this->makeStubs();
        $this->makeModel();

        $this->info('CRUD made successfully.');
        $this->info(url($this->replaces['dummy-route-uri']));
    }

    private function setReplaces()
    {
        $prefix = Str::replaceLast('.index', '', $this->componentParser->viewName());
        $title = preg_replace('/(.)(?=[A-Z])/u', '$1 ', $this->modelParser->className());
        $titles = Str::plural($title);

        $this->replaces = [
            'DummyComponentNamespace' => $this->componentParser->classNamespace(),
            'DummyModelNamespace' => $this->modelParser->classNamespace(),
            'DummyModelClass' => $this->modelParser->className(),
            'dummy-route-uri' => Str::replace('.', '/', $prefix),
            'dummy.prefix' => $prefix,
            'dummyModelVariables' => Str::camel($titles),
            'dummyModelVariable' => Str::camel($title),
            'dummy_model_table' => Str::snake($titles),
            'Dummy Model Titles' => $titles,
            'Dummy Model Title' => $title,
        ];
    }

    private function makeStubs()
    {
        $stubDir = $this->modelParser->className() == 'User' ? 'crud-user' : 'crud';
        $stubs = config('laravel-livewire-ui.stub_path') . '/' . $stubDir;

        foreach ($this->filesystem->allFiles($stubs) as $stub) {
            $path = Str::replace(
                ['components', 'views'],
                [$this->componentDir, $this->viewDir],
                $stub->getRelativePathname()
            );
            $contents = Str::replace(
                array_keys($this->replaces),
                $this->replaces,
                $this->filesystem->get($stub)
            );
            $basePath = base_path($path);

            $this->filesystem->ensureDirectoryExists(dirname($basePath));
            $this->filesystem->put($basePath, $contents);

            $this->warn('File created: <info>' . $path . '</info>');
        }
    }

    private function makeModel()
    {
        if (!$this->filesystem->exists($this->modelParser->classPath())) {
            Artisan::call('make:amodel', [
                'class' => $this->modelParser->className(),
            ], $this->getOutput());

            Artisan::call('migrate:auto', [], $this->getOutput());
        }
    }
}
