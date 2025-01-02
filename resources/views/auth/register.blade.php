@extends('frontend.pages.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Register</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                            <li>Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-120 login-register">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mx-auto">
                    <div class="login-register-cover">
                        <div class="text-center">
                            <h2 class="mb-5 text-brand-1">Register</h2>
                            <p class="font-sm text-muted mb-30">Don't have any account? No problem. Just create a new one.
                            </p>
                        </div>

                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="login-register text-start mt-20" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row">
                                <!-- Name -->
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-1">Full Name</label>
                                        <input class="form-control" id="input-1" type="text" required=""
                                            name="name" placeholder="Your Name" value="{{ old('name') }}">

                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-2">Email</label>
                                        <input class="form-control" id="input-2" type="email" required=""
                                            name="email" value="{{ old('email') }}" placeholder="Your Email">

                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="form-label" for="input-4">Password</label>
                                        <input class="form-control" id="input-4" type="password" required=""
                                            name="password" placeholder="************">

                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="form-label" for="input-5">Confirm Password</label>
                                        <input class="form-control" id="input-5" type="password" required=""
                                            name="password_confirmation" placeholder="************">

                                        @error('password_confirmation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Accounts Type -->
                                <div class="col-12 mb-3">
                                    <hr>
                                    <h6 for="" class="mb-2">Create Account For</h6>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="account_type"
                                            id="typeCandidate" value="candidate">
                                        <label class="form-check-label" for="typeCandidate">Candidate</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="account_type" id="typeCompany"
                                            value="company">
                                        <label class="form-check-label" for="typeCompany">Company</label>
                                    </div>

                                    @error('account_type')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <button class="btn btn-default hover-up w-100" type="submit" name="login">Submit
                                        &amp;
                                        Register</button>
                                </div>
                                <div class="text-muted text-center">Already have an account?
                                    <a href="{{ route('login') }}">Sign in</a>
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
