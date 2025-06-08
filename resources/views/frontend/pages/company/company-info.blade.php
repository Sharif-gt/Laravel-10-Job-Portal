@extends('frontend.pages.layouts.master')
@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Company Info</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>Company Info</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box-2">
        <div class="container">
            <div class="banner-hero banner-image-single"><img style="height: 374px; object-fit: cover;"
                    src="{{ asset($company?->banner) }}" alt="joblist"></div>
            <div class="box-company-profile">
                <div class="row mt-10">
                    <div class="col-lg-8 col-md-12">
                        <h5 class="f-18">{{ $company?->name }} <span
                                class="card-location font-regular ml-20">{{ $company?->companyCity->name }},
                                {{ $company?->companyCountry->name }}</span></h5>
                    </div>
                </div>
            </div>
            <div class="box-nav-tabs mt-40 mb-5">
                <ul class="nav" role="tablist">
                    <li><a class="btn btn-border  recruitment-icon mr-15 mb-5 active" href="#tab-about" data-bs-toggle="tab"
                            role="tab" aria-controls="tab-about" aria-selected="true">About us</a></li>
                </ul>
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
                            <div class="tab-pane fade show active" id="tab-about" role="tabpanel"
                                aria-labelledby="tab-about">
                                <p>{!! $company?->bio !!}</p>

                                <h4>Company Vision </h4>
                                <p>{!! $company?->vision !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-related-job content-page">
                        <h5 class="mb-30">Latest Jobs</h5>
                        <div class="box-list-jobs display-list">
                            @forelse ($openJob as $job)
                                <div class="col-xl-12 col-12">
                                    <div class="card-grid-2 hover-up"><span class="flash"></span>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="card-grid-2-image-left">
                                                    <div class="image-box"><img src="{{ asset($job?->company?->logo) }}"
                                                            alt="joblist"></div>
                                                    <div class="right-info"><a class="name-job"
                                                            href="{{ route('companies.page', $job?->company?->slug) }}">{{ $job?->company?->name }}</a><span
                                                            class="location-small">{{ $job?->jobCountry?->name }},
                                                            {{ $job?->jobState?->name }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                                <div class="pl-15 mb-15 mt-30">
                                                    @if ($job?->highlight)
                                                        <a class="btn btn-grey-small mr-5" href="javascropt:;">Highlight</a>
                                                    @endif
                                                    @if ($job?->featured)
                                                        <a class="btn btn-grey-small mr-5" href="javascropt:;">Featured</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <h4><a
                                                    href="{{ route('all.jobs.detail', $job?->slug) }}">{{ $job?->title }}</a>
                                            </h4>
                                            <div class="mt-5"><span
                                                    class="card-briefcase">{{ $job?->jobType?->name }}</span><span
                                                    class="card-time"><span>{{ $job?->created_at->diffForHumans() }}</span></span>
                                            </div>
                                            <p class="font-sm color-text-paragraph mt-10">
                                                {!! Str::limit($job?->description, 230) !!}</p>
                                            <div class="pl-15 mb-15 mt-30">
                                                @foreach ($job?->jobSkill as $skill)
                                                    @if ($loop->index <= 2)
                                                        <a class="btn btn-grey-small mr-5 job-skill"
                                                            href="javascript:;">{{ $skill?->skillName?->name }}</a>
                                                    @elseif ($loop->index == 3)
                                                        <a class="btn btn-grey-small mr-5" href="javascript:;">More...</a>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7">
                                                        @if ($job?->salary_mode === 'range')
                                                            <span class="card-text-price">Salary: {{ $job?->min_salary }} -
                                                                {{ $job?->max_salary }}
                                                                {{ config('generalSetting.site_default_currency') }}</span>
                                                            <span class="text-muted">/{{ $job?->salaryType?->name }}</span>
                                                        @elseif ($job?->salary_mode === 'custom')
                                                            <span class="card-text-price">Salary:
                                                                {{ $job?->custom_salary }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-5 col-5 text-end">
                                                        <div class="btn">
                                                            <i class="far fa-bookmark"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-xl-12 col-12 card-2-bottom mt-20">No Data Found</div>
                            @endforelse

                        </div>
                        <div class="paginations mt-60">
                            <ul class="pager">
                                @if ($openJob->hasPages())
                                    {{ $openJob->withQueryString()->links() }}
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                    <div class="sidebar-border">
                        <div class="sidebar-heading">
                            <div class="avatar-sidebar">
                                <div class="sidebar-info pl-0"><span
                                        class="sidebar-company">{{ $company?->name }}</span><span
                                        class="card-location">{{ $company?->companyCity->name }},
                                        {{ $company?->companyCountry->name }}</span></div>
                            </div>
                        </div>
                        <div class="sidebar-list-job">
                            <div class="box-map">{!! $company?->map_link !!}</div>
                        </div>
                        <div class="sidebar-list-job">
                            <ul>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description">Company
                                            field</span><strong
                                            class="small-heading">{{ $company?->industryType?->name }}</strong></div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description">Organization
                                            Type</span><strong
                                            class="small-heading">{{ $company?->organizationType?->name }}</strong></div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description">Location</span><strong
                                            class="small-heading">{{ $company?->companyCity->name }},
                                            {{ $company?->companyCountry->name }}</strong></div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-dollar"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description">Team Size</span><strong
                                            class="small-heading">{{ $company?->teamSize?->name }}</strong></div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-clock"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description">Member
                                            since</span><strong
                                            class="small-heading">{{ formatDate($company?->establishment_date) }}</strong>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-list-job">
                            <ul class="ul-disc">
                                <li>{{ $company?->address }}
                                    {{ $company?->companyCity?->name ? ', ' . $company?->companyCity?->name : '' }}
                                    {{ $company?->companyState?->name ? ', ' . $company?->companyState?->name : '' }}
                                    {{ $company?->companyCountry?->name ? ', ' . $company?->companyCountry?->name : '' }}
                                </li>
                                <li>{{ $company?->phone }}</li>
                                <li>{{ $company?->email }}</li>
                            </ul>
                            <div class="mt-30"><a class="btn btn-send-message"
                                    href="mailto:{{ $company?->email }}">Send Message</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
