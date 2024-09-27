@extends('layouts.master')
@section('title', 'Create a project')


@section('content')
    <div>
        <h4>Edit a project in this page</h4>
        <div class="row">
            <div class="col col-12 col-md-8 col-lg-8 col-xl-8 mx-auto mt-5 ">
                <h5 class="boat__booking-title">Edit the project: {{ $project->name }}</h5>
                <form class="card p-3" action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col col-12 col-md-6 col-lg-6 col-xl-6 mb-3">
                            <div class="form-floating mb-3">
                                <input class="form-control fw-bold" style="color: #004165" type="text" name="name" id="name"
                                    value="{{ $project->name }}" placeholder="Name" required>
                                <label for="name">Name of the project</label>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="staff" style="color: #004165; font-weight: 600;">Assign Staff</label>
                                <select class="form-select" id="staff" name="staff">
                                    <option selected>Choose...</option>
                                    @foreach ($users as $user)
                                        <option class="fw-bold" style="color: #004165"
                                            {{ $project->users[0]['id'] === $user->id ? 'selected' : '' }} value="{{ $user->id }}">
                                            {{ $user->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="status" style="color: #004165; font-weight: 600;">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option selected>Choose...</option>
                                    @foreach ($statuses as $key => $status)
                                        <option class="fw-bold" style="color: #004165" {{ $project->status === $status ? 'selected' : '' }}
                                            value="{{ $status }}">
                                            {{ $key }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-floating">
                                <textarea class="form-control fw-bold" style="color: #004165" name="description" id="description" placeholder="description" rows="4"
                                    style="height: 160px">{{ $project->description }}</textarea>
                                <label for="description">Description of the project</label>
                            </div>
                        </div>
                        <div class="col col-12 col-md-6 col-lg-6 col-xl-6 mb-3">
                            <div class="h-100 mb-3 d-flex justify-content-between flex-column">
                                <div class="col-md-12 d-flex justify-content-center" id="preview">
                                    <img src="{{ asset($project->file) }}" alt="not an image" class="fixed-size">
                                </div>
                                <input class="form-control" type="file" id="file" name="file">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 ms-auto d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-custom">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
