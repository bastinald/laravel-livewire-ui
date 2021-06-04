@section('title', __('Change Password'))

<x-layouts.modal>
    <form wire:submit.prevent="save">
        <div class="modal-body">
            <x-bs::input type="password" :label="__('Current Password')"
                wire:model.defer="model.current_password"/>

            <x-bs::input type="password" :label="__('New Password')"
                wire:model.defer="model.password"/>

            <x-bs::input type="password" :label="__('Confirm New Password')"
                wire:model.defer="model.password_confirmation"/>
        </div>
        <div class="modal-footer">
            <x-bs::button type="button" :label="__('Cancel')" color="secondary"
                wire:click="$emit('hideModal')"/>

            <x-bs::button type="submit" :label="__('Save')"/>
        </div>
    </form>
</x-layouts.modal>
