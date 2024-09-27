@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
    <div>
        <h1 class="fw-bold">Hi {{ Auth::user()->name }}</h1>
        <p class="fw-bold">Welcome to the dashboard</p>
    </div>
@endsection
