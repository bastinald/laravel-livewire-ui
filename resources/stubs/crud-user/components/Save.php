<?php

namespace DummyComponentNamespace;

use DummyModelNamespace\DummyModelClass;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Save extends Component
{
    public $dummyModelVariable, $name, $email, $password, $password_confirmation;

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
            'email' => ['required', 'email', Rule::unique('dummy_model_table')->ignore($this->dummyModelVariable->id)],
            'password' => [!$this->dummyModelVariable->exists ? 'required' : 'nullable', 'confirmed'],
        ];
    }

    public function save()
    {
        $validated = $this->validate();

        $this->dummyModelVariable->fill(array_filter($validated))->save();

        $this->emit('showToast', 'success', __('Dummy Model Title saved!'));
        $this->emit('hideModal');
        $this->emit('$refresh');
    }
}
