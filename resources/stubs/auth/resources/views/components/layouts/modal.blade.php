<div {{ $attributes->merge(['class' => 'modal-dialog']) }}>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">
                @yield('title')
            </h5>

            <x-bs::close wire:click="$emit('hideModal')"/>
        </div>

        {{ $slot }}
    </div>
</div>
