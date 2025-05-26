@extends('frontend.pages.layouts.master')
@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">About Us</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('home') }}">Home</a></li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">

        <div class="post-loop-grid">
            <div class="container">
                <div class="text-center">
                    <h6 class="f-18 color-text-mutted text-uppercase">Our company</h6>
                    <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">About Our Company</h2>
                    <p class="font-sm color-text-paragraph wow animate__animated animate__fadeInUp w-lg-50 mx-auto">
                        {{ $about?->short_description }}</p>
                </div>

                <div class="row justify-content-between mt-70">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <h3 class="mt-15">{{ $about?->title }}</h3>
                        <div class="mt-20">
                            <p class="font-md color-text-paragraph mt-20">{!! $about?->description !!}</p>
                        </div>
                        <div class="mt-30"><a class="btn btn-default" href="{{ $about?->link }}">Read More</a></div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12"><img src="{{ asset($about?->image) }}" alt="joxBox">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-50 mb-50">
        <div class="container">
            <div class="text-start">
                <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">News and Blog</h2>
                <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Get the latest news,
                    updates
                    and tips</p>
            </div>
        </div>
        <div class="container">
            <div class="mt-50">
                <div class="box-swiper style-nav-top">
                    <div class="swiper-container swiper-group-3 swiper">
                        <div class="swiper-wrapper pb-70 pt-5">
                            @foreach ($blogs as $blog)
                                <div class="swiper-slide">
                                    <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                                        <div class="text-center card-grid-3-image"><a
                                                href="{{ route('blog-detail', $blog?->slug) }}">
                                                <figure><img alt="joblist" style="height: 250px; object-fit: cover;"
                                                        src="{{ $blog?->image }}">
                                                </figure>
                                            </a></div>
                                        <div class="card-block-info">
                                            <h5><a href="{{ route('blog-detail', $blog?->slug) }}">{{ $blog?->title }}</a>
                                            </h5>
                                            <p class="mt-10 color-text-paragraph font-sm">
                                                {{ Str::limit(strip_tags($blog?->description), 100, '...') }}</p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-6 col-6">
                                                        <div class="d-flex">
                                                            <div class="info-right-img"><span
                                                                    class="font-sm font-bold color-brand-1 op-70">{{ $blog?->author?->name }}</span><br><span
                                                                    class="font-xs color-text-paragraph-2">{{ formatDate($blog?->created_at) }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
