@extends('frontend.pages.layouts.master')
@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Pricing Table</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>Pricing Table</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-90">
        <div class="container">
            <h2 class="text-center mb-15 wow animate__animated animate__fadeInUp">Pricing Table</h2>
            <div class="font-lg color-text-paragraph-2 text-center wow animate__animated animate__fadeInUp">Choose The Best
                Plan That&rsquo;s For You</div>
            <div class="max-width-price">
                <div class="block-pricing mt-70">
                    <div class="row">
                        @foreach ($pricing as $item)
                            <div class="col-xl-4 col-lg-6 col-md-6 wow animate__animated animate__fadeInUp"
                                data-wow-delay=".1s">
                                <div class="box-pricing-item">
                                    <h3>{{ $item?->lable }}</h3>
                                    <div class="box-info-price"><span
                                            class="text-price color-brand-2">${{ $item?->price }}</span><span
                                            class="text-month">/month</span></div>
                                    <ul class="list-package-feature">
                                        <li>{{ $item?->job_limit }} Job Post Limit</li>
                                        <li>{{ $item?->feature_job_limit }} Features Job Post Limit</li>
                                        <li>{{ $item?->highlight_job_limit }} Highlight Job Post Limit</li>
                                        @if ($item?->profile_verified)
                                            <li>Verify Company</li>
                                        @else
                                            <li style="text-decoration: line-through;">not Verify Company</li>
                                        @endif
                                    </ul>
                                    <div><a class="btn btn-border" href="{{ route('checkout', $item?->id) }}">Choose
                                            plan</a></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
