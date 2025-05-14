@extends('frontend.pages.layouts.master')
@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Job Details</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('home') }}">Home</a></li>
                            <li>Job Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box-2">
        <div class="container">
            <div class="banner-hero banner-image-single"><img style="height: 450px; object-fit: cover;"
                    src="{{ asset($jobs?->company?->banner) }}" alt="joblist">
            </div>
            <div class="row mt-10">
                <div class="col-lg-8 col-md-12">
                    <h3>{{ $jobs?->title }}</h3>
                    <div class="mt-0 mb-15"><span class="card-briefcase">{{ $jobs?->jobType?->name }}</span><span
                            class="card-time">{{ $jobs?->created_at->diffForHumans() }}</span></div>
                </div>
                <div class="col-lg-4 col-md-12 text-lg-end">
                    @if ($jobApplied)
                        <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up" id="postJob"
                            style="background-color: #301ca7">
                            Applied</div>
                    @else
                        <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up" id="postJob">Apply now</div>
                    @endif
                </div>
            </div>
            <div class="border-bottom pt-10 pb-10"></div>
        </div>
    </section>

    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="job-overview">
                        <h5 class="border-bottom pb-15 mb-30">Employment Information</h5>
                        <div class="row">
                            <div class="col-md-6 d-flex">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('frontend/assets/imgs/page/job-single/industry.svg') }}"
                                        alt="joblist">
                                </div>
                                <div class="sidebar-text-info ml-10"><span
                                        class="text-description industry-icon mb-10">Industry</span><strong
                                        class="small-heading">{{ $jobs?->jobCategory?->name }}</strong></div>
                            </div>
                            <div class="col-md-6 d-flex mt-sm-15">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('frontend/assets/imgs/page/job-single/job-level.svg') }}"
                                        alt="joblist">
                                </div>
                                <div class="sidebar-text-info ml-10"><span class="text-description joblevel-icon mb-10">Job
                                        level</span><strong class="small-heading">{{ $jobs?->jobRole?->name }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-25">
                            <div class="col-md-6 d-flex mt-sm-15">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('frontend/assets/imgs/page/job-single/salary.svg') }}" alt="joblist">
                                </div>
                                <div class="sidebar-text-info ml-10">
                                    @if ($jobs?->salary_mode === 'range')
                                        <span class="text-description salary-icon mb-10">Salary:</span>
                                        <strong class="small-heading">{{ $jobs?->min_salary }} -
                                            {{ $jobs?->max_salary }}
                                            {{ config('generalSetting.site_default_currency') }}
                                        </strong>
                                        <span style="margin-left: 4px"
                                            class="text-bold">{{ $jobs?->salaryType?->name }}</span>
                                    @elseif ($jobs?->salary_mode === 'custom')
                                        <span class="text-description salary-icon mb-10">Salary:</span>
                                        <strong class="small-heading">{{ $jobs?->custom_salary }}</strong>
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('frontend/assets/imgs/page/job-single/experience.svg') }}"
                                        alt="joblist">
                                </div>
                                <div class="sidebar-text-info ml-10"><span
                                        class="text-description experience-icon mb-10">Experience</span><strong
                                        class="small-heading">{{ $jobs?->jobExperience?->name }}</strong></div>
                            </div>
                        </div>
                        <div class="row mt-25">
                            <div class="col-md-6 d-flex mt-sm-15">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('frontend/assets/imgs/page/job-single/job-type.svg') }}"
                                        alt="joblist">
                                </div>
                                <div class="sidebar-text-info ml-10"><span class="text-description jobtype-icon mb-10">Job
                                        type</span><strong class="small-heading">{{ $jobs?->jobType?->name }}</strong>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex mt-sm-15">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('frontend/assets/imgs/page/job-single/deadline.svg') }}"
                                        alt="joblist">
                                </div>
                                <div class="sidebar-text-info ml-10"><span
                                        class="text-description mb-10">Deadline</span><strong
                                        class="small-heading">{{ formatDate($jobs?->deadline) }}</strong></div>
                            </div>
                        </div>
                        <div class="row mt-25">
                            <div class="col-md-6 d-flex mt-sm-15">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('frontend/assets/imgs/page/job-single/updated.svg') }}"
                                        alt="joblist"></div>
                                <div class="sidebar-text-info ml-10"><span
                                        class="text-description jobtype-icon mb-10">Updated</span><strong
                                        class="small-heading">{{ formatDate($jobs?->created_at) }}</strong></div>
                            </div>
                            <div class="col-md-6 d-flex mt-sm-15">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('frontend/assets/imgs/page/job-single/location.svg') }}"
                                        alt="joblist">
                                </div>
                                <div class="sidebar-text-info ml-10"><span
                                        class="text-description mb-10">Location</span><strong
                                        class="small-heading">{{ $jobs?->jobCity?->name }},{{ $jobs?->jobState?->name }},{{ $jobs?->jobCountry?->name }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-25">
                            <div class="col-md-6 d-flex">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('frontend/assets/imgs/page/job-single/experience.svg') }}"
                                        alt="joblist">
                                </div>
                                <div class="sidebar-text-info ml-10"><span
                                        class="text-description experience-icon mb-10">Education</span><strong
                                        class="small-heading">{{ $jobs?->jobEducation?->name }}</strong></div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('frontend/assets/imgs/page/job-single/experience.svg') }}"
                                        alt="joblist">
                                </div>
                                <div class="sidebar-text-info ml-10"><span
                                        class="text-description experience-icon mb-10">Skills</span>
                                    <ul>
                                        @foreach ($jobs?->jobSkill as $skill)
                                            <li class="small-heading">{{ $skill?->skillName?->name }},</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-25">
                            <div class="col-md-6 d-flex">
                                <div class="sidebar-icon-item"><img
                                        src="{{ asset('frontend/assets/imgs/page/job-single/experience.svg') }}"
                                        alt="joblist">
                                </div>
                                <div class="sidebar-text-info ml-10 job"><span
                                        class="text-description experience-icon mb-10">Benefits</span>
                                    <ul>
                                        @foreach ($jobs?->jobBenefit as $benefit)
                                            <li class="small-heading job-benifit">{{ $benefit?->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-single">{!! $jobs?->description !!}</div>
                    <div class="author-single"><span>{{ $jobs?->company?->name }}</span></div>
                    <div class="single-apply-jobs">
                        <div class="row align-items-center">
                            <div class="col-md-5"><a class="btn btn-border" href="#">Save job</a></div>
                            <div class="col-md-7 text-lg-end social-share">
                                <h6 class="color-text-paragraph-2 d-inline-block d-baseline mr-10">Share this</h6><a
                                    class="mr-5 d-inline-block d-middle" data-social="facebook" href="#"><img
                                        alt="joblist"
                                        src="{{ asset('frontend/assets/imgs/template/icons/share-fb.svg') }}"></a><a
                                    class="mr-5 d-inline-block d-middle" data-social="twitter" href="#"><img
                                        alt="joblist"
                                        src="{{ asset('frontend/assets/imgs/template/icons/share-tw.svg') }}"></a><a
                                    class="mr-5 d-inline-block d-middle" data-social="reddit" href="#"><img
                                        alt="joblist"
                                        src="{{ asset('frontend/assets/imgs/template/icons/share-red.svg') }}"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                    <div class="sidebar-border">
                        <div class="sidebar-heading">
                            <div class="avatar-sidebar">
                                <figure><img alt="joblist" src="{{ asset($jobs?->company?->logo) }}"></figure>
                                <div class="sidebar-info"><span
                                        class="sidebar-company">{{ $jobs?->company?->name }}</span><span
                                        class="card-location">{{ $jobs?->jobCity?->name }},{{ $jobs?->jobState?->name }},{{ $jobs?->jobCountry?->name }}</span><a
                                        class="link-underline mt-15"
                                        href="{{ route('companies.page', $jobs?->company?->slug) }}">{{ $openJob }}
                                        Open Jobs</a>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-list-job">
                            <div class="box-map">{!! $jobs?->company?->map_link !!}</div>
                            <ul class="ul-disc">
                                <li>{{ $jobs?->company?->address }}</li>
                                <li>Phone: {{ $jobs?->company?->phone }}</li>
                                <li>Email: {{ $jobs?->company?->email }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-border">
                        <h6 class="f-18">Tags</h6>
                        <div class="sidebar-list-job post-tags">
                            @foreach ($jobs?->postTag as $tag)
                                <a href="">{{ $tag?->tagName?->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#postJob').on('click', function() {
                $.ajax({
                    method: 'POST',
                    url: "{{ route('post.job', $jobs->id) }}",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        notyf.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        let errors = xhr.responseJSON.message;
                        notyf.error(errors);
                    }
                })
            });
        })
    </script>
@endpush
