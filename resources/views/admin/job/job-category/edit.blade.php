@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Job Category</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">

                        <div class="card-header">
                            <h4>Edit Category</h4>
                        </div>
                        <form action="{{ route('admin.job-category.update', $editJob->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Icon</label>
                                    <div role="iconpicker" name="icon" data-align="left"
                                        data-icon="{{ $editJob?->icon }}"></div>

                                    @error('icon')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $editJob?->name }}"
                                        required="">

                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Show At Popular</label>
                                    <select class="form-control select2 state" name="popular" aria-hidden="true">
                                        <option @selected($editJob?->popular == 0) value="0">No</option>
                                        <option @selected($editJob?->popular == 1) value="1">yes</option>
                                    </select>
                                    @error('popular')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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
