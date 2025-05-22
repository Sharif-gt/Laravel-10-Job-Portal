@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Update Hero Section</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">

                        <div class="card-header">
                            <h4>Update Hero Section</h4>
                        </div>
                        <form action="{{ route('admin.hero.update', 1) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $heroSection?->title }}" required="">

                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Sub Title</label>
                                    <input type="text" class="form-control" name="sub_title"
                                        value="{{ $heroSection?->sub_title }}" required="">

                                    @error('sub_title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image" value="">

                                    @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Background Image</label>
                                    <input type="file" class="form-control" name="bg_image" value="">

                                    @error('bg_image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-left">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
