@section('title', __('Home'))

<div class="container my-4">
    <div class="d-grid col-lg-4 mx-auto">
        <div class="card">
            <div class="card-header">
                @yield('title')
            </div>
            <div class="card-body">
                {{ __('You are logged in!') }}
            </div>
        </div>
    </div>
</div>
