@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>User Roles</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All User Roles</h4>
                            <div class="card-header-form">
                                <form action="{{ route('admin.user-role.index') }}" method="GET">
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
                            <a href="{{ route('admin.user-role.create') }}" class="btn btn-icon icon-left btn-success"><i
                                    class="far fa-edit"></i> Create User Role</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse ($roleUser as $user)
                                        <tr>
                                            <td>{{ $user?->name }}</td>
                                            <td> {{ $user?->email }} </td>
                                            <td> {{ $user?->getRoleNames()->first() }} </td>
                                            <td>
                                                @if ($user->getRoleNames()->first() !== 'Super Admin')
                                                    <a href="{{ route('admin.user-role.edit', $user->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin.user-role.destroy', $user->id) }}"
                                                        class="btn btn-danger delete-item"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <td class="text-center" colspan="3">No Data Found</td>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
