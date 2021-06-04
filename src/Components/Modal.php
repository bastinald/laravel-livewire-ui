<?php

namespace Bastinald\LaravelLivewireUi\Components;

use Livewire\Component;

class Modal extends Component
{
    public $component;
    public $params = [];
    protected $listeners = ['showModal', 'resetModal'];

    public function render()
    {
        return view('laravel-livewire-ui::modal');
    }

    public function showModal($component, ...$params)
    {
        $this->component = $component;
        $this->params = $params;

        $this->emit('showBootstrapModal');
    }

    public function resetModal()
    {
        $this->reset();
    }
}
