@extends('frontend.pages.layouts.master')
@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">All Companies</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>Companies</li>
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
                    <div class="content-page company_page">
                        <div class="row">
                            @forelse ($allCompanies as $company)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-1 hover-up wow animate__animated animate__fadeIn">
                                        <div class="image-box"><a href="{{ route('companies.page', $company?->slug) }}"><img
                                                    src="{{ asset($company?->logo) }}" alt="joblist"></a></div>
                                        <div class="info-text mt-10">
                                            <h5 class="font-bold"><a
                                                    href="{{ route('companies.page', $company?->slug) }}">{{ $company?->name }}</a>
                                            </h5>
                                            <span class="card-location">{{ $company?->companyCity?->name }},
                                                {{ $company?->companyCountry?->name }}</span>
                                            <div class="mt-30"><a class="btn btn-grey-big"
                                                    href="{{ route('companies.page', $company?->slug) }}"><span>{{ $company?->jobs_count }}</span><span>
                                                        Jobs
                                                        Open</span></a></div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-xl-12 col-12 card-2-bottom mt-100 text-center">No Data Found</div>
                            @endforelse
                        </div>
                    </div>
                    <div class="paginations">
                        <ul class="pager">
                            @if ($allCompanies->hasPages())
                                {{ $allCompanies->withQueryString()->links() }}
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="sidebar-shadow none-shadow mb-30">
                        <div class="sidebar-filters">
                            <form action="{{ route('companies') }}" method="GET">
                                <div class="filter-block head-border mb-30">
                                    <h5>Search Company</h5>
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
                                            <option value="">All</option>
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
