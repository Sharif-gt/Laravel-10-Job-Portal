@extends('frontend.pages.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Dashboard</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                            <li>Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="box-nav-tabs nav-tavs-profile mb-5">
                        <ul class="nav" role="tablist">
                            <li><a class="btn btn-border mb-20 active"
                                    href="{{ route('candidate.dashboard') }}">Dashboard</a>
                            </li>
                            <li><a class="btn btn-border mb-20" href="candidate-profile.html">My Profile</a></li>
                            <li><a class="btn btn-border mb-20" href="candidate-profile-jobs.html">My Jobs</a></li>
                            <li><a class="btn btn-border mb-20" href="candidate-profile-save-jobs.html">Saved Jobs</a></li>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <li><a class="btn btn-border mb-20" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">Logout</a>
                                </li>
                            </form>
                        </ul>
                        {{-- <div class="mt-20"><a class="link-red" href="#">Delete Account</a></div> --}}
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <div class="content-single">
                        <h3 class="mt-0 mb-0 color-brand-1">Dashboard</h3>
                        <div class="dashboard_overview">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="dash_overview_item bg-info-subtle">
                                        <h2>12 <span>job applied</span></h2>
                                        <span class="icon"><i class="fas fa-briefcase"></i></span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="dash_overview_item bg-danger-subtle">
                                        <h2>12 <span>job applied</span></h2>
                                        <span class="icon"><i class="fas fa-briefcase"></i></span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="dash_overview_item bg-warning-subtle">
                                        <h2>12 <span>job applied</span></h2>
                                        <span class="icon"><i class="fas fa-briefcase"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-30">
                                    <div class="dash_alert_box p-30 bg-danger rounded-4 d-flex flex-wrap">
                                        <span class="img">
                                            <img src="{{ asset('frontend/assets/imgs/avatar/ava_17.png') }}" alt="alert">
                                        </span>
                                        <div class="text">
                                            <h4>This is demo heading</h4>
                                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem aliquam quasi
                                                deleniti nesciunt
                                                obcaecati labore, magnam suscipit repudiandae corrupti laborum.</p>
                                        </div>
                                        <a href="#" class="btn btn-default rounded-1">Edit Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mt-80"></div>
@endsection