<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ProfileUpdate extends Component
{
    public $name, $email;

    public function mount()
    {
        $this->fill(Auth::user());
    }

    public function render()
    {
        return view('auth.profile-update');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::user()->id)],
        ];
    }

    public function save()
    {
        $validated = $this->validate();

        Auth::user()->update($validated);

        $this->emit('showToast', 'success', __('Profile saved!'));
        $this->emit('hideModal');
        $this->emit('$refresh');
    }
}
