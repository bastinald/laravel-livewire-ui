<?php

namespace DummyComponentNamespace;

use DummyModelNamespace\DummyModelClass;
use Livewire\Component;

class Password extends Component
{
    public $dummyModelVariable, $password, $password_confirmation;

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
        $this->validate();

        $this->dummyModelVariable->update($this->only(['password']));

        $this->emit('showToast', 'success', __('Dummy Model Title password saved!'));
        $this->emit('hideModal');
    }
}
