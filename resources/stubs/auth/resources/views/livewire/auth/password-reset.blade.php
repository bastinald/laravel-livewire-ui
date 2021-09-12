@section('title', __('Reset Password'))

<div class="container my-4">
    <div class="d-grid col-lg-4 mx-auto">
        <form wire:submit.prevent="resetPassword" class="card">
            <div class="card-header">
                {{ __('Reset Password') }}
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input type="email" id="email" wire:model.defer="email"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('New Password') }}</label>
                    <input type="password" id="password" wire:model.defer="password"
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="form-label">{{ __('Confirm New Password') }}</label>
                    <input type="password" id="password_confirmation" wire:model.defer="password_confirmation"
                        class="form-control">
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
            </div>
        </form>
    </div>
</div>
