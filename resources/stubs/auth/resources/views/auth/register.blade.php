@section('title', 'Register')

<div class="d-grid col-lg-4 mx-auto">
    <div class="card">
        <div class="card-header">
            @yield('title')
        </div>
        <form wire:submit.prevent="register" class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" wire:model.defer="name"
                    class="form-control @error('name') is-invalid @enderror">
                @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" wire:model.defer="email"
                    class="form-control @error('email') is-invalid @enderror">
                @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" wire:model.defer="password"
                    class="form-control @error('password') is-invalid @enderror">
                @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" id="password_confirmation" wire:model.defer="password_confirmation"
                    class="form-control">
            </div>

            <x-honey/>

            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
    </div>
</div>
