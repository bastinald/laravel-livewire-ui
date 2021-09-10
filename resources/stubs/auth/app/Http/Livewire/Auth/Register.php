<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Lukeraymonddowning\Honey\Traits\WithHoney;

class Register extends Component
{
    use WithHoney;

    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function route()
    {
        return Route::get('/register')
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
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ];
    }

    public function register()
    {
        $this->validate();

        if (!$this->honeyPasses()) {
            return null;
        }

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        Auth::login($user, true);

        return redirect()->to(RouteServiceProvider::HOME);
    }
}
