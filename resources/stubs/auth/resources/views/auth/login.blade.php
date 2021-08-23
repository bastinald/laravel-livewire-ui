@section('title', __('Login'))

<div class="container my-3">
    <div class="d-grid col-lg-4 mx-auto">
        <x-bs::form class="card" submit="login">
            <h5 class="card-header">
                @yield('title')
            </h5>
            <div class="card-body d-grid gap-3">
                <x-bs::input :label="__('Email')" type="email" model="email"/>
                <x-bs::input :label="__('Password')" type="password" model="password"/>

                <div class="d-flex justify-content-between">
                    <x-bs::check :checkLabel="__('Remember me')" model="remember"/>

                    @if(Route::has('password.forgot'))
                        <x-bs::link :label="__('Forgot password?')" route="password.forgot"/>
                    @endif
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <x-bs::button :label="__('Login')" type="submit"/>
            </div>
        </x-bs::form>
    </div>
</div>
