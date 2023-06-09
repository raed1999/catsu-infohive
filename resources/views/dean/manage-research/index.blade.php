<x-layout>

    <x-slot:title>
        CatSU InfoHive | Manage Capstone | Thesis
    </x-slot:title>

    <div class="pagetitle">
        <h1>Manage Capstone | Thesis</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item">Manage Capstone | Thesis</li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>
        </nav>
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
