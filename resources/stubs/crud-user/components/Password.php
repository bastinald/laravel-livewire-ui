<?php

namespace DummyComponentNamespace;

use Bastinald\LaravelBootstrapComponents\Traits\WithModel;
use DummyModelNamespace\DummyModelClass;
use Livewire\Component;

class Password extends Component
{
    use WithModel;

    public $dummyModelVariable;

    public function mount(DummyModelClass $dummyModelVariable)
    {
        $this->dummyModelVariable = $dummyModelVariable;
    }

    public function render()
    {
        return view('dummy.prefix.password');
    }

    public function rules()
    {
        return [
            'password' => ['required', 'confirmed'],
        ];
    }

    public function save()
    {
        $this->validateModel();

        $this->dummyModelVariable->update($this->model()->only('password')->toArray());

        $this->emit('showToast', 'success', __('Dummy Model Title password saved!'));
        $this->emit('hideModal');
    }
}
