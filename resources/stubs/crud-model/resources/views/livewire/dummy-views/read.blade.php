@section('title', __('DummyModelTitle'))

<x-layouts.modal>
    <div class="modal-body">
        <dl>
            <dt>{{ __('ID') }}</dt>
            <dd>{{ $dummyModelVariable->id }}</dd>

            <dt>{{ __('Name') }}</dt>
            <dd>{{ $dummyModelVariable->name }}</dd>

            <dt>{{ __('Created At') }}</dt>
            <dd>{{ $dummyModelVariable->created_at }}</dd>

            <dt>{{ __('Updated At') }}</dt>
            <dd>{{ $dummyModelVariable->updated_at }}</dd>
        </dl>
    </div>
    <div class="modal-footer">
        <x-bs::button type="button" :label="__('Close')" color="secondary"
            wire:click="$emit('hideModal')"/>
    </div>
</x-layouts.modal>
