@section('title', __('Reset Password'))

<x-layouts.card>
    <form wire:submit.prevent="save">
        <x-bs::input type="email" :label="__('Email')"
            wire:model.defer="model.email"/>

        <x-bs::input type="password" :label="__('New Password')"
            wire:model.defer="model.password"/>

        <x-bs::input type="password" :label="__('Confirm New Password')"
            wire:model.defer="model.password_confirmation"/>

        <x-bs::button type="submit" :label="__('Save')" class="w-100"/>
    </form>
</x-layouts.card>
