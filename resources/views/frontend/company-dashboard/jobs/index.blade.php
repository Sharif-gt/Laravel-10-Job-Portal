@extends('frontend.pages.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">All Jobs</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                            <li>All Jobs</li>
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
                    <div class="card">
                        <div class="card-header" style="display: flex; gap: 20px; justify-content: space-around;">
                            <h4>All Posts</h4>
                            <div class="card-header-form" style="width: 477px;">
                                <form action="{{ route('company.jobs-post.index') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="search"
                                            value="{{ request('search') }}">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-primary" style="height: 49px;"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <a href="{{ route('company.jobs-post.create') }}" class="btn btn-icon icon-left btn-success"><i
                                    class="far fa-edit"></i> Create
                                Post</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Title</th>
                                        <th>Category/Role</th>
                                        <th>Applications</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse ($allPost as $post)
                                        <tr>
                                            <td>
                                                <div style="margin-left: 10px;">
                                                    <b>{{ $post?->title }}</b> <br>
                                                    <span>{{ $post?->company?->name }} -
                                                        {{ $post?->jobType?->name }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <b>{{ $post?->jobCategory?->name }}</b> <br>
                                                <span>{{ $post?->jobRole?->name }}</span>
                                            </td>
                                            <td>{{ $post?->applied_job_count }} Applications</td>
                                            <td>{{ formatDate($post?->deadline) }}</td>
                                            <td>
                                                @if ($post?->status == 'pending')
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                @elseif ($post?->deadline > date('Y-m-d'))
                                                    <span class="badge bg-primary text-dark">Active</span>
                                                @else
                                                    <span class="badge bg-danger text-dark">Expired</span>
                                                @endif
                                            </td>
                                            <td style="width: 20%">
                                                <div class="dropdown">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#"
                                                        role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        View
                                                    </a>

                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <li><a class="dropdown-item" href="#">All Aplications</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('company.jobs-post.edit', $post->id) }}">Edit</a>
                                                        </li>
                                                        <li><a class="dropdown-item delete-item"
                                                                href="{{ route('company.jobs-post.destroy', $post->id) }}">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                {{-- <a href="{{ route('company.jobs-post.edit', $post->id) }}"
                                                    class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('company.jobs-post.destroy', $post->id) }}"
                                                    class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a> --}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No Result Found</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                @if ($allPost->hasPages())
                                    {{ $allPost->withQueryString()->links() }}
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
