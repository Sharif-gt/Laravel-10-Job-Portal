@extends('frontend.pages.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Login</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-120 login-register">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12 mx-auto">
                    <div class="login-register-cover">
                        <div class="text-center">
                            <h2 class="mb-5 text-brand-1">Login</h2>
                            <p class="font-sm text-muted mb-30">Please enter your details.</p>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="login-register text-start mt-20" method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-3">Email</label>
                                        <input class="form-control" id="input-3" type="email" required=""
                                            name="email" value="{{ old('email') }}" placeholder="Your Email">

                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="input-4">Password</label>
                                            <a href="{{ route('password.request') }}" class="text-primary">Forgot
                                                Password</a>
                                        </div>
                                        <input class="form-control" id="input-4" type="password" required=""
                                            name="password" placeholder="Your password">

                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default hover-up w-100" type="submit" name="login">Login</button>
                            </div>
                            <div class="text-muted text-center">Don't have an account?
                                <a href="{{ route('register') }}">Registration</a>
                            </div>
                        </form>
                        {{-- <div class="text-center mt-20">
                            <div class="divider-text-center"><span>Or continue with</span></div>
                            <button class="btn social-login hover-up mt-20"><img
                                    src="{{ asset('frontend/assets/imgs/template/icons/icon-google.svg') }}"
                                    alt="joblist"><strong>Sign up with
                                    Google</strong></button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mt-120"></div>
@endsection
