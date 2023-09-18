<x-layout>

    <x-slot:title>
        CatSU InfoHive | Manage Students
    </x-slot:title>

    <div class="row justify-content-between">
        <div class="col">
            <div class="pagetitle">
                <h1>Manage Student</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item">Manage Student</li>
                        <li class="breadcrumb-item active">Overview</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col">
            <div style="width:100% !important" class="card w-100">
                <div class="card-body pt-4">
                    <form action="{{ route('clerk.manage-student.store') }}" method="post" class="form-group"
                        enctype="multipart/form-data">
                        <div class="row mb-3 align-items-center bg-light p-3">
                            <small class="mb-1 text-primary fst-italic">You can mass verify the students by uploading a master
                                list [Excel file].</small>
                            <div class="col-3">
                                @csrf
                                <input type="file" name="import_to_verify" class="form-control form-control-sm">
                            </div>
                            <div class="col-3">
                                <button class="btn btn-sm btn-primary">Import to Verify</button>
                            </div>

                        </div>
                    </form>
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>



    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush

</x-layout>
