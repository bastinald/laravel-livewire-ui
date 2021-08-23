@section('title', __('Reset Password'))

<div class="container my-3">
    <div class="d-grid col-lg-4 mx-auto">
        <x-bs::form class="card" submit="save">
            <h5 class="card-header">
                @yield('title')
            </h5>
            <div class="card-body d-grid gap-3">
                <x-bs::input :label="__('Email')" type="email" model="email"/>
                <x-bs::input :label="__('New Password')" type="password" model="password"/>
                <x-bs::input :label="__('Confirm New Password')" type="password" model="password_confirmation"/>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <x-bs::button :label="__('Save Password')" type="submit"/>
            </div>
        </x-bs::form>
    </div>
</div>
