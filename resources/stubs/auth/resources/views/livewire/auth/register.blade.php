@section('title', __('Register'))

<div class="container my-4">
    <div class="d-grid col-lg-4 mx-auto">
        <form wire:submit.prevent="register" class="card">
            <div class="card-header">
                @yield('title')
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input type="text" id="name" wire:model.defer="name"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>

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

                <div>
                    <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                    <input type="password" id="password_confirmation" wire:model.defer="password_confirmation"
                        class="form-control">
                </div>

                <x-honey/>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
            </div>
        </form>
    </div>
</div>
