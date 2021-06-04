<div class="modal fade" tabindex="-1" wire:ignore.self>
    @if($component)
        @livewire($component, $params)
    @endif
</div>

@push('scripts')
    <script>
        let element = document.querySelector('.modal');

        Livewire.on('showBootstrapModal', () => {
            let modal = new window.bootstrap.Modal(element, {
                backdrop: 'static',
                keyboard: false,
            });

            modal.show();
        });

        Livewire.on('hideModal', () => {
            let modal = window.bootstrap.Modal.getInstance(element);

            element.addEventListener('hidden.bs.modal', () => {
                Livewire.emit('resetModal');
            });

            modal.hide();
        });
    </script>
@endpush
