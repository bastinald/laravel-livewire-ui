<?php

namespace App\Http\Livewire\Auth;

use Bastinald\LaravelLivewireUi\Traits\WithModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Livewire\Component;

class PasswordChange extends Component
{
    use WithModel;

    public function render()
    {
        return view('livewire.auth.password-change');
    }

    public function rules()
    {
        return [
            'current_password' => ['required', 'password'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function save()
    {
        $this->validateModel();

        Auth::user()->update($this->getModel(['password']));

        $this->emit('hideModal');
    }
}
