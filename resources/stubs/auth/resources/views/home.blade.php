@section('title', __('Home'))

<div class="container my-3">
    <div class="d-grid col-lg-4 mx-auto">
        <div class="card">
            <h5 class="card-header">
                @yield('title')
            </h5>
            <div class="card-body">
                {{ __('You are logged in!') }}
            </div>
        </div>
    </div>
</div>
