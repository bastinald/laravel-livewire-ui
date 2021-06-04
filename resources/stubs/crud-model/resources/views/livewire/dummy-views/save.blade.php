@section('title', !$dummyModelVariable->exists ? __('Create DummyModelTitle') : __('Update DummyModelTitle'))

<x-layouts.modal>
    <form wire:submit.prevent="save">
        <div class="modal-body">
            <x-bs::input type="text" :label="__('Name')"
                wire:model.defer="model.name"/>
        </div>
        <div class="modal-footer">
            <x-bs::button type="button" :label="__('Cancel')" color="secondary"
                wire:click="$emit('hideModal')"/>

            <x-bs::button type="submit" :label="__('Save')"/>
        </div>
    </form>
</x-layouts.modal>
