@extends('layouts.auth')

@section('title', 'Login')
@section('content')
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-md-6 login-box py-5">
                <div class="col-md-12 login-container">
                    <div class="login-container__content ms-auto me-5">
                        <h2 class="text-center">Welcome</h2>
                        <p class="text-center">Let's Login to your account to explore</p>
                        <form class="mt-4" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email"
                                    placeholder="Type your Email" required autofocus />
                            </div>
                            @if ($errors->has('email'))
                                <p class="mb-4" style="color: red">{{ $errors->first('email') }}</p>
                            @endif
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required />
                            </div>
                            @if ($errors->has('banned'))
                                <p class="mb-4" style="color: red">{{ $errors->first('banned') }}</p>
                            @endif
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="remember" />
                                <label class="form-check-label" for="remember" name="remember">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-login w-100">Sign In</button>
                            <div class="text-center mt-3">
                                <a href="#">Forgot password?</a>
                            </div>
                            <div class="text-center mt-3">
                                <p>Haven't joined yet? <a href="#">Register Now</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 bg" style="background-image: url({!! asset('assets/img/login.svg') !!})"></div>
        </div>
    </div>
@endsection
