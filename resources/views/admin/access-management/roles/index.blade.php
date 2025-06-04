@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Roles</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Roles</h4>
                            <div class="card-header-form">
                                <form action="{{ route('admin.role.index') }}" method="GET">
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
                            <a href="{{ route('admin.role.create') }}" class="btn btn-icon icon-left btn-success"><i
                                    class="far fa-edit"></i> Create
                                Industry</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Role</th>
                                        <th>Purmissions</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse ($roles as $role)
                                        <tr>
                                            <td>{{ $role?->name }}</td>
                                            <td>
                                                @foreach ($role->permissions as $item)
                                                    <span class="badge bg-primary text-light"> {{ $item->name }} </span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.role.edit', $role->id) }}"
                                                    class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('admin.role.destroy', $role->id) }}"
                                                    class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <td class="text-center" colspan="3">No Data Found</td>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                @if ($roles->hasPages())
                                    {{ $roles->withQueryString()->links() }}
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
