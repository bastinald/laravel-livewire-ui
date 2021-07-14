<?php

namespace DummyComponentNamespace;

use DummyModelNamespace\DummyModelClass;
use Livewire\Component;

class Save extends Component
{
    public $dummyModelVariable, $name;

    public function mount(DummyModelClass $dummyModelVariable = null)
    {
        $this->dummyModelVariable = $dummyModelVariable;

        $this->fill($dummyModelVariable->toArray());
    }

    public function render()
    {
        return view('dummy.prefix.save');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
        ];
    }

    public function save()
    {
        $validated = $this->validate();

        $this->dummyModelVariable->fill($validated)->save();

        $this->emit('showToast', 'success', __('Dummy Model Title saved!'));
        $this->emit('hideModal');
        $this->emit('$refresh');
    }
}
