<?php

namespace App\Components\Auth;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class PasswordForgot extends Component
{
    public $email, $status;

    public function route()
    {
        return Route::get('/password-forgot')
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
        $this->reset('status');
        $this->validate();

        $status = Password::sendResetLink($this->only(['email']));

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return null;
        }

        $this->status = __($status);
    }
}
