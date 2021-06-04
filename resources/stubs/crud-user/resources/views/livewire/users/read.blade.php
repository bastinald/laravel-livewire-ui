@section('title', __('User'))

<x-layouts.modal>
    <div class="modal-body">
        <dl>
            <dt>{{ __('ID') }}</dt>
            <dd>{{ $user->id }}</dd>

            <dt>{{ __('Name') }}</dt>
            <dd>{{ $user->name }}</dd>

            <dt>{{ __('Email') }}</dt>
            <dd>{{ $user->email }}</dd>

            <dt>{{ __('Email Verified At') }}</dt>
            <dd>{{ $user->email_verified_at ?? __('N/A') }}</dd>

            <dt>{{ __('Created At') }}</dt>
            <dd>{{ $user->created_at }}</dd>

            <dt>{{ __('Updated At') }}</dt>
            <dd>{{ $user->updated_at }}</dd>
        </dl>
    </div>
    <div class="modal-footer">
        <x-bs::button type="button" :label="__('Close')" color="secondary"
            wire:click="$emit('hideModal')"/>
    </div>
</x-layouts.modal>
