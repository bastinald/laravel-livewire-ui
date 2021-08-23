@section('title', __('Register'))

<div class="container my-3">
    <div class="d-grid col-lg-4 mx-auto">
        <x-bs::form class="card" submit="register">
            <h5 class="card-header">
                @yield('title')
            </h5>
            <div class="card-body d-grid gap-3">
                <x-bs::input :label="__('Name')" model="name"/>
                <x-bs::input :label="__('Email')" type="email" model="email"/>
                <x-bs::input :label="__('Password')" type="password" model="password"/>
                <x-bs::input :label="__('Confirm Password')" type="password" model="password_confirmation"/>

                <x-honey/>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <x-bs::button :label="__('Register')" type="submit"/>
            </div>
        </x-bs::form>
    </div>
</div>
