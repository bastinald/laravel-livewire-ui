<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class PasswordForgot extends Component
{
    public $email;

    public function route()
    {
        return Route::get('password-forgot', static::class)
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
        $this->validate();

        $status = Password::sendResetLink($this->only(['email']));

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->emit('showToast', 'success', __($status));
    }
}
