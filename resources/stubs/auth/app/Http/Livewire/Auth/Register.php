<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Bastinald\LaravelLivewireUi\Traits\WithModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Livewire\Component;
use Lukeraymonddowning\Honey\Traits\WithHoney;

class Register extends Component
{
    use WithHoney, WithModel;

    public function route()
    {
        return Route::get('/register', static::class)
            ->name('register')
            ->middleware('guest');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function register()
    {
        $validatedModel = $this->validateModel();

        if (!$this->honeyPasses()) {
            return;
        }

        $user = User::create($validatedModel);

        Auth::login($user);

        return redirect()->to(RouteServiceProvider::HOME);
    }
}
