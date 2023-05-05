<x-layout>


    <x-slot:title>
        CatSU InfoHive | Manage Deans
    </x-slot:title>

    <div class="row mb-2 justify-content-between">
        <div class="col">
            <h3>Manage Deans</h3>
        </div>
        <div class="col-auto ms-auto">
            <a href="{{ route('admin.manage-dean.create') }}" class="btn btn-primary">Add Dean</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div style="width:100% !important" class="card w-auto">
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
