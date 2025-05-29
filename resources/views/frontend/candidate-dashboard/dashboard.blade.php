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
                <!-- Sidebar -->
                @include('frontend.candidate-dashboard.layouts.sidebar')

                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <div class="content-single">
                        <h3 class="mt-0 mb-0 color-brand-1">Dashboard</h3>
                        <div class="dashboard_overview">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="dash_overview_item bg-info-subtle">
                                        <h2>{{ $totalAppliedJobs }} <span>job apply</span></h2>
                                        <span class="icon"><i class="fas fa-briefcase"></i></span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="dash_overview_item bg-danger-subtle">
                                        <h2>{{ $totalBookmarkedJobs }} <span>job bookmarked</span></h2>
                                        <span class="icon"><i class="fas fa-briefcase"></i></span>
                                    </div>
                                </div>
                            </div>
                            @if (!candidateProfileCompletion())
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
                                            <a href="{{ route('candidate.profile') }}"
                                                class="btn btn-default rounded-1">Edit Profile</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="content-single">
                        <h3 class="mt-60 mb-0 color-brand-1">Recent Applied Job </h3>
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>Company</th>
                                    <th>Title</th>
                                    <th>Applied Date</th>
                                    <th>Job Status</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody class="experience-tbody">
                                @forelse ($letestAppliedJob as $item)
                                    <tr>
                                        <td>{{ $item?->job?->company?->name }}</td>
                                        <td>{{ $item?->job?->title }}</td>
                                        <td>{{ formatDate($item?->created_at) }}</td>
                                        <td>
                                            @if ($item?->job?->deadline > date('Y-m-d'))
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-denger">Expire</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('all.jobs.detail', $item?->job?->slug) }}"
                                                class="btn btn-primary editExperience"><i class="fas fa-edit"
                                                    aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No Result Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mt-80"></div>
@endsection
