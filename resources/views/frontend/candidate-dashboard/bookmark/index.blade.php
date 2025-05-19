@extends('frontend.pages.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Bookmarked Job</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                            <li>Bookmarked Job</li>
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
                        <h3 class="mt-0 mb-0 color-brand-1">Bookmarked Job </h3>
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>Job name</th>
                                    <th>company_name</th>
                                    <th>Date</th>
                                    <th>Job Status</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody class="experience-tbody">
                                @forelse ($bookmarkedJobs as $item)
                                    <tr>
                                        <td>{{ $item?->job?->title }}</td>
                                        <td>{{ $item?->job?->company?->name }}</td>
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
                                            <a href="{{ route('candidate.bookmark-remove', $item->id) }}"
                                                class="btn btn-danger"><i class="fas fa-bookmark"></i></a>
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
                                @if ($bookmarkedJobs->hasPages())
                                    {{ $bookmarkedJobs->links() }}
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
