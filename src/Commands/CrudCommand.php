<?php

namespace Bastinald\LaravelLivewireUi\Commands;

use Bastinald\LaravelLivewireUi\Traits\MakesStubs;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Livewire\Commands\ComponentParser;

class CrudCommand extends Command
{
    use MakesStubs;

    protected $signature = 'make:crud {model} {--force}';
    protected $homeParser, $componentParser, $modelParser;

    public function handle()
    {
        $this->setParsers();
        $this->setReplaces();

        if ($this->filesystem()->exists($this->componentParser->classPath()) && !$this->option('force')) {
            $this->warn('CRUD already made! Use the <info>--force</info> to overwrite it.');

            return;
        }

        if (!$this->filesystem()->exists($this->homeParser->classPath()) &&
            $this->confirm('Auth not made, make it now?', true)) {
            Artisan::call('make:auth', [], $this->getOutput());
        }

        if ($this->argument('model') == 'User') {
            $this->makeStubs(
                'crud-user',
                ['app/Http/Livewire', 'resources/views/livewire'],
                $this->homeParser
            );
        } else {
            $this->makeStubs(
                'crud-model',
                ['app/Http/Livewire/DummyComponents', 'resources/views/livewire/dummy-views'],
                $this->componentParser
            );
        }

        $this->insertNavItem();

        Artisan::call('make:amodel', [
            'name' => $this->argument('model'),
            '--force' => $this->option('force'),
        ], $this->getOutput());

        $this->info("CRUD made! Don't forget to migrate.");
    }

    protected function setParsers()
    {
        $this->homeParser = new ComponentParser(
            config('livewire.class_namespace'),
            config('livewire.view_path'),
            'home'
        );

        $this->componentParser = new ComponentParser(
            config('livewire.class_namespace'),
            config('livewire.view_path'),
            Str::plural($this->argument('model')) . '/Index'
        );

        $this->modelParser = new ComponentParser(
            is_dir(app_path('Models')) ? 'App\\Models' : 'App',
            config('livewire.view_path'),
            Arr::last(explode('/', $this->argument('model')))
        );
    }

    protected function setReplaces()
    {
        $dummyModelTitle = preg_replace('/(.)(?=[A-Z])/u', '$1 ', $this->modelParser->className());
        $dummyModelTitles = Str::plural($dummyModelTitle);
        $dummyViews = Str::replaceLast('.index', '', $this->componentParser->viewName());
        $dummyRouteName = Str::replace('livewire.', '', $dummyViews);

        $this->replaces = [
            'DummyComponentNamespace' => $this->componentParser->classNamespace(),
            'DummyModelNamespace' => $this->modelParser->classNamespace(),
            'DummyModelClass' => $this->modelParser->className(),
            'dummyModelVariables' => Str::camel($dummyModelTitles),
            'dummyModelVariable' => Str::camel($dummyModelTitle),
            'DummyModelTitles' => $dummyModelTitles,
            'DummyModelTitle' => $dummyModelTitle,
            'dummy-route-uri' => Str::replace('.', '/', $dummyRouteName),
            'dummy-route-name' => $dummyRouteName,
            'dummy-views' => $dummyViews,
            'dummy-icon' => $this->argument('model') == 'User' ? 'users' : 'database',
        ];
    }

    protected function insertNavItem()
    {
        $navPath = Str::replaceLast(
            'home.blade.php',
            'layouts/nav.blade.php',
            $this->homeParser->viewPath()
        );

        if ($this->filesystem()->exists($navPath)) {
            $navContents = $this->filesystem()->get($navPath);
            $navItemPath = __DIR__ . '/../../resources/stubs/nav-item.blade.php';
            $navItemContents = $this->replaceStub($this->filesystem()->get($navItemPath));
            $hook = '{{--crud_command_nav_item_hook--}}';

            if (Str::contains($navContents, $hook) && !Str::contains($navContents, $navItemContents)) {
                preg_match('/(.*)' . $hook . '/', $navContents, $matches);
                $indent = $matches[1];

                $navContents = Str::replace(
                    $hook,
                    trim($this->replaceStub($navItemContents)) . PHP_EOL . $indent . $hook,
                    $navContents
                );

                $this->filesystem()->put($navPath, $navContents);
            }
        }
    }
}
