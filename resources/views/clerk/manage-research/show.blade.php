<x-layout>

    <x-slot:title>
        CatSU InfoHive | Manage Research
    </x-slot:title>


    <div class="card">
        {{--  <div class="card-header">Header</div> --}}
        <div class="card-body p-5">

            @if ($research->confirmed_by_id)
                <a href="{{ route('clerk.manage-research.update', $research->id) }}" data-bs-toggle='tooltip'
                    data-bs-placement='bottom' data-bs-original-title='Click to unconfirm'
                    class="btn btn-sm btn-success show-undo-confirmation ">
                    Confirmed
                </a>
            @else
                <a href="{{ route('clerk.manage-research.update', $research->id) }}" data-bs-toggle='tooltip'
                    data-bs-placement='bottom' data-bs-original-title='Click to confirm'
                    class="btn btn-sm btn-warning show-confirmation">
                    Not confirmed
                </a>
            @endif

            <div class="row align-items-center">
                <div class="col mb-3">
                    <h4 class="card-title py-2 mb-0 fs-2">
                        {{ $research->title . ', ' . $research->year }}
                    </h4>
                </div>
            </div>

            <div class="mb-3">
                <h4 class="card-title py-2 mb-0">Authors</h4>
                <p class="">
                    @foreach ($research->authors as $author)
                        <span class="me-3 fw-bold"> <i class="bx bxs-user"></i>
                            {{ $author->first_name . ' ' . $author->middle_name . ' ' . $author->last_name }}</span>
                    @endforeach
                </p>
            </div>

            <div class="mb-3">
                <h4 class="card-title py-2 mb-0">Abstract</h4>
                <p class="lh-base text-justify"> {{ $research->abstract }}</p>
            </div>

            <div class="mb-3">
                <h4 class="card-title py-2 mb-0">Keywords</h4>
                @foreach ($research->keywords as $keyword)
                    <span class="badge text-bg-primary">{{ $keyword }}</span>
                @endforeach
            </div>

            <div class="mb-3">
                <h4 class="card-title py-2 mb-0">Adviser</h4>
                <p>{{ $research->adviser->first_name . ' ' . $research->adviser->middle_name . ' ' . $research->adviser->last_name }}
                </p>
            </div>
            <div class="mb-3">
                <h4 class="card-title py-2 mb-0">Faculty In Charge</h4>
                <p>{{ $research->facultyInCharge->first_name . ' ' . $research->facultyInCharge->middle_name . ' ' . $research->facultyInCharge->last_name }}
                </p>
            </div>
        </div>
        {{--  <div class="card-footer"> </div> --}}
    </div>


    @push('scripts')
        {{-- Confirm --}}
        <script>
            $(document).on('click', '.show-confirmation', function(e) {
                e.preventDefault();
                var confirmButton = $(this);

                swal.fire({
                    title: 'Confirm Research?',
                    text: 'Confirming this will make it searchable.',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, confirm!',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#0d6efd',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: confirmButton.attr('href'),
                            type: 'PUT',
                            data: {
                                _token: '{{ csrf_token() }}',
                                _method: 'PUT',
                                // Add any additional data you need to send for the update
                            },
                            success: function(response) {
                                location.reload();
                                swal.fire({
                                    title: 'Success!',
                                    text: 'Research confirmed successfully.',
                                    icon: 'success',
                                    confirmButtonColor: '#0d6efd',
                                });
                            },
                            error: function(xhr) {
                                // Handle error response, if any
                            }
                        });
                    }
                });
            });
        </script>

        {{-- Undo Confirmation --}}
        <script>
            $(document).on('click', '.show-undo-confirmation', function(e) {
                e.preventDefault();
                var confirmButton = $(this);

                swal.fire({
                    title: 'Undo confirmation',
                    text: 'Doing this will make this research unsearchable.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, undo!',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: '#0d6efd',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: confirmButton.attr('href'),
                            type: 'PUT',
                            data: {
                                _token: '{{ csrf_token() }}',
                                _method: 'PUT',
                                // Add any additional data you need to send for the update
                            },
                            success: function(response) {
                                location.reload();
                                swal.fire({
                                    title: 'Success!',
                                    text: 'Confirmation undo successfully.',
                                    icon: 'success',
                                    confirmButtonColor: '#0d6efd',
                                });
                            },
                            error: function(xhr) {
                                // Handle error response, if any
                            }
                        });
                    }
                });
            });
        </script>
    @endpush

</x-layout>
