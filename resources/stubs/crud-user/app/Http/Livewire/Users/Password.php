<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Bastinald\LaravelLivewireUi\Traits\WithModel;
use Illuminate\Validation\Rules;
use Livewire\Component;

class Password extends Component
{
    use WithModel;

    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.users.password');
    }

    public function rules()
    {
        return [
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function save()
    {
        $validatedModel = $this->validateModel();

        $this->user->update($validatedModel);

        $this->emit('hideModal');
    }
}
