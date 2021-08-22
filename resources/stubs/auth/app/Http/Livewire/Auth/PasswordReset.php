<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Bastinald\LaravelBootstrapComponents\Traits\WithModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class PasswordReset extends Component
{
    use WithModel;

    public function route()
    {
        return Route::get('password-reset/{token}/{email}')
            ->name('password.reset')
            ->middleware('guest');
    }

    public function mount($token, $email)
    {
        $this->setModel([
            'token' => $token,
            'email' => $email,
        ]);
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
        $this->validateModel();

        $status = Password::reset($this->model, function (User $user) {
            $user->update($this->model()->only('password')->toArray());

            Auth::login($user, true);
        });

        if ($status != Password::PASSWORD_RESET) {
            $this->addError('email', __($status));

            return;
        }

        return redirect()->to(RouteServiceProvider::HOME);
    }
}
