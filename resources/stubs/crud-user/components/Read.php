<?php

namespace DummyComponentNamespace;

use DummyModelNamespace\DummyModelClass;
use Livewire\Component;

class Read extends Component
{
    public $dummyModelVariable;

    public function mount(DummyModelClass $dummyModelVariable)
    {
        $this->dummyModelVariable = $dummyModelVariable;
    }

    public function render()
    {
        return view('dummy.prefix.read');
    }
}
