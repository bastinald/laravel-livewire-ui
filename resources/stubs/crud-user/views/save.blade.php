<div class="modal-dialog">
    <x-bs::form class="modal-content" submit="save">
        <div class="modal-header">
            <h5 class="modal-title">
                {{ !$dummyModelVariable->exists ? __('Create Dummy Model Title') : __('Update Dummy Model Title') }}
            </h5>
            <x-bs::close dismiss="modal"/>
        </div>
        <div class="modal-body d-grid gap-3">
            <x-bs::input :label="__('Name')" model="name"/>
            <x-bs::input :label="__('Email')" type="email" model="email"/>

            @if(!$dummyModelVariable->exists)
                <x-bs::input :label="__('Password')" type="password" model="password"/>
                <x-bs::input :label="__('Confirm Password')" type="password" model="password_confirmation"/>
            @endif
        </div>
        <div class="modal-footer">
            <x-bs::button :label="__('Cancel')" color="light" dismiss="modal"/>
            <x-bs::button :label="__('Save Dummy Model Title')" type="submit"/>
        </div>
    </x-bs::form>
</div>
