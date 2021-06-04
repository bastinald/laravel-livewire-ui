<?php

namespace App\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use Bastinald\LaravelLivewireUi\Traits\WithModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules;
use Livewire\Component;

class PasswordReset extends Component
{
    use WithModel;

    public function route()
    {
        return Route::get('/password-reset/{token}/{email}', static::class)
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
        return view('livewire.auth.password-reset');
    }

    public function rules()
    {
        return [
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function save()
    {
        $validatedModel = $this->validateModel();

        $status = Password::reset($validatedModel, function ($user) {
            $user->update($this->getModel(['password']));

            Auth::login($user);
        });

        if ($status != Password::PASSWORD_RESET) {
            $this->addError('email', __($status));

            return;
        }

        return redirect()->to(RouteServiceProvider::HOME);
    }
}
