<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PasswordChange extends Component
{
    public $current_password, $password, $password_confirmation;

    public function render()
    {
        return view('auth.password-change');
    }

    public function rules()
    {
        return [
            'current_password' => ['required', 'password'],
            'password' => ['required', 'confirmed'],
        ];
    }

    public function save()
    {
        $this->validate();

        Auth::user()->update($this->only(['password']));

        $this->emit('showToast', 'success', __('Password saved!'));
        $this->emit('hideModal');
    }
}
