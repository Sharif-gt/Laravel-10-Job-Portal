@extends('frontend.pages.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Plans Detail</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>Plans Detail</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row">

                <!-- Sideber -->
                @include('frontend.company-dashboard.layouts.sidebar')

                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 style="margin: 10px;">Order && Transaction</h5>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Order Id</th>
                                            <td>{{ $order?->order_id }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Transaction Id</th>
                                            <td>{{ $order?->transaction_id }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Date</th>
                                            <td>{{ formatDate($order?->created_at) }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Action</th>
                                            <td><a class="btn btn-success"
                                                    href="{{ route('company.plans.invoice', $order?->id) }}">Download
                                                    details</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 style="margin: 10px;">Billing && Payment Info</h5>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Company</th>
                                            <td>{{ $order?->company?->name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>{{ $order?->company?->email }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Payment Method</th>
                                            <td>{{ $order?->payment_provider }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 style="margin: 10px;">Plan</h5>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Name</th>
                                            <td>{{ $order?->package_name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Price</th>
                                            <td>{{ $order?->amount }} {{ $order?->paid_in_currency }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Plan Benefits</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Job Post Limit</th>
                                            <td>{{ $order?->plan->job_limit }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Featured Job Post</th>
                                            <td>{{ $order?->plan->feature_job_limit }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Highlight Job</th>
                                            <td>{{ $order?->plan->highlight_job_limit }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Profile Verified</th>
                                            <td>{{ $order?->plan->profile_verified ? 'YES' : 'NO' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
