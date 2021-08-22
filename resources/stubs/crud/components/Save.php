<?php

namespace DummyComponentNamespace;

use Bastinald\LaravelBootstrapComponents\Traits\WithModel;
use DummyModelNamespace\DummyModelClass;
use Livewire\Component;

class Save extends Component
{
    use WithModel;

    public $dummyModelVariable;

    public function mount(DummyModelClass $dummyModelVariable = null)
    {
        $this->dummyModelVariable = $dummyModelVariable;

        $this->setModel($dummyModelVariable);
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
        $this->validateModel();

        $this->dummyModelVariable->fill($this->model()->toArray())->save();

        $this->emit('showToast', 'success', __('Dummy Model Title saved!'));
        $this->emit('hideModal');
        $this->emit('$refresh');
    }
}
