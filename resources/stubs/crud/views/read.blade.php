<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">
                {{ __('Dummy Model Title') }}
            </h5>
            <x-bs::close dismiss="modal"/>
        </div>
        <div class="modal-body">
            <dl>
                <dt>{{ __('ID') }}</dt>
                <dd>{{ $dummyModelVariable->id }}</dd>

                <dt>{{ __('Name') }}</dt>
                <dd>{{ $dummyModelVariable->name }}</dd>

                <dt>{{ __('Created At') }}</dt>
                <dd>@displayDate($dummyModelVariable->created_at)</dd>

                <dt>{{ __('Updated At') }}</dt>
                <dd>@displayDate($dummyModelVariable->updated_at)</dd>
            </dl>
        </div>
        <div class="modal-footer">
            <x-bs::button :label="__('Close')" color="light" dismiss="modal"/>
        </div>
    </div>
</div>
