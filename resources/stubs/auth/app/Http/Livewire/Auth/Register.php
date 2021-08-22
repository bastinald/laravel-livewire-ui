<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Bastinald\LaravelBootstrapComponents\Traits\WithModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Lukeraymonddowning\Honey\Traits\WithHoney;

class Register extends Component
{
    use WithHoney, WithModel;

    public function route()
    {
        return Route::get('register')
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
        $this->validateModel();

        if (!$this->honeyPasses()) {
            return;
        }

        $user = User::create($this->model()->except('password_confirmation')->toArray());

        Auth::login($user, true);

        return redirect()->to(RouteServiceProvider::HOME);
    }
}
