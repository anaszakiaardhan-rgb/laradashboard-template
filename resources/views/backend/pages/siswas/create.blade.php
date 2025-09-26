<x-layouts.backend-layout :breadcrumbs="$breadcrumbs">
    <x-card>
        <form method="POST" action="{{ route('admin.siswas.store') }}">
            @csrf
            @include('backend.pages.siswas.partials.form', [
                'siswa' => null,
                'mode' => 'create',
                'cancelUrl' => route('admin.siswas.index'),
            ])
        </form>
    </x-card>
</x-layouts.backend-layout>
