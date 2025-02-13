@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>All Orders</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Orders</h4>
                            <div class="card-header-form">
                                <form action="{{ route('admin.orders.index') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="search"
                                            value="{{ request('search') }}">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Order & Transaction</th>
                                        <th>Company</th>
                                        <th>Plan</th>
                                        <th>Paid Amount</th>
                                        <th>Main Price</th>
                                        <th>Payment Method</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($orders as $item)
                                        <tr>
                                            <td>
                                                Order id: {{ $item?->order_id }} <br>
                                                Transaction id: {{ $item?->transaction_id }}
                                            </td>
                                            <td class="d-flex">
                                                <div>
                                                    <img style="width: 50px; height: 50px"
                                                        src="{{ asset($item?->company?->logo) }}" alt="">
                                                </div>
                                                <div>
                                                    <b>{{ $item?->company?->name }}</b> <br>
                                                    {{ $item?->company?->email }}
                                                </div>
                                            </td>
                                            <td>{{ $item?->package_name }}</td>
                                            <td>{{ $item?->amount }} {{ $item?->paid_in_currency }}</td>
                                            <td>{{ $item?->default_amount }} {{ $item?->paid_in_currency }}</td>
                                            <td>{{ $item?->payment_provider }}</td>
                                            <td>
                                                <a href="{{ route('admin.orders.show', $item->id) }}"
                                                    class="btn btn-primary">Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                {{-- @if ($data->hasPages())
                                    {{ $data->withQueryString()->links() }}
                                @endif --}}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
