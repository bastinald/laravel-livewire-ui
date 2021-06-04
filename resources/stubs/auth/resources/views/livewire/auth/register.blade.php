@section('title', __('Register'))

<x-layouts.card>
    <form wire:submit.prevent="register">
        <x-bs::input type="text" :label="__('Name')"
            wire:model.defer="model.name"/>

        <x-bs::input type="email" :label="__('Email')"
            wire:model.defer="model.email"/>

        <x-bs::input type="password" :label="__('Password')"
            wire:model.defer="model.password"/>

        <x-bs::input type="password" :label="__('Confirm Password')"
            wire:model.defer="model.password_confirmation"/>

        <x-honey/>

        <x-bs::button type="submit" :label="__('Register')" class="w-100"/>
    </form>
</x-layouts.card>
