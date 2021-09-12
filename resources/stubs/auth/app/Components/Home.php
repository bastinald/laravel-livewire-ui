<?php

namespace App\Components;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Home extends Component
{
    public function route()
    {
        return Route::get('/home')
            ->name('home')
            ->middleware('auth');
    }

    public function render()
    {
        return view('home');
    }
}
