<?php

namespace DummyComponentNamespace;

use DummyModelNamespace\DummyModelClass;
use Bastinald\LaravelLivewireUi\Traits\WithModel;
use Livewire\Component;

class Save extends Component
{
    use WithModel;

    public $dummyModelVariable;

    public function mount(DummyModelClass $dummyModelVariable = null)
    {
        $this->dummyModelVariable = $dummyModelVariable;
        $this->setModel($dummyModelVariable->toArray());
    }

    public function render()
    {
        return view('dummy-views.save');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }

    public function save()
    {
        $validatedModel = $this->validateModel();

        $this->dummyModelVariable->fill($validatedModel)->save();

        $this->emitTo('dummy-route-name.index', '$refresh');
        $this->emit('hideModal');
    }
}
