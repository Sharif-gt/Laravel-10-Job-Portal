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

                <!-- Sideber -->
                @include('frontend.company-dashboard.layouts.sidebar')

                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <div class="content-single">
                        <h3 class="mt-0 mb-0 color-brand-1">Dashboard</h3>
                        <div class="dashboard_overview">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="dash_overview_item bg-info-subtle">
                                        <h2>{{ $totalJobPost }} <span>Total Job Post</span></h2>
                                        <span class="icon"><i class="fas fa-briefcase"></i></span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="dash_overview_item bg-danger-subtle">
                                        <h2>{{ $pendingJobs }} <span>Pending Jobs</span></h2>
                                        <span class="icon"><i class="fas fa-briefcase"></i></span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="dash_overview_item bg-warning-subtle">
                                        <h2>{{ $totalPackegeBuy }} <span>Total packeg buy</span></h2>
                                        <span class="icon"><i class="fas fa-briefcase"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-60">
                                <div class="card">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Current Package</td>
                                                <td>{{ $planDetails?->price?->lable }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Job Post Available</td>
                                                <td>{{ $planDetails?->job_limit }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Featured Post Available</td>
                                                <td>{{ $planDetails?->featured_job_limit }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Highlight Post Available</td>
                                                <td>{{ $planDetails?->highlight_job_limit }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            @if (!companyProfileCompletion())
                                <div class="row">
                                    <div class="col-12 mt-30">
                                        <div class="dash_alert_box p-30 bg-danger rounded-4 d-flex flex-wrap">
                                            <span class="img">
                                                <img src="{{ asset(auth()->user()->profile_img) }}" alt="alert">
                                            </span>
                                            <div class="text">
                                                <h4>WARNING: You have to complete your company profile first!</h4>
                                                <p>Please complete your company profile to use all the features.</p>
                                            </div>
                                            <a href="{{ route('company.profile') }}" class="btn btn-default rounded-1">Edit
                                                Profile</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mt-80"></div>
@endsection
