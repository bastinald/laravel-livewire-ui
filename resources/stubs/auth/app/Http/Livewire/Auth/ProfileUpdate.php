<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ProfileUpdate extends Component
{
    public $name;
    public $email;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    public function render()
    {
        return view('livewire.auth.profile-update');
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')->ignoreModel(Auth::user())],
        ];
    }

    public function save()
    {
        $this->validate();

        Auth::user()->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->emit('showToast', 'success', __('Profile updated!'));
        $this->emit('hideModal');
        $this->emit('$refresh');
    }
}
