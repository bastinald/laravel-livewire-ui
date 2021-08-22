<div class="modal-dialog">
    <x-bs::form class="modal-content" submit="save">
        <div class="modal-header">
            <h5 class="modal-title">
                {{ __('Change Password') }}
            </h5>
            <x-bs::close dismiss="modal"/>
        </div>
        <div class="modal-body d-grid gap-3">
            <x-bs::input :label="__('Current Password')" type="password" model="current_password"/>
            <x-bs::input :label="__('New Password')" type="password" model="password"/>
            <x-bs::input :label="__('Confirm New Password')" type="password" model="password_confirmation"/>
        </div>
        <div class="modal-footer">
            <x-bs::button :label="__('Cancel')" color="light" dismiss="modal"/>
            <x-bs::button :label="__('Save Password')" type="submit"/>
        </div>
    </x-bs::form>
</div>
