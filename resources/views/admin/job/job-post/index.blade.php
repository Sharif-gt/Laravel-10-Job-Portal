@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Jobs</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Jobs</h4>
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
                                Jobs</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Icon</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                    {{-- @forelse ($jobCategory as $item)
                                        <tr>
                                            <td><i style="font-size: 20px" class="{{ $item?->icon }}"></i></td>
                                            <td>{{ $item?->name }}</td>
                                            <td>{{ $item?->slug }}</td>
                                            <td style="width: 20%">
                                                <a href="{{ route('admin.job-category.edit', $item->id) }}"
                                                    class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('admin.job-category.destroy', $item->id) }}"
                                                    class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No Result Found</td>
                                        </tr>
                                    @endforelse --}}
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                {{-- @if ($jobCategory->hasPages())
                                    {{ $jobCategory->withQueryString()->links() }}
                                @endif --}}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
