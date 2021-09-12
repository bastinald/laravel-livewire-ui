<div class="modal-dialog">
    <form wire:submit.prevent="change" class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('Change Password') }}</h5>
            <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
                <input type="password" id="current_password" wire:model.defer="current_password"
                    class="form-control @error('current_password') is-invalid @enderror">
                @error('current_password') <span class="invalid-feedback">{{ $message }}</span> @enderror
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
        <div class="modal-footer">
            <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">{{ __('Cancel') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('Change Password') }}</button>
        </div>
    </form>
</div>
