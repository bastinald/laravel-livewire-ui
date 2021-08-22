<?php

namespace App\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use Bastinald\LaravelBootstrapComponents\Traits\WithModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Livewire\Component;

class Login extends Component
{
    use WithModel;

    public function route()
    {
        return Route::get('login')
            ->name('login')
            ->middleware('guest');
    }

    public function render()
    {
        return view('auth.login');
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
        $this->validateModel();

        $throttleKey = Str::lower($this->model()->get('email')) . '|' . request()->ip();
        $credentials = $this->model()->only(['email', 'password'])->toArray();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $this->addError('email', __('auth.throttle', [
                'seconds' => RateLimiter::availableIn($throttleKey),
            ]));

            return;
        }

        if (!Auth::attempt($credentials, $this->model()->get('remember'))) {
            RateLimiter::hit($throttleKey);

            $this->addError('email', __('auth.failed'));

            return;
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
