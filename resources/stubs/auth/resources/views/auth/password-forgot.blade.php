@section('title', 'Forgot Password')

<div class="d-grid col-lg-4 mx-auto">
    <div class="card">
        <div class="card-header">
            @yield('title')
        </div>
        <form wire:submit.prevent="send" class="card-body">
            @if($status)
                <div class="alert alert-success">
                    {{ $status }}
                </div>
            @endif

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" wire:model.defer="email"
                    class="form-control @error('email') is-invalid @enderror">
                @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Send Password Reset Link</button>
        </form>
    </div>
</div>
