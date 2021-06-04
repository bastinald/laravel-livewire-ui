@section('title', __('Login'))

<x-layouts.card>
    <form wire:submit.prevent="login">
        <x-bs::input type="email" :label="__('Email')"
            wire:model.defer="model.email"/>

        <x-bs::input type="password" :label="__('Password')"
            wire:model.defer="model.password"/>

        <div class="d-flex justify-content-between">
            <x-bs::check :checkLabel="__('Remember me')"
                wire:model.defer="model.remember"/>

            <a href="{{ route('password.forgot') }}">
                {{ __('Forgot password?') }}
            </a>
        </div>

        <x-bs::button type="submit" :label="__('Login')" class="w-100"/>
    </form>
</x-layouts.card>
