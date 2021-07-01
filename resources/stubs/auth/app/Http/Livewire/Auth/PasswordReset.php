<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class PasswordReset extends Component
{
    public $token, $email, $password, $password_confirmation;

    public function route()
    {
        return Route::get('password-reset/{token}/{email}', static::class)
            ->name('password.reset')
            ->middleware('guest');
    }

    public function mount($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    public function render()
    {
        return view('auth.password-reset');
    }

    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
        ];
    }

    public function save()
    {
        $this->validate();

        $status = Password::reset(
            $this->only(['token', 'email', 'password', 'password_confirmation']),
            function (User $user) {
                $user->update($this->only(['password']));

                Auth::login($user, true);
            }
        );

        if ($status != Password::PASSWORD_RESET) {
            $this->addError('email', __($status));

            return;
        }

        return redirect()->to(RouteServiceProvider::HOME);
    }
}
