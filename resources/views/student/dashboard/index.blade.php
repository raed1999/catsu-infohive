<x-layout>

    <x-slot:title>
        CatSU InfoHive | Manage Account
    </x-slot:title>

    <div class="row mb-2 justify-content-between">
        <div class="col">
            <h3>Dashboard</h3>
        </div>
        {{-- <div class="col-auto ms-auto">
            <a href="{{ route('dean.manage-clerk.create') }}" class="btn btn-primary">Add Clerk</a>
        </div> --}}
    </div>

 {{--    {{ $user = session('user'); }}
    {{ dd($user) }} --}}

 {{--    <div class="row">
        <div class="col">
            <div style="width:100% !important" class="card w-100">
                <div class="card-body pt-4">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div> --}}

    <h1>Hello student, You are logged in</h1>




  {{--   @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush --}}

</x-layout>
