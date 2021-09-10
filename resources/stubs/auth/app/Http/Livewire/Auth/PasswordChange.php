<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PasswordChange extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function render()
    {
        return view('livewire.auth.password-change');
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

        Auth::user()->update(['password' => bcrypt($this->password)]);

        $this->emit('showToast', 'success', __('Password changed!'));
        $this->emit('hideModal');
    }
}
