<x-layouts.backend-layout :breadcrumbs="$breadcrumbs">
    <x-card>
        <form method="POST" action="{{ route('admin.siswas.update', $siswa->id) }}">
            @csrf
            @method('PUT')
            @include('backend.pages.siswas.partials.form', [
                'siswa' => $siswa,
                'mode' => 'edit',
                'cancelUrl' => route('admin.siswas.index'),
            ])
        </form>
    </x-card>
</x-layouts.backend-layout>