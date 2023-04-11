<x-layout>

    <x-slot:title>
        CatSU InfoHive | Manage Clerks
    </x-slot:title>

    <h3 class="mb-3">Manage Clerks</h3>

    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Information</h5>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                   {{--  @dd($userInfo) --}}


                    <form class="row g-3 needs-validation" method="POST" action="{{ route('dean.manage-clerk.update', $faculty->id) }}" novalidate="">
                        @csrf
                        @method('PATCH')
                        <div class="col-md-12">
                            <label for="firstName" class="form-label">First name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $faculty->first_name }}"
                                required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="middleName" class="form-label">Middle name</label>
                            <input type="text" class="form-control" id="middleName" name="middleName" value="{{ $faculty->middle_name }}"
                                required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="lastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $faculty->last_name }}"
                                required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                     {{--    <div class="col-md-12">
                            <label for="validationDefault04" class="form-label">College</label>
                            <select class="form-select" id="validationDefault04" name="college" required="">
                                <option {{ ($faculty->college_id == 0) ? 'selected' : '' }} selected="" disabled="" value="">Choose...</option>
                                <option {{ ($faculty->college_id == 2) ? 'selected' : '' }} value="2">College Of Engineering and Architecture (CEA)</option>
                                <option {{ ($faculty->college_id == 3) ? 'selected' : '' }} value="3">College Of Industrial Technology (CIT)</option>
                                <option {{ ($faculty->college_id == 4) ? 'selected' : '' }} value="4">College Of Information and Communications Technology (CICT)</option>
                            </select>
                        </div> --}}
                        <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ $faculty->email }}" required disabled>
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
