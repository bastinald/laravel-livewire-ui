<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Lukeraymonddowning\Honey\Traits\WithHoney;

class Register extends Component
{
    use WithHoney;

    public $name, $email, $password, $password_confirmation;

    public function route()
    {
        return Route::get('register', static::class)
            ->name('register')
            ->middleware('guest');
    }

    public function render()
    {
        return view('auth.register');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => ['required', 'confirmed'],
        ];
    }

    public function register()
    {
        $validated = $this->validate();

        if (!$this->honeyPasses()) {
            return;
        }

        $user = User::create($validated);

        Auth::login($user, true);

        return redirect()->to(RouteServiceProvider::HOME);
    }
}
