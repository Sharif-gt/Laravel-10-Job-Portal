@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Skills</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Skills</h4>
                            <div class="card-header-form">
                                <form action="{{ route('admin.skills.index') }}" method="GET">
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
                            <a href="{{ route('admin.skills.create') }}" class="btn btn-icon icon-left btn-success"><i
                                    class="far fa-edit"></i> Create
                                Skill</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse ($skills as $skill)
                                        <tr>
                                            <td>{{ $skill?->name }}</td>
                                            <td>{{ $skill?->slug }}</td>
                                            <td style="width: 20%">
                                                <a href="{{ route('admin.skills.edit', $skill->id) }}"
                                                    class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('admin.skills.destroy', $skill->id) }}"
                                                    class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No Result Found</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                @if ($skills->hasPages())
                                    {{ $skills->withQueryString()->links() }}
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
