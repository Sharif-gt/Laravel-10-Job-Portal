@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Posts</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Posts</h4>
                            <div class="card-header-form">
                                <form action="{{ route('admin.jobs.index') }}" method="GET">
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
                            <a href="{{ route('admin.jobs.create') }}" class="btn btn-icon icon-left btn-success"><i
                                    class="far fa-edit"></i> Create
                                Post</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Title</th>
                                        <th>Category/Role</th>
                                        <th>Salary</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th>Approve</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse ($allPost as $post)
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div>
                                                        <img style="width: 50px; height: 50px; object-fit: cover;"
                                                            src="{{ asset($post?->company?->logo) }}" alt="">
                                                    </div>
                                                    <div>
                                                        <b>{{ $post?->title }}</b> <br>
                                                        <span>{{ $post?->company?->name }} -
                                                            {{ $post?->jobType?->name }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <b>{{ $post?->jobCategory?->name }}</b> <br>
                                                <span>{{ $post?->jobRole?->name }}</span>
                                            </td>
                                            <td>
                                                @if ($post?->salary_mode === 'range')
                                                    <div>
                                                        <b>{{ $post?->min_salary }} - {{ $post?->max_salary }}
                                                            {{ config('generalSetting.site_default_currency') }}</b> <br>
                                                        <span>{{ $post?->salaryType?->name }}</span>
                                                    </div>
                                                @else
                                                    <b>{{ $post?->custom_salary }}</b> <br>
                                                    <span>{{ $post?->salaryType?->name }}</span>
                                                @endif
                                            </td>
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
                                            <td>
                                                <div class="form-group" style="margin-bottom: 10px">
                                                    <label class="custom-switch mt-2">
                                                        <input @checked($post?->status == 'active') type="checkbox"
                                                            data-id="{{ $post?->id }}" name="custom-switch-checkbox"
                                                            class="custom-switch-input post-status">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td style="width: 20%">
                                                <a href="{{ route('admin.jobs.edit', $post->id) }}"
                                                    class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('admin.jobs.destroy', $post->id) }}"
                                                    class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
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
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.post-status').on('change', function() {
                let id = $(this).data('id');

                $.ajax({
                    method: "POST",
                    url: "{{ route('admin.job-status.update', ':id') }}".replace(':id', id),
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.message == 'success') {
                            window.location.reload();
                        }
                    },
                    error: function(xhr, status, error) {

                    }
                })
            });
        });
    </script>
@endpush
