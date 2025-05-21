@extends('frontend.pages.layouts.master')
@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Blog's</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('home') }}">Home</a></li>
                            <li>Blog's</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box">
        <div class="archive-header pt-40">
            <div class="container">
                <div class="box-white">
                    <h2 class="mb-30 mt-20">{{ $blogShow?->title }}</h2>
                    <div class="post-meta text-muted d-flex mx-auto">
                        <div class="author d-flex mr-30"><span>{{ $blogShow?->author?->name }}</span></div>
                        <div class="date"><span class="font-xs color-text-paragraph-2 mr-20 d-inline-block"><img
                                    class="img-middle mr-5"
                                    src="{{ asset('frontend/assets/imgs/page/blog/calendar.svg') }}">{{ formatDate($blogShow?->created_at) }}</span><span
                                class="font-xs color-text-paragraph-2 d-inline-block"><img class="img-middle mr-5"
                                    src="{{ asset('frontend/assets/imgs/template/icons/time.svg') }}">{{ $blogShow?->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <div class="post-loop-grid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="single-body">
                        <figure><img style="height: 500px; width: 100%; object-fit: cover;"
                                src="{{ asset($blogShow?->image) }}"></figure>
                        <div class="">
                            <div class="content-single">
                                <p>{!! $blogShow?->description !!}</p>
                            </div>
                            <div class="single-apply-jobs mt-20">
                                <div class="row">
                                    <div class="col-md-5 text-lg-end social-share">
                                        <h6 class="color-text-paragraph-2 d-inline-block d-baseline mr-20 mt-10">Share</h6>
                                        <a class="mr-5 d-inline-block d-middle" data-social="facebook" href="#"><img
                                                alt="joblist"
                                                src="{{ asset('frontend/assets/imgs/template/icons/share-fb.svg') }}"></a><a
                                            class="mr-5 d-inline-block d-middle" data-social="twitter" href="#"><img
                                                alt="joblist"
                                                src="{{ asset('frontend/assets/imgs/template/icons/share-tw.svg') }}"></a><a
                                            class="mr-5 d-inline-block d-middle" data-social="reddit" href="#"><img
                                                alt="joblist"
                                                src="{{ asset('frontend/assets/imgs/template/icons/share-red.svg') }}"></a>
                                        {{-- <a class="mr-20 d-inline-block d-middle hover-up" href="#"><img alt="joblist"
                                                src="assets/imgs/page/blog/fb.svg"></a><a
                                            class="mr-20 d-inline-block d-middle hover-up" href="#"><img
                                                alt="joblist" src="assets/imgs/page/blog/tw.svg"></a><a
                                            class="mr-0 d-inline-block d-middle hover-up" href="#"><img alt="joblist"
                                                src="assets/imgs/page/blog/pi.svg"></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
