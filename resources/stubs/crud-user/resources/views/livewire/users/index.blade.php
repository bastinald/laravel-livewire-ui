@section('title', __('Users'))

<x-layouts.page>
    <div class="d-lg-flex justify-content-between">
        <x-bs::input type="search" prependIcon="search" :placeholder="__('Search')"
            wire:model.debounce.500ms="search"/>

        <div class="d-flex gap-2 mb-3">
            <x-bs::button type="button" icon="plus" :title="__('Create')"
                wire:click="$emit('showModal', 'users.save')"/>

            <x-bs::dropdown icon="sort" :label="__($sort)" :title="__('Sort')">
                @foreach($sorts as $sort)
                    <x-bs::dropdown-item type="button" :label="__($sort)"
                        wire:click="$set('sort', '{{ $sort }}')"/>
                @endforeach
            </x-bs::dropdown>

            <x-bs::dropdown icon="filter" :label="__($filter)" :title="__('Filter')">
                @foreach($filters as $filter)
                    <x-bs::dropdown-item type="button" :label="__($filter)"
                        wire:click="$set('filter', '{{ $filter }}')"/>
                @endforeach
            </x-bs::dropdown>
        </div>
    </div>

    <div class="list-group mb-3">
        @forelse($users as $user)
            <div class="d-grid d-lg-flex align-items-center list-group-item list-group-item-action gap-2">
                <div class="col-lg">
                    {{ $user->name }}
                    <small class="d-block text-muted">{{ $user->email }}</small>
                </div>
                <div class="d-flex col-lg-auto gap-2">
                    <x-bs::button type="button" icon="eye" :title="__('Read')" color="link" class="p-0"
                        wire:click="$emit('showModal', 'users.read', {{ $user->id }})"/>

                    <x-bs::button type="button" icon="pencil-alt" :title="__('Update')" color="link" class="p-0"
                        wire:click="$emit('showModal', 'users.save', {{ $user->id }})"/>

                    <x-bs::button type="button" icon="lock" :title="__('Password')" color="link" class="p-0"
                        wire:click="$emit('showModal', 'users.password', {{ $user->id }})"/>

                    <x-bs::button type="button" icon="trash-alt" :title="__('Delete')" color="link" class="p-0"
                        onclick="confirm('{{ __('Are you sure?') }}') || event.stopImmediatePropagation()"
                        wire:click="delete({{ $user->id }})"/>
                </div>
            </div>
        @empty
            <div class="list-group-item">
                {{ __('No results found.') }}
            </div>
        @endforelse
    </div>

    <x-bs::pagination :links="$users" justify="end"/>
</x-layouts.page>
