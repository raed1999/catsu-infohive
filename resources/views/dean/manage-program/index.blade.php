<x-layout>

    <x-slot:title>
        CatSU InfoHive | Manage Program
    </x-slot:title>

    <div class="row justify-content-between">
        <div class="col">
            <div class="pagetitle">
                <h1>Manage Program</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item">Manage Program</li>
                        <li class="breadcrumb-item active">Overview</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-auto ms-auto">
            <a href="{{ route('dean.manage-program.create') }}" class="btn btn-sm btn-primary mt-2">Add Program</a>
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
