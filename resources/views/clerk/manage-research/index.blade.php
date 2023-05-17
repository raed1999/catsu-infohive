<x-layout>

    <x-slot:title>
        CatSU InfoHive | Manage Research
    </x-slot:title>

    <div class="row mb-2 justify-content-center">
        <div class="col">
            <h3>Manage Research</h3>
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

            {{-- Confirm --}}
            <script>
                $(document).on('click', '.show-confirmation', function(e) {
                    e.preventDefault();
                    var confirmButton = $(this);

                    swal.fire({
                        title: 'Confirm Research?',
                        text: 'Confirming this will make it researchable.',
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
                                    $('#research-table').DataTable().draw();
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
                                    $('#research-table').DataTable().draw();
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

            {{-- Datatable JS --}}
            <script>
                $(document).ready(function() {
                    $('#research-table').DataTable({
                        retrieve: true,
                        'order': [[0, "asc"]]
                    });
                });
            </script>
        @endpush
</x-layout>
