@section('title', __('Dummy Model Titles'))

<div class="container my-3">
    <h1>
        @yield('title')
    </h1>

    <div class="row justify-content-between">
        <div class="col-lg-auto mb-3">
            <x-bs::input icon="search" :placeholder="__('Search')" type="search" model="search" debounce="500"/>
        </div>
        <div class="col-lg-auto d-flex gap-2 mb-3">
            <x-bs::button icon="plus" :title="__('Create')" click="$emit('showModal', 'dummy.prefix.save')"/>

            <x-bs::dropdown icon="sort" :label="__($sort)" :title="__('Sort')">
                @foreach($sorts as $sort)
                    <x-bs::dropdown-item :label="__($sort)" click="$set('sort', '{{ $sort }}')"/>
                @endforeach
            </x-bs::dropdown>

            <x-bs::dropdown icon="filter" :label="__($filter)" :title="__('Filter')">
                @foreach($filters as $filter)
                    <x-bs::dropdown-item :label="__($filter)" click="$set('filter', '{{ $filter }}')"/>
                @endforeach
            </x-bs::dropdown>
        </div>
    </div>

    <div class="list-group mb-3">
        @forelse($dummyModelVariables as $dummyModelVariable)
            <div class="list-group-item list-group-item-action">
                <div class="row align-items-center">
                    <div class="col-lg mb-3 mb-lg-0">
                        <x-bs::link :label="$dummyModelVariable->name"
                            click="$emit('showModal', 'dummy.prefix.read', {{ $dummyModelVariable->id }})"/>

                        <p class="small text-muted mb-0">@displayDate($dummyModelVariable->created_at)</p>
                    </div>
                    <div class="col-lg-auto d-flex gap-2">
                        <x-bs::button icon="eye" :title="__('Read')" color="outline-primary" size="sm"
                            click="$emit('showModal', 'dummy.prefix.read', {{ $dummyModelVariable->id }})"/>

                        <x-bs::button icon="pencil-alt" :title="__('Update')" color="outline-primary" size="sm"
                            click="$emit('showModal', 'dummy.prefix.save', {{ $dummyModelVariable->id }})"/>

                        <x-bs::button icon="unlock-alt" :title="__('Password')" color="outline-primary" size="sm"
                            click="$emit('showModal', 'dummy.prefix.password', {{ $dummyModelVariable->id }})"/>

                        <x-bs::button icon="trash-alt" :title="__('Delete')" color="outline-primary" size="sm"
                            click="delete({{ $dummyModelVariable->id }})" confirm/>
                    </div>
                </div>
            </div>
        @empty
            <div class="list-group-item">
                {{ __('No results to display.') }}
            </div>
        @endforelse
    </div>

    <x-bs::pagination :links="$dummyModelVariables"/>
</div>
