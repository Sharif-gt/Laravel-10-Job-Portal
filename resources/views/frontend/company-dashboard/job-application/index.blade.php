@extends('frontend.pages.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">All Applications</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                            <li>All Applications</li>
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
                    <div class="content-single">
                        <h3 class="mt-0 mb-0 color-brand-1">Job Name: {{ $jobName?->title }}</h3>
                        <p style="color: #0e5927">Total Applied Candidates: {{ $totalAppliedCandidate }}</p>
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>Details</th>
                                    <th>Profession</th>
                                    <th>Experience</th>
                                    <th>title</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody class="experience-tbody">
                                @forelse ($AppliedCandidate as $candidate)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img style= "height: 55px; weight: 55px;"
                                                    src="{{ $candidate?->candidateProfile?->image }}" alt="Profile">
                                                <h6 style="padding-left: 10px">
                                                    {{ $candidate?->candidateProfile?->full_name }}</h6>
                                            </div>
                                        </td>
                                        <td>{{ $candidate?->candidateProfile?->profession?->name }}</td>
                                        <td>{{ $candidate?->candidateProfile?->experienceYear?->name }}</td>
                                        <td>{{ $candidate?->candidateProfile?->title }}</td>
                                        <td>
                                            <a href="{{ route('candidates.page', $candidate?->candidateProfile?->slug) }}"
                                                class="btn btn-primary">View Profile</a>
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
                                @if ($AppliedCandidate->hasPages())
                                    {{ $AppliedCandidate->links() }}
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
