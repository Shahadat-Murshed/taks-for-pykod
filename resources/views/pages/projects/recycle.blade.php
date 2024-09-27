@extends('layouts.master')
@section('title', 'Projects')
@section('content')
    <div>
        <h1 class="display-6 fw-bold mb-5">List of Projects</h1>
        <div class="row mb-4">
            <div class="col-6 ms-auto d-flex justify-content-end">
                <a href="{{ route('projects.create') }}" class="btn btn-outline-custom me-1">
                    <i class="fa-solid fa-plus me-2"></i>Create New
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table" id="projectsTable">
                    <thead>
                        <tr>
                            <th>Sl.</th>
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
                                <td class="fw-bold">{{ $loop->index + 1 }}</td>
                                <td class="fw-bold">{{ $project->name }}</td>
                                <td class="fw-bold">{{ $project->description }}</td>
                                <td class="fw-bold text-center">
                                    <img src="{{ asset($project->file) }}" alt="Not an Image" class="img" width="auto" height="80px">
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
                                            <i class="fa-regular fa-trash-can" style="color: red; font-size:20px"></i>
                                        </a>
                                    </div>
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
            });
        });
    </script>
@endpush
