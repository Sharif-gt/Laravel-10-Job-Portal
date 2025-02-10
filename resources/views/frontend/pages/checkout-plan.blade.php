@extends('frontend.pages.layouts.master')
@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Check Out</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>Check Out</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-90">
        <div class="container">

            <div class="max-width-price">
                <div class="block-pricing mt-70">
                    <div class="row">
                        <div class="col-md-8 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <h5 class="">Choose Your Payment Method</h5>
                            <div class="row pt-40">
                                <div class="col-md-3">
                                    <a href="{{ route('company.paypal.payment') }}"><img class=""
                                            style="width: 200px;border-radius: 5px;border: 3px solid #1ca774;     height: 115px;object-fit: contain;"
                                            src="{{ asset('upload/paypal.jpg') }}" alt=""></a>
                                </div>
                                <div class="col-md-3">
                                    <a href=""><img class=""
                                            style="width: 200px;border-radius: 5px;border: 3px solid #1ca774;"
                                            src="https://placehold.co/600x400" alt=""></a>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <div class="box-pricing-item">
                                <h3>{{ $plans?->lable }}</h3>
                                <div class="box-info-price"><span
                                        class="text-price color-brand-2">${{ $plans?->price }}</span><span
                                        class="text-month">/month</span></div>
                                <ul class="list-package-feature">
                                    <li>{{ $plans?->job_limit }} Job Post Limit</li>
                                    <li>{{ $plans?->feature_job_limit }} Features Job Post Limit</li>
                                    <li>{{ $plans?->highlight_job_limit }} Highlight Job Post Limit</li>
                                    @if ($plans?->profile_verified)
                                        <li>Verify Company</li>
                                    @else
                                        <li style="text-decoration: line-through;">not Verify Company</li>
                                    @endif
                                </ul>
                                <div><a class="btn btn-border" href="#">Choose
                                        plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
