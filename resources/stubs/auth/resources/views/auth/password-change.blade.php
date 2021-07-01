<div class="modal-dialog">
    <form class="modal-content" wire:submit.prevent="save">
        <div class="modal-header">
            <h5 class="modal-title">
                {{ __('Change Password') }}
            </h5>
            <x-bs::close dismiss="modal"/>
        </div>
        <div class="modal-body d-grid gap-3">
            <x-bs::input :label="__('Current Password')" type="password" wire:model.defer="current_password"/>
            <x-bs::input :label="__('New Password')" type="password" wire:model.defer="password"/>
            <x-bs::input :label="__('Confirm New Password')" type="password" wire:model.defer="password_confirmation"/>
        </div>
        <div class="modal-footer">
            <x-bs::button :label="__('Cancel')" color="light" dismiss="modal"/>
            <x-bs::button :label="__('Save Password')" type="submit"/>
        </div>
    </form>
</div>
