@section('title', __('Welcome'))

<div class="container my-4">
    <div class="d-grid col-lg-4 mx-auto">
        <div class="card">
            <div class="card-header">
                @yield('title')
            </div>
            <div class="card-body">
                {{ __('Build something amazing!') }}
            </div>
        </div>
    </div>
</div>
