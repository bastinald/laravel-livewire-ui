<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">
                {{ __('Dummy Model Title') }}
            </h5>
            <x-bs::close dismiss="modal"/>
        </div>
        <div class="modal-body d-grid gap-3">
            <x-bs::desc :term="__('ID')" :details="$dummyModelVariable->id"/>
            <x-bs::desc :term="__('Name')" :details="$dummyModelVariable->name"/>
            <x-bs::desc :term="__('Email')" :details="$dummyModelVariable->email"/>
            <x-bs::desc :term="__('Timezone')" :details="$dummyModelVariable->timezone"/>
            <x-bs::desc :term="__('Email Verified At')" :date="$dummyModelVariable->email_verified_at"/>
            <x-bs::desc :term="__('Created At')" :date="$dummyModelVariable->created_at"/>
            <x-bs::desc :term="__('Updated At')" :date="$dummyModelVariable->updated_at"/>
        </div>
        <div class="modal-footer">
            <x-bs::button :label="__('Close')" color="secondary" dismiss="modal"/>
        </div>
    </div>
</div>
