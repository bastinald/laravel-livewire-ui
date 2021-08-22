<?php

namespace App\Http\Livewire\Auth;

use Bastinald\LaravelBootstrapComponents\Traits\WithModel;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class PasswordForgot extends Component
{
    use WithModel;

    public function route()
    {
        return Route::get('password-forgot')
            ->name('password.forgot')
            ->middleware('guest');
    }

    public function render()
    {
        return view('auth.password-forgot');
    }

    public function rules()
    {
        return [
            'email' => ['required', 'email'],
        ];
    }

    public function send()
    {
        $this->validateModel();

        $status = Password::sendResetLink($this->model()->toArray());

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->emit('showToast', 'success', __($status));
    }
}
