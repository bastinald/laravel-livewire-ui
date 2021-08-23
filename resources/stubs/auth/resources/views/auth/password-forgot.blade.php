@section('title', __('Forgot Password'))

<div class="container my-3">
    <div class="d-grid col-lg-4 mx-auto">
        <x-bs::form class="card" submit="send">
            <h5 class="card-header">
                @yield('title')
            </h5>
            <div class="card-body d-grid gap-3">
                <x-bs::input :label="__('Email')" type="email" model="email"/>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <x-bs::button :label="__('Send Password Reset Link')" type="submit"/>
            </div>
        </x-bs::form>
    </div>
</div>
