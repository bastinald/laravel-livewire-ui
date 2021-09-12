@section('title', __('Login'))

<div class="container my-4">
    <div class="d-grid col-lg-4 mx-auto">
        <form wire:submit.prevent="login" class="card">
            <div class="card-header">
                {{ __('Login') }}
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input type="email" id="email" wire:model.defer="email"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input type="password" id="password" wire:model.defer="password"
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" id="remember" wire:model.defer="remember" class="form-check-input">
                        <label for="remember" class="form-check-label">{{ __('Remember me') }}</label>
                    </div>

                    <a href="{{ route('password.forgot') }}">{{ __('Forgot password?') }}</a>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
            </div>
        </form>
    </div>
</div>
