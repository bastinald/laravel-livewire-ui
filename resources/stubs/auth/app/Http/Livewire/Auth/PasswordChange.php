<?php

namespace App\Http\Livewire\Auth;

use Bastinald\LaravelBootstrapComponents\Traits\WithModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PasswordChange extends Component
{
    use WithModel;

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
        $this->validateModel();

        Auth::user()->update($this->model()->only('password')->toArray());

        $this->emit('showToast', 'success', __('Password saved!'));
        $this->emit('hideModal');
    }
}
