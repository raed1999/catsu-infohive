<x-layout>

    <x-slot:title>
        CatSU InfoHive | Manage Students
    </x-slot:title>

    <div class="row mb-2 justify-content-between">
        <div class="col">
            <h3>Manage Students</h3>
        </div>
       {{--  <div class="col-auto ms-auto">
            <a href="{{ route('clerk.manage-student.create') }}" class="btn btn-primary">Add Clerk</a>
        </div> --}}
    </div>

 {{--    {{ $user = Auth::user(); }}
    {{ dd($user) }} --}}

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
