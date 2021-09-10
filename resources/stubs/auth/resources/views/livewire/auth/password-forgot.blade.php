@section('title', __('Forgot Password'))

<div class="container my-4">
    <div class="d-grid col-lg-4 mx-auto">
        <form wire:submit.prevent="send" class="card">
            <div class="card-header">
                @yield('title')
            </div>
            <div class="card-body">
                <div>
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input type="email" id="email" wire:model.defer="email"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">{{ __('Send Password Reset Link') }}</button>
            </div>
        </form>
    </div>
</div>
