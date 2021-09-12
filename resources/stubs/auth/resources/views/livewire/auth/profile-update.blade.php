<div class="modal-dialog">
    <form wire:submit.prevent="update" class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('Update Profile') }}</h5>
            <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input type="text" id="name" wire:model.defer="name"
                    class="form-control @error('name') is-invalid @enderror">
                @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input type="email" id="email" wire:model.defer="email"
                    class="form-control @error('email') is-invalid @enderror">
                @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">{{ __('Cancel') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('Update Profile') }}</button>
        </div>
    </form>
</div>
