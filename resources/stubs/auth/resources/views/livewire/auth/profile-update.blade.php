@section('title', __('Update Profile'))

<x-layouts.modal>
    <form wire:submit.prevent="save">
        <div class="modal-body">
            <x-bs::input type="text" :label="__('Name')"
                wire:model.defer="model.name"/>

            <x-bs::input type="email" :label="__('Email')"
                wire:model.defer="model.email"/>
        </div>
        <div class="modal-footer">
            <x-bs::button type="button" :label="__('Cancel')" color="secondary"
                wire:click="$emit('hideModal')"/>

            <x-bs::button type="submit" :label="__('Save')"/>
        </div>
    </form>
</x-layouts.modal>
