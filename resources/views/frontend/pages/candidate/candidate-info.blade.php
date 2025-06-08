@extends('frontend.pages.layouts.master')
@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Candidate Info</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>Candidate Info</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box-2">
        <div class="container">
            <div class="banner-image-single" style="width: 200px;height: 200px;object-fit: cover;"><img
                    src="{{ asset($candidateInfo?->image) }}" alt="joblist">
            </div>
            <div class="box-company-profile">
                <div class="row mt-10">
                    <div class="col-lg-8 col-md-12">
                        <h5 class="f-18">{{ $candidateInfo?->full_name }} <span
                                class="card-location font-regular ml-20">{{ $candidateInfo?->candidateState?->name }},
                                {{ $candidateInfo?->candidateCountry?->name }}</span>
                        </h5>
                        <p class="mt-0 font-md color-text-paragraph-2 mb-15">{{ $candidateInfo?->profession->name }} |
                            {{ $candidateInfo?->title }}</p>
                    </div>
                    <div class="col-lg-4 col-md-12 text-lg-end"><a class="btn btn-download-icon btn-apply btn-apply-big"
                            href="page-contact.html">Download CV</a></div>
                </div>
            </div>
            <div class="border-bottom pt-10 pb-10"></div>
        </div>
    </section>

    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="content-single">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-short-bio" role="tabpanel"
                                aria-labelledby="tab-short-bio">
                                <h4>About Me</h4>
                                <p>{!! $candidateInfo?->bio !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-related-job content-page   cadidate_details_list">
                        <!--Experience-->
                        <div class="mt-5 mb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Experience</h4>
                                    <ul class="timeline">
                                        @foreach ($candidateInfo?->experience as $item)
                                            <li>
                                                <a href="#" class="float-right">{{ formatDate($item?->start) }} -
                                                    {{ $item?->currently_working ? 'Current' : formatDate($item?->end) }}</a>
                                                <a href="javascript:;">{{ $item?->designation }}</a>
                                                <span>|
                                                    <a href="javascript:;">{{ $item?->department }}</a></span>
                                                <p>{{ $item?->company }}</p>
                                                <p>{{ $item?->responsibility }}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--Education-->
                        <div class="mt-5 mb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Education</h4>
                                    <ul class="timeline">
                                        @foreach ($candidateInfo?->education as $item)
                                            <li>
                                                <a href="#" class="float-right">{{ $item?->year }}</a>
                                                <p>{{ $item?->level }}</p>
                                                <p>{{ $item?->degree }}</p>
                                                <p>{{ $item?->note }}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                    <div class="sidebar-border">
                        <h5 class="f-18">Overview</h5>
                        <div class="sidebar-list-job">
                            <ul>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description">Experience</span><strong
                                            class="small-heading">{{ $candidateInfo?->experienceYear?->name }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-dollar"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description">Gender
                                            Salary</span><strong
                                            class="small-heading">{{ $candidateInfo?->gender }}</strong></div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description">Marital
                                            Status</span><strong
                                            class="small-heading">{{ $candidateInfo?->marital_status }}</strong></div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description">Skills</span><br>
                                        @foreach ($candidateInfo?->skill as $item)
                                            <span class="badge bg-info text-light">{{ $item?->skillName->name }}</span>
                                        @endforeach
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description">Language</span><br>
                                        @foreach ($candidateInfo?->language as $item)
                                            <span class="badge bg-info text-light">{{ $item?->lanName?->name }}</span>
                                        @endforeach
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description">Status</span><strong
                                            class="small-heading">{{ $candidateInfo?->status }}</strong></div>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-list-job">
                            <ul class="ul-disc">
                                <li>{{ $candidateInfo?->address }}
                                    {{ $candidateInfo?->candidateCity->name ? ', ' . $candidateInfo?->candidateCity->name : '' }}
                                    {{ $candidateInfo?->candidateState->name ? ', ' . $candidateInfo?->candidateState->name : '' }}
                                    {{ $candidateInfo?->candidateCountry->name ? ', ' . $candidateInfo?->candidateCountry->name : '' }}
                                </li>
                                <li>Phone: {{ $candidateInfo?->phone_one }}</li>
                            </ul>
                            <div class="mt-30"><a class="btn btn-send-message" href="">Send Message</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
