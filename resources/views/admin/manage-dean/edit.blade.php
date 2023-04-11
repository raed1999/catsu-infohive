<x-layout>

    <x-slot:title>
        CatSU InfoHive | Manage Deans
    </x-slot:title>

    <h3 class="mb-3">Manage Deans</h3>

    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Information</h5>

                    <form class="row g-3" method="POST" action="{{ route('admin.manage-dean.update', $faculty->id) }}"
                        novalidate="">
                        @csrf
                        @method('PATCH')
                        <div class="col-md-12">
                            <label for="firstName" class="form-label">First name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName"
                                value="{{ $faculty->first_name }}" required="">
                            @error('firstName')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="middleName" class="form-label">Middle name</label>
                            <input type="text" class="form-control" id="middleName" name="middleName"
                                value="{{ $faculty->middle_name }}" required="">
                            @error('middleName')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="lastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName"
                                value="{{ $faculty->last_name }}" required="">
                            @error('lastName')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="validationDefault04" class="form-label">College</label>
                            <select class="form-select" id="validationDefault04" name="college" required="">
                                <option @if ($faculty->college_id == 0) selected @endif value="0">Choose...
                                </option>
                                @foreach ($colleges as $college)
                                    <option @if ($faculty->college_id == $college->id) selected @endif
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
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ $faculty->email }}" required disabled>
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
