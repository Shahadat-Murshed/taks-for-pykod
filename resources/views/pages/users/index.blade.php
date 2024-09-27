@extends('layouts.master')
@section('title', 'Users')
@section('content')
    <div>
        <h1 class="display-6 fw-bold mb-5">List of User</h1>
        <div class="row">
            <div class="col-12">
                <table class="table" id="projectsTable">
                    <thead>
                        <tr>
                            <th class="text-start">Sl.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th class="text-center">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="fw-bold text-start">{{ $loop->index + 1 }}</td>
                                <td class="fw-bold">{{ $user->name }}</td>
                                <td class="fw-bold">{{ $user->email }}</td>
                                <td class="fw-bold text-center">
                                    @if ($user->role === 'admin')
                                        <span class="badge text-bg-success px-2">{{ $user->role }}</span>
                                    @else
                                        <span class="badge text-bg-warning px-3">{{ $user->role }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#projectsTable').DataTable({
                responsive: true,
                columnDefs: [{
                    width: '5%',
                    targets: 0
                }]
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '.delete', function(event) {
                event.preventDefault();

                let deleteUrl = $(this).attr('href');

                Swal.fire({
                    title: "Are you sure?",
                    text: "Are your sure you want to delete this?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#265df1",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'DELETE',
                            url: deleteUrl,

                            success: function(data) {

                                if (data.status == 'success') {
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    ).then(() => {
                                        window.location.reload();
                                    })
                                } else if (data.status == 'error') {
                                    Swal.fire(
                                        'Cant Delete',
                                        data.message,
                                        'error'
                                    )
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        })
                    }
                });
            })
        })
    </script>
@endpush
