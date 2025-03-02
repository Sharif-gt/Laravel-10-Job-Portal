@extends('frontend.pages.layouts.master')
@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Job's</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('home') }}">Home</a></li>
                            <li>Job's</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
                    <div class="content-page">
                        {{-- <div class="box-filters-job">
                            <div class="row">
                                <div class="col-xl-6 col-lg-5"><span class="text-small text-showing">Showing <strong>41-60
                                        </strong>of
                                        <strong>944 </strong>jobs</span></div>
                                <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                                    <div class="display-flex2">
                                        <div class="box-border mr-10"><span class="text-sortby">Show:</span>
                                            <div class="dropdown dropdown-sort">
                                                <button class="btn dropdown-toggle" id="dropdownSort" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-bs-display="static"><span>12</span><i
                                                        class="fi-rr-angle-small-down"></i></button>
                                                <ul class="dropdown-menu dropdown-menu-light"
                                                    aria-labelledby="dropdownSort">
                                                    <li><a class="dropdown-item active" href="#">10</a></li>
                                                    <li><a class="dropdown-item" href="#">12</a></li>
                                                    <li><a class="dropdown-item" href="#">20</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="box-border"><span class="text-sortby">Sort by:</span>
                                            <div class="dropdown dropdown-sort">
                                                <button class="btn dropdown-toggle" id="dropdownSort2" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    data-bs-display="static"><span>Newest Post</span><i
                                                        class="fi-rr-angle-small-down"></i></button>
                                                <ul class="dropdown-menu dropdown-menu-light"
                                                    aria-labelledby="dropdownSort2">
                                                    <li><a class="dropdown-item active" href="#">Newest Post</a></li>
                                                    <li><a class="dropdown-item" href="#">Oldest Post</a></li>
                                                    <li><a class="dropdown-item" href="#">Rating Post</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row display-list">
                            @forelse ($jobs as $job)
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
                                                            {{-- <i class="fas fa-bookmark"></i> --}}
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
                    </div>
                    <div class="paginations">
                        <ul class="pager">
                            @if ($jobs->hasPages())
                                {{ $jobs->withQueryString()->links() }}
                            @endif
                            {{-- <li><a class="pager-prev" href="#"><i class="fas fa-arrow-left"></i></a></li>
                            <li><a class="pager-number" href="#">1</a></li>
                            <li><a class="pager-number" href="#">2</a></li>
                            <li><a class="pager-number active" href="#">3</a></li>
                            <li><a class="pager-number" href="#">4</a></li>
                            <li><a class="pager-next" href="#"><i class="fas fa-arrow-right"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="sidebar-shadow none-shadow mb-30">
                        <div class="sidebar-filters">
                            <form action="{{ route('all.jobs') }}" method="GET">
                                <div class="filter-block head-border mb-30">
                                    <h5>Advance Filter <a class="link-reset" href="#">Reset</a></h5>
                                </div>
                                <div class="filter-block mb-20">
                                    <div class="form-group select-style">
                                        <input class="from-control" name="search" type="text" placeholder="Search"
                                            value="{{ request()->search }}">
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <div class="form-group select-style">
                                        <select class="form-control form-icons select-active country" name="country">
                                            <option value="">Country</option>
                                            @foreach ($countries as $item)
                                                <option @selected($item?->id == request()?->country) value="{{ $item?->id }}">
                                                    {{ $item?->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <div class="form-group select-style">
                                        <select class="form-control form-icons select-active state" name="state">
                                            @if ($selectedState)
                                                @foreach ($selectedState as $item)
                                                    <option @selected($item?->id == request()?->state) value="{{ $item?->id }}">
                                                        {{ $item?->name }}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <div class="form-group select-style">
                                        <select class="form-control form-icons select-active city" name="city">
                                            @if ($selectedCity)
                                                @foreach ($selectedCity as $item)
                                                    <option @selected($item?->id == request()?->city) value="{{ $item?->id }}">
                                                        {{ $item?->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <button class="submit btn btn-default mt-10 rounded-1 w-100"
                                            type="submit">Search</button>
                                    </div>
                                </div>
                            </form>

                            <div class="filter-block mb-20">
                                <form action="{{ route('all.jobs') }}" method="GET">
                                    <h5 class="medium-heading mb-15">Industry</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            @foreach ($jobCategories as $item)
                                                <li>
                                                    <label class="cb-container">
                                                        <input type="checkbox" @checked($item?->slug == request()?->category)
                                                            name="category[]" value="{{ $item?->slug }}"><span
                                                            class="text-small">{{ $item?->name }}</span><span
                                                            class="checkmark"></span>
                                                    </label><span class="number-item">{{ $item?->jobs_count }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <button class="submit btn btn-default mt-10 rounded-1 w-100"
                                        type="submit">Search</button>
                                </form>

                            </div>

                            <div class="filter-block mb-30">
                                <form action="{{ route('all.jobs') }}" method="GET">
                                    <h5 class="medium-heading mb-10">Job Type</h5>
                                    <div class="form-group">
                                        <ul class="list-checkbox">
                                            @foreach ($jobType as $item)
                                                <li>
                                                    <label class="cb-container">
                                                        <input type="checkbox" name="type[]" @checked($item?->name == request()?->type)
                                                            value="{{ $item?->name }}"><span
                                                            class="text-small">{{ $item?->name }}</span><span
                                                            class="checkmark"></span>
                                                    </label><span class="number-item">{{ $item?->jobs_count }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <button class="submit btn btn-default mt-10 rounded-1 w-100"
                                        type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        // country,state,city ajax
        $(document).ready(function() {
            $(".country").on("change", function() {
                let country_id = $(this).val();
                $(".city").html("");

                $.ajax({
                    method: "GET",
                    url: "{{ route('get-states', ':id') }}".replace(':id', country_id),
                    data: {},
                    success: function(response) {
                        let html = "";

                        $.each(response, function(index, value) {
                            html += `<option value="${value.id}">${value.name}</option>`
                        });

                        html = `<option value="">Select</option>` + html
                        $(".state").html(html);
                    },
                    error: function(xhr, status, error) {}
                });
            })

            $(".state").on("change", function() {
                let state_id = $(this).val();

                $.ajax({
                    method: "GET",
                    url: "{{ route('get-cities', ':id') }}".replace(':id', state_id),
                    data: {},
                    success: function(response) {
                        let html = "";

                        $.each(response, function(index, value) {
                            html += `<option value="${value.id}">${value.name}</option>`
                        });

                        html = `<option value="">Select</option>` + html
                        $(".city").html(html);
                    },
                    error: function(xhr, status, error) {}
                });
            })
        })
    </script>
@endpush
