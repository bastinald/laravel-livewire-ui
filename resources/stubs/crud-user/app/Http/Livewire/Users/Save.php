<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Bastinald\LaravelLivewireUi\Traits\WithModel;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Livewire\Component;

class Save extends Component
{
    use WithModel;

    public $user;

    public function mount(User $user = null)
    {
        $this->user = $user;
        $this->setModel($user->toArray());
    }

    public function render()
    {
        return view('livewire.users.save');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255',
                Rule::unique('users')->ignoreModel($this->user)],
            'password' => [!$this->user->exists ? 'required' : 'nullable',
                'confirmed', Rules\Password::defaults()],
        ];
    }

    public function save()
    {
        $validatedModel = $this->validateModel();

        $this->user->fill($validatedModel)->save();

        $this->emitTo('users.index', '$refresh');
        $this->emit('hideModal');
    }
}
