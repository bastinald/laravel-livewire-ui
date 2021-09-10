<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;

class Nav extends Component
{
    protected $listeners = ['$refresh'];

    public function render()
    {
        return view('livewire.layouts.nav');
    }
}
