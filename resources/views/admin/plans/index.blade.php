@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pricing</h1>
        </div>

        <div class="section-body">
            <div class="mb-4 text-right">
                <a href="{{ route('admin.plans.create') }}" class="btn btn-icon icon-left btn-success"><i
                        class="far fa-edit"></i> Create
                    Plan</a>
            </div>
            <div class="row">
                @foreach ($plans as $item)
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="pricing">
                            @if ($item?->recommended)
                                <div class="pricing-title">
                                    Recommended
                                </div>
                            @endif
                            <div class="pricing-padding">
                                <div class="mb-4">
                                    @if ($item?->frontend_show)
                                        <span class="badge badge-primary">Showing at frontend</span>
                                    @endif
                                    @if ($item?->frontend_show)
                                        <span class="badge badge-success text-dark">Showing at home</span>
                                    @endif
                                </div>
                                <h4>{{ $item?->lable }}</h4>
                                <div class="pricing-price">
                                    <div>${{ $item?->price }}</div>
                                    <div>per month</div>
                                </div>
                                <div class="pricing-details">
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                        <div class="pricing-item-label">{{ $item?->job_limit }} Job Post Limit</div>
                                    </div>
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                        <div class="pricing-item-label">{{ $item?->feature_job_limit }} Features Job Post
                                            Limit</div>
                                    </div>
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                        <div class="pricing-item-label">{{ $item?->highlight_job_limit }} Highlight Job Post
                                            Limit</div>
                                    </div>
                                    <div class="pricing-item">
                                        @if ($item?->profile_verified)
                                            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                        @else
                                            <div class="pricing-item-icon bg-danger text-white"><i class="fas fa-times"></i>
                                            </div>
                                        @endif
                                        <div class="pricing-item-label">Verify Company</div>
                                    </div>
                                </div>
                            </div>
                            <div class="pricing-cta d-flex">
                                <a class="bg-primary text-white w-100"
                                    href="{{ route('admin.plans.edit', $item?->id) }}">Edit <i
                                        class="fas fa-arrow-right"></i></a>
                                <a class="bg-danger text-white w-100 delete-item"
                                    href="{{ route('admin.plans.destroy', $item?->id) }}">Delete <i
                                        class="fas fa-times"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
