@extends('layouts.master')
@section('title', 'Projects Recycle Bin')
@section('content')
    <div>
        <h1 class="display-6 fw-bold mb-5">List of Projects</h1>
        <div class="row mb-4">
            <div class="col-6 ms-auto d-flex justify-content-end">
                <button type="button" class="btn btn-outline-custom me-1 d-flex align-items-center" data-bs-toggle="modal"
                    data-bs-target="#restoreMultipleModal">
                    <i class="fa-solid fa-recycle me-2" style="font-size: 20px;"></i>Restore Multiple
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="">
                    <table class="table" id="projectsTable">
                        <thead>
                            <tr>
                                <th class="text-start">Sl.</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="text-center">File</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td class="fw-bold text-start">{{ $loop->index + 1 }}</td>
                                    <td class="fw-bold">{{ $project->name }}</td>
                                    <td class="fw-bold">{{ $project->description }}</td>
                                    <td class="fw-bold text-center">
                                        <img src="{{ asset($project->file) }}" alt="not an image" class="img" width="auto" height="80px">
                                    </td>
                                    <td class="fw-bold text-center">
                                        @if ($project->status === 'active')
                                            <span class="badge text-bg-success px-2">{{ $project->status }}</span>
                                        @elseif($project->status === 'inactive')
                                            <span class="badge text-bg-danger">{{ $project->status }}</span>
                                        @elseif($project->status === 'hold')
                                            <span class="badge text-bg-warning px-3">{{ $project->status }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center fw-bold">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('projects.restore', $project->id) }}" class="restore">
                                                <i class="fa-solid fa-recycle" style="font-size: 20px; color: green"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <div class="modal fade" data-bs-keyboard="false" data-bs-backdrop="static" id="restoreMultipleModal" tabindex="-1"
            aria-labelledby="restoreMultipleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="restoreMultipleModalLabel">Select Projects</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="nameForm">
                            <ul class="name-list" style="list-style:none;">
                                @foreach ($projects as $project)
                                    <li class="fw-bold mb-2 d-flex align-items-center">
                                        <input type="checkbox" class="name-checkbox me-2" value="{{ $project->id }}"
                                            id="check-{{ $project->id }}">
                                        <label class="check-box__label fw-bold" for="check-{{ $project->id }}">{{ $project->name }}</label>
                                    </li>
                                @endforeach
                            </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="submitBtn" class="btn btn-outline-custom">Submit</button>
                    </div>
                    </form>
                </div>
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

            $('body').on('click', '.restore', function(event) {
                event.preventDefault();

                let restoreUrl = $(this).attr('href');

                Swal.fire({
                    title: "Are you sure?",
                    text: "Are you sure, you want to restore it?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#265df1",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, restore it!"
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'GET',
                            url: restoreUrl,

                            success: function(data) {

                                if (data.status == 'success') {
                                    Swal.fire(
                                        'Restored!',
                                        data.message,
                                        'success'
                                    ).then(() => {
                                        window.location.reload();
                                    })
                                } else if (data.status == 'error') {
                                    Swal.fire(
                                        'Cant Restore',
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
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#submitBtn', function(event) {
                event.preventDefault();

                let checkedIds = [];
                $('.name-checkbox:checked').each(function() {
                    checkedIds.push($(this).val());
                });

                if (checkedIds.length === 0) {
                    notyf.open({
                        type: 'warning',
                        message: 'Please select at least one project to restore'
                    });
                    return;
                }


                Swal.fire({
                    title: "Are you sure?",
                    text: "Are you sure, you want to restore all these?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#265df1",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, restore it!"
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'POST',
                            url: "{{ route('projects.restore.multiple') }}",
                            data: {
                                _token: "{{ csrf_token() }}",
                                checked_ids: checkedIds
                            },

                            success: function(data) {

                                if (data.status == 'success') {
                                    Swal.fire(
                                        'Restored!',
                                        data.message,
                                        'success'
                                    ).then(() => {
                                        window.location.reload();
                                    })
                                } else if (data.status == 'error') {
                                    Swal.fire(
                                        'Cant Restore',
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
