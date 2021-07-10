@section('title', __('Login'))

<div class="container my-3">
    <div class="d-grid col-lg-5 mx-auto">
        <form class="card" wire:submit.prevent="login">
            <h5 class="card-header">
                @yield('title')
            </h5>
            <div class="card-body d-grid gap-3">
                <x-bs::input :label="__('Email')" type="email" wire:model.defer="email"/>
                <x-bs::input :label="__('Password')" type="password" wire:model.defer="password"/>

                <div class="d-flex justify-content-between">
                    <x-bs::check :checkLabel="__('Remember me')" wire:model.defer="remember"/>
                    <x-bs::link :label="__('Forgot password?')" route="password.forgot"/>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <x-bs::button :label="__('Login')" type="submit"/>
            </div>
        </form>
    </div>
</div>
