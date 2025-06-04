@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Update Roles and Permission</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">

                        <div class="card-header">
                            <h4>Update Role</h4>
                        </div>
                        <form action="{{ route('admin.role.update', $roles?->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Role Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $roles?->name }}"
                                        required="">

                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group ml-4">
                                <div class="control-label">Permissions</div>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        <div class="col-md-3">
                                            <label class="custom-switch mt-2">
                                                <input @checked(in_array($permission?->name, $rolePermissions)) type="checkbox" name="permissions[]"
                                                    class="custom-switch-input" value="{{ $permission?->name }}">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description"> {{ $permission?->name }} </span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="card-footer text-left">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
