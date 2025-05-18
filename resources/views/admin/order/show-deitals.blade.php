@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Order Details</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body p-0">
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
                                        <td><a class="btn btn-primary text-light"
                                                href="{{ route('admin.orders.invoice', $order?->id) }}">Download
                                                details</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body p-0">
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

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body p-0">
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
    </section>
@endsection
