<?php

namespace App\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $remember = false;

    public function route()
    {
        return Route::get('/login')
            ->name('login')
            ->middleware('guest');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
    }

    public function login()
    {
        $this->validate();

        $throttleKey = strtolower($this->email) . '|' . request()->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $this->addError('email', __('auth.throttle', [
                'seconds' => RateLimiter::availableIn($throttleKey),
            ]));

            return null;
        }

        if (!Auth::attempt($this->only(['email', 'password']), $this->remember)) {
            RateLimiter::hit($throttleKey);

            $this->addError('email', __('auth.failed'));

            return null;
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
