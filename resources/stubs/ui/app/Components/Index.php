<?php

namespace App\Components;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Index extends Component
{
    public function route()
    {
        return Route::get('/')
            ->name('index');
    }

    public function render()
    {
        return view('index');
    }
}
