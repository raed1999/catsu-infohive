<x-layout>

    <x-slot:title>
        CatSU InfoHive | Manage Colleges
    </x-slot:title>

    <div class="row justify-content-between">
        <div class="col">
            <div class="pagetitle">
                <h1>Manage College</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item">Manage College</li>
                        <li class="breadcrumb-item active">Edit College</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Information</h5>


                    <form class="row g-3" method="POST" action="{{ route('admin.manage-college.update', $college->id) }}"
                        novalidate="">
                        @csrf
                        @method('PATCH')
                        <div class="col-md-12">
                            <label for="code" class="form-label">Code</label>
                            <input type="text" class="form-control" id="code" name="code"
                                value="{{ $college->acroname }}" required="">
                            @error('code')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="college" class="form-label">college</label>
                            <input type="text" class="form-control" id="college" name="college"
                                value="{{ $college->name }}" required="">
                            @error('college')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" name="" type="submit">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-layout>
