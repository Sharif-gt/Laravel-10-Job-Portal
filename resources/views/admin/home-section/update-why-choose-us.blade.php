@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Why Choose Us Section</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4>Update Why Choose Us</h4>
                        </div>
                        <form action="{{ route('admin.why-choose-us.update', 1) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group ml-5">
                                        <label>Icon One</label>
                                        <div role="iconpicker" name="icon_one" data-align="left"
                                            data-icon="{{ $whyChooseUs?->icon_one }}"></div>

                                        @error('icon_one')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Title One</label>
                                            <input type="text" class="form-control" name="title_one"
                                                value="{{ $whyChooseUs?->title_one }}">

                                            @error('title_one')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Sub Title One</label>
                                            <input type="text" class="form-control" name="sub_title_one"
                                                value="{{ $whyChooseUs?->sub_title_one }}">

                                            @error('sub_title_one')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ml-5">
                                        <label>Icon Two</label>
                                        <div role="iconpicker" name="icon_two" data-align="left"
                                            data-icon="{{ $whyChooseUs?->icon_two }}"></div>

                                        @error('icon_two')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Title Two</label>
                                            <input type="text" class="form-control" name="title_two"
                                                value="{{ $whyChooseUs?->title_two }}">

                                            @error('title_two')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Sub Title Two</label>
                                            <input type="text" class="form-control" name="sub_title_two"
                                                value="{{ $whyChooseUs?->sub_title_two }}">

                                            @error('sub_title_two')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ml-5">
                                        <label>Icon Three</label>
                                        <div role="iconpicker" name="icon_three" data-align="left"
                                            data-icon="{{ $whyChooseUs?->icon_three }}"></div>

                                        @error('icon_three')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Title Three</label>
                                            <input type="text" class="form-control" name="title_three"
                                                value="{{ $whyChooseUs?->title_three }}">

                                            @error('title_three')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Sub Title Three</label>
                                            <input type="text" class="form-control" name="sub_title_three"
                                                value="{{ $whyChooseUs?->sub_title_three }}">

                                            @error('sub_title_three')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
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
