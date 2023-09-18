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
                        <li class="breadcrumb-item active">Add Dean</li>
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

                    <form class="row g-3" method="POST" action="{{ route('admin.manage-dean.store') }}" novalidate="">
                        @csrf
                        <div class="col-md-12">
                            <label for="firstName" class="form-label">First name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName"
                                value="{{ old('firstName') }}" required="">
                            @error('firstName')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="col-md-12">
                            <label for="middleName" class="form-label">Middle name</label>
                            <input type="text" class="form-control" id="middleName" name="middleName"
                                value="{{ old('middleName') }}" required="">
                            @error('middleName')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="lastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName"
                                value="{{ old('lastName') }}" required="">
                            @error('lastName')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="college" class="form-label">College</label>
                            <select class="form-select" id="college" name="college" required="">
                                <option @if (old('college') == 0) selected @endif selected="" value="">Choose...</option>
                                @foreach ($colleges as $college)
                                    <option @if (old('college') == $college->id) selected @endif
                                        value="{{ $college->id }}">{{ $college->name }} ({{ $college->acroname }})
                                    </option>
                                @endforeach
                            </select>
                            @error('college')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required=""
                                value="{{ old('email') }}">
                            @error('email')
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
