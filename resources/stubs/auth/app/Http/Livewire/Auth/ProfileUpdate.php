<?php

namespace App\Http\Livewire\Auth;

use Bastinald\LaravelBootstrapComponents\Traits\WithModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ProfileUpdate extends Component
{
    use WithModel;

    public function mount()
    {
        $this->setModel(Auth::user());
    }

    public function render()
    {
        return view('auth.profile-update');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignoreModel(Auth::user())],
        ];
    }

    public function save()
    {
        $this->validateModel();

        Auth::user()->update($this->model()->toArray());

        $this->emit('showToast', 'success', __('Profile saved!'));
        $this->emit('hideModal');
        $this->emit('$refresh');
    }
}
