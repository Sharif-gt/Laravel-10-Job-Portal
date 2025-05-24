<section class="section-box futured_jobs mt-20">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Featured Jobs</h2>
            <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Check out our letest
                featured job's</p>
        </div>
        <div class="mt-70">
            <div class="tab-content" id="myTabContent-1">
                <div class="tab-pane fade show active" id="tab-job-1" role="tabpanel" aria-labelledby="tab-job-1">
                    <div class="row">
                        @foreach ($featuredJobs as $jobs)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="card-grid-2 hover-up">
                                    <div class="card-grid-2-image-left"><span class="flash"></span>
                                        <div class="image-box"><img src="{{ $jobs?->company?->logo }}" alt="joblist">
                                        </div>
                                    </div>
                                    <div class="card-block-info">
                                        <h6><a href="job-details.html">{{ Str::limit($jobs?->title, 30, '...') }}</a>
                                        </h6>
                                        <div class="mt-5"><span
                                                class="card-briefcase">{{ $jobs?->jobType?->name }}</span><span
                                                class="card-time">{{ $jobs?->created_at->diffForHumans() }}</span></div>
                                        <p class="font-sm color-text-paragraph mt-15">
                                            {{ Str::limit(strip_tags($jobs?->description), 150, '...') }}</p>
                                        <div class="mt-30">
                                            @foreach ($jobs?->jobSkill as $skill)
                                                @if ($loop->index <= 1)
                                                    <a class="btn btn-grey-small mr-5"
                                                        href="javascript:">{{ $skill?->skillName?->name }}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @if ($jobs?->salary_mode === 'range')
                                        <span class="card-text-price">{{ $jobs?->max_salary }}
                                            <b>/{{ config('generalSetting.site_default_currency') }}</b>
                                        </span>
                                    @elseif ($jobs?->salary_mode === 'custom')
                                        <span class="card-text-price">{{ $jobs?->custom_salary }}</span>
                                    @endif
                                    <div class="btn btn-apply-now">
                                        <a href="{{ route('all.jobs.detail', $jobs?->slug) }}">Job details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
