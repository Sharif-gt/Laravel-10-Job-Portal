@extends('frontend.pages.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Applied Job</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                            <li>Applied Job</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                @include('frontend.candidate-dashboard.layouts.sidebar')

                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <div class="content-single">
                        <h3 class="mt-0 mb-0 color-brand-1">Applied Job </h3>
                        <p style="color: #0e5927">Total Jobs Applied: {{ $countApplied }}</p>
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>Company</th>
                                    <th>Title</th>
                                    <th>Applied Date</th>
                                    <th>Job Status</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody class="experience-tbody">
                                @forelse ($appliedJob as $item)
                                    <tr>
                                        <td>{{ $item?->job?->company?->name }}</td>
                                        <td>{{ $item?->job?->title }}</td>
                                        <td>{{ formatDate($item?->created_at) }}</td>
                                        <td>
                                            @if ($item?->job?->deadline > date('Y-m-d'))
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-denger">Expire</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('all.jobs.detail', $item?->job?->slug) }}"
                                                class="btn btn-primary editExperience"><i class="fas fa-edit"
                                                    aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No Result Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                @if ($appliedJob->hasPages())
                                    {{ $appliedJob->links() }}
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mt-80"></div>
@endsection
