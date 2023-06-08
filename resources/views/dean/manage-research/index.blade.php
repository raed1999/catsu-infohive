<x-layout>

    <x-slot:title>
        CatSU InfoHive | Manage Research
    </x-slot:title>

    <div class="row mb-2 justify-content-center">
        <div class="col">
            <h3>Manage Research</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div style="width:100% !important" class="card w-100">
                <div class="card-body pt-4">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
</x-layout>
