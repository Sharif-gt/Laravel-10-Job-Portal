@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Plans</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">

                        <div class="card-header">
                            <h4>Edit Plan</h4>
                        </div>
                        <form action="{{ route('admin.plans.update', $plans?->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <!--lebel-->
                                <div class="form-group">
                                    <label>Leble</label>
                                    <input type="text" class="form-control" name="lable" value="{{ $plans?->lable }}">

                                    @error('lable')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!--Price-->
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control" name="price" value="{{ $plans?->price }}">

                                    @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!--job_limit-->
                                <div class="form-group">
                                    <label>Job Limit</label>
                                    <input type="text" class="form-control" name="job_limit"
                                        value="{{ $plans?->job_limit }}">

                                    @error('job_limit')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!--feature_job_limit-->
                                <div class="form-group">
                                    <label>Feature Job Limit</label>
                                    <input type="text" class="form-control" name="feature_job_limit"
                                        value="{{ $plans?->feature_job_limit }}">

                                    @error('feature_job_limit')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!--highlight_job_limit-->
                                <div class="form-group">
                                    <label>Highlight Job Limit</label>
                                    <input type="text" class="form-control" name="highlight_job_limit"
                                        value="{{ $plans?->highlight_job_limit }}">

                                    @error('highlight_job_limit')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!--profile_verified-->
                                <div class="form-group">
                                    <label>Profile Verified</label>
                                    <select class="form-control" name="profile_verified" aria-hidden="true">
                                        <option @selected($plans?->profile_verified === 0) value="0">No</option>
                                        <option @selected($plans?->profile_verified === 1) value="1">Yes</option>
                                    </select>

                                    @error('profile_verified')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!--recommended-->
                                <div class="form-group">
                                    <label>Recommended</label>
                                    <select class="form-control" name="recommended" aria-hidden="true">
                                        <option @selected($plans?->recommended === 0) value="0">No</option>
                                        <option @selected($plans?->recommended === 1) value="1">Yes</option>
                                    </select>

                                    @error('recommended')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!--frontend_show-->
                                <div class="form-group">
                                    <label>Frontend Show</label>
                                    <select class="form-control" name="frontend_show" aria-hidden="true">
                                        <option @selected($plans?->frontend_show === 0) value="0">No</option>
                                        <option @selected($plans?->frontend_show === 1) value="1">Yes</option>
                                    </select>

                                    @error('frontend_show')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!--home_show-->
                                <div class="form-group">
                                    <label>Show in Home page</label>
                                    <select class="form-control" name="home_show" aria-hidden="true">
                                        <option @selected($plans?->home_show === 0) value="0">No</option>
                                        <option @selected($plans?->home_show === 1) value="1">Yes</option>
                                    </select>

                                    @error('home_show')
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
