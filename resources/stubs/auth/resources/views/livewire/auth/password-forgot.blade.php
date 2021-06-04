@section('title', __('Forgot Password'))

<x-layouts.card>
    <form wire:submit.prevent="send">
        @if($status)
            <x-bs::alert icon="check-circle" :message="__($status)" color="success"/>
        @endif

        <x-bs::input type="email" :label="__('Email')"
            wire:model.defer="model.email"/>

        <x-bs::button type="submit" :label="__('Send Password Reset Link')" class="w-100"/>
    </form>
</x-layouts.card>
