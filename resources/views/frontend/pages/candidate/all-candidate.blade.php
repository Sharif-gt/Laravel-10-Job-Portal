@extends('frontend.pages.layouts.master')
@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">All Candidates</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>All Candidates</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="content-page">

                <div class="row">
                    <div class="col-lg-3">
                        <div class="sidebar-shadow none-shadow mb-30">
                            <div class="sidebar-filters">
                                <div class="filter-block mb-30">
                                    <div class="filter-block head-border mb-30">
                                        <h5>Search <a class="link-reset" href="#">Reset</a></h5>
                                    </div>
                                    <form action="{{ route('candidates') }}" method="GET">
                                        <div class="filter-block mb-20">
                                            <div class="form-group select-style">
                                                <label for="">Professions</label>
                                                <select class="form-control form-icons select-active" name="professions">
                                                    <option value="">All</option>
                                                    @foreach ($professions as $item)
                                                        <option value="{{ $item?->id }}">{{ $item?->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="filter-block mb-30">
                                            <div class="form-group select-style">
                                                <label for="">Experiences</label>
                                                <select class="form-control form-icons select-active" name="experience">
                                                    <option value="">All</option>
                                                    @foreach ($experiences as $item)
                                                        <option value="{{ $item?->id }}">{{ $item?->name }}</option>
                                                    @endforeach
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
                    <div class="col-xl-9">
                        <div class="box-filters-job"></div>
                        <div class="row">
                            @forelse ($candidates as $candidate)
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up">
                                        <div class="card-grid-2-image-left">
                                            <div class="card-grid-2-image-rd online"><a
                                                    href="{{ route('candidates.page', $candidate->slug) }}">
                                                    <figure><img alt="joblist" src="{{ asset($candidate?->image) }}">
                                                    </figure>
                                                </a></div>
                                            <div class="card-profile pt-10">
                                                <a href="{{ route('candidates.page', $candidate->slug) }}">
                                                    <h5>{{ $candidate?->full_name }}</h5>
                                                </a>
                                                <span
                                                    class="font-xs color-text-mutted">{{ $candidate?->profession?->name }}</span>
                                                {{-- <div class="rate-reviews-small pt-5">
                                                    <span>
                                                        <img src="assets/imgs/template/icons/star.svg" alt="joblist">
                                                    </span>
                                                    <span>
                                                        <img src="assets/imgs/template/icons/star.svg" alt="joblist">
                                                    </span>
                                                    <span>
                                                        <img src="assets/imgs/template/icons/star.svg" alt="joblist">
                                                    </span>
                                                    <span>
                                                        <img src="assets/imgs/template/icons/star.svg" alt="joblist">
                                                    </span>
                                                    <span>
                                                        <img src="assets/imgs/template/icons/star.svg" alt="joblist">
                                                    </span>
                                                    <span class="ml-10 color-text-mutted font-xs">(65)</span>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="card-block-info">
                                            <p class="font-xs color-text-paragraph-2">{!! Str::limit($candidate?->bio, 100) !!}</p>
                                            <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                <div class="text-start">
                                                    @foreach ($candidate->skill as $skills)
                                                        @if ($loop->index <= 5)
                                                            <a class="btn btn-tags-sm mb-10 mr-5"
                                                                href="jobs-grid.html">{{ $skills?->skillName?->name }}</a>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="employers-info align-items-center justify-content-center mt-15">
                                                <div class="row">
                                                    <div class="col-6"><span class="d-flex align-items-center"><i
                                                                class="fi-rr-marker mr-5 ml-0"></i><span
                                                                class="font-sm color-text-mutted">{{ $candidate?->candidateState?->name }},
                                                                {{ $candidate?->candidateCountry?->name }}</span></span>
                                                    </div>
                                                    {{-- <div class="col-6"><span
                                                            class="d-flex justify-content-end align-items-center"><i
                                                                class="fi-rr-clock mr-5"></i><span
                                                                class="font-sm color-brand-1">$45 /
                                                                hour</span></span>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-xl-12 col-12 card-2-bottom mt-20">No Data Found</div>
                            @endforelse
                        </div>
                        <div class="paginations">
                            <ul class="pager">
                                @if ($candidates->hasPages())
                                    {{ $candidates->withQueryString()->links() }}
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
                </div>
            </div>
        </div>
    </section>
@endsection
