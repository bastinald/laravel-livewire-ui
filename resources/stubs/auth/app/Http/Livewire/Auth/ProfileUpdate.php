<?php

namespace App\Http\Livewire\Auth;

use Bastinald\LaravelLivewireUi\Traits\WithModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ProfileUpdate extends Component
{
    use WithModel;

    public function mount()
    {
        $this->setModel(Auth::user()->toArray());
    }

    public function render()
    {
        return view('livewire.auth.profile-update');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255',
                Rule::unique('users')->ignoreModel(Auth::user())],
        ];
    }

    public function save()
    {
        $validatedModel = $this->validateModel();

        Auth::user()->update($validatedModel);

        $this->emitTo('layouts.nav', '$refresh');
        $this->emit('hideModal');
    }
}
