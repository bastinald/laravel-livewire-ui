@section('title', __('Welcome'))

<div class="container my-3">
    <div class="d-grid col-lg-4 mx-auto">
        <div class="card">
            <h5 class="card-header">
                @yield('title')
            </h5>
            <div class="card-body">
                {{ __('Welcome to the app!') }}
            </div>
        </div>
    </div>
</div>
