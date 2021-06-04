<?php

namespace Bastinald\LaravelLivewireUi\Traits;

use Illuminate\Filesystem\Filesystem;

trait MakesStubs
{
    protected $filesystem;
    protected $replaces = [];

    protected function filesystem()
    {
        if (!$this->filesystem) {
            $this->filesystem = new Filesystem;
        }

        return $this->filesystem;
    }

    protected function makeStubs($dir, $dirSearch, $dirParser)
    {
        $dirReplace = [dirname($dirParser->relativeClassPath()), dirname($dirParser->relativeViewPath())];
        $dirStubs = rtrim(config('laravel-livewire-ui.stub_path'), '/') . '/' . $dir;

        foreach ($this->filesystem()->allFiles($dirStubs) as $stub) {
            $path = str_replace($dirSearch, $dirReplace, base_path($stub->getRelativePathname()));

            $this->filesystem()->ensureDirectoryExists(dirname($path));
            $this->filesystem()->put($path, $this->replaceStub($contents ?? $stub->getContents()));
        }
    }

    protected function replaceStub($contents)
    {
        foreach ($this->replaces as $search => $replace) {
            $contents = str_replace($search, $replace, $contents);
        }

        return $contents;
    }
}
