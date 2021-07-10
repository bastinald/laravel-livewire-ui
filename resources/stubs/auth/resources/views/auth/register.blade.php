@section('title', __('Register'))

<div class="container my-3">
    <div class="d-grid col-lg-5 mx-auto">
        <form class="card" wire:submit.prevent="register">
            <h5 class="card-header">
                @yield('title')
            </h5>
            <div class="card-body d-grid gap-3">
                <x-bs::input :label="__('Name')" wire:model.defer="name"/>
                <x-bs::input :label="__('Email')" type="email" wire:model.defer="email"/>
                <x-bs::input :label="__('Password')" type="password" wire:model.defer="password"/>
                <x-bs::input :label="__('Confirm Password')" type="password" wire:model.defer="password_confirmation"/>

                <x-honey/>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <x-bs::button :label="__('Register')" type="submit"/>
            </div>
        </form>
    </div>
</div>
