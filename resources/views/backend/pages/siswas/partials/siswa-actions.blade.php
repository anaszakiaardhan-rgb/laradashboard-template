@if (auth()->user()->can('update', $siswa) || auth()->user()->can('delete', $siswa))
    <x-buttons.action-buttons :label="__('Actions')" :show-label="false" align="right">
        @can('update', $siswa)
            <x-buttons.action-item
                :href="route('admin.siswas.edit', $siswa->id)"
                icon="lucide:pencil"
                :label="__('Edit')"
            />
        @endcan

        @can('delete', $siswa)
            <div x-data="{ deleteModalOpen: false }">
                <x-buttons.action-item
                    type="modal-trigger"
                    modal-target="deleteModalOpen"
                    icon="lucide:trash"
                    :label="__('Delete')"
                    class="text-red-600 dark:text-red-400"
                />

                <x-modals.confirm-delete
                    id="delete-modal-{{ $siswa->id }}"
                    title="{{ __('Delete Siswa') }}"
                    content="{{ __('Are you sure you want to delete this siswa?') }}"
                    formId="delete-form-{{ $siswa->id }}"
                    formAction="{{ route('admin.siswas.destroy', $siswa->id) }}"
                    modalTrigger="deleteModalOpen"
                    cancelButtonText="{{ __('No, cancel') }}"
                    confirmButtonText="{{ __('Yes, Confirm') }}"
                />
            </div>
        @endcan
    </x-buttons.action-buttons>
@endif
