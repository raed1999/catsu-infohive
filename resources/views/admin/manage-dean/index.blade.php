<x-layout>


    <x-slot:title>
        CatSU InfoHive | Manage Deans
    </x-slot:title>

    <div class="row justify-content-between">
        <div class="col">
            <div class="pagetitle">
                <h1>Manage Dean</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item">Manage Dean</li>
                        <li class="breadcrumb-item active">Overview</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-auto ms-auto">
            <a href="{{ route('admin.manage-dean.create') }}" class="btn btn-sm mt-2 btn-primary">Add Dean</a>
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
