<x-layout>

    <x-slot:title>
        CatSU InfoHive | Manage Programs
    </x-slot:title>

    <div class="row justify-content-between">
        <div class="col">
            <div class="pagetitle">
                <h1>Manage Program</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item">Manage Program</li>
                        <li class="breadcrumb-item active">Add Program</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Input Information</h5>

                    <form class="row g-3" method="POST" action="{{ route('dean.manage-program.store') }}" novalidate="">
                        @csrf
                        <div class="col-md-12">
                            <label for="code" class="form-label">Code</label>
                            <input type="text" class="form-control" id="code" name="code"
                                value="{{ old('code') }}" required="">
                            @error('code')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="program" class="form-label">Program</label>
                            <input type="text" class="form-control" id="program" name="program"
                                value="{{ old('program') }}" required="">
                            @error('program')
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
