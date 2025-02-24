@extends('frontend.pages.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Edit Jobs</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                            <li>Edit Jobs</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row">

                <!-- Sideber -->
                @include('frontend.company-dashboard.layouts.sidebar')

                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <div class="card-body">
                        <form action="{{ route('company.jobs-post.update', $jobPost->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card">
                                <div class="card-header">
                                    <h4>Job Details</h4>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <!--title-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Title *</label>
                                                <input type="text" class="form-control" name="title"
                                                    value="{{ $jobPost?->title }}">

                                                @error('title')
                                                    <p class="alert alert-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--category-->
                                        <div class="col-md-6">
                                            <div class="form-group select-style">
                                                <label>Category *</label>
                                                <select class="form-control form-icons select-active" name="category"
                                                    aria-hidden="true">
                                                    <option value="">Select</option>
                                                    @foreach ($category as $item)
                                                        <option @selected($item?->id === $jobPost?->job_category_id) value="{{ $item?->id }}">
                                                            {{ $item?->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('category')
                                                    <p class="alert alert-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--vacancies-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Total Vacancies *</label>
                                                <input type="text" class="form-control" name="vacancies"
                                                    value="{{ $jobPost?->vacancies }}">

                                                @error('vacancies')
                                                    <p class="alert alert-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--deadline-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Deadline *</label>
                                                <input type="text" class="form-control datepicker" name="deadline"
                                                    value="{{ $jobPost?->deadline }}">

                                                @error('deadline')
                                                    <p class="alert alert-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4>Location</h4>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <!--country-->
                                        <div class="col-md-4">
                                            <div class="form-group select-style">
                                                <label>Country</label>
                                                <select class="form-control country form-icons select-active"
                                                    name="country">
                                                    <option value="">Select</option>
                                                    @foreach ($country as $item)
                                                        <option @selected($item?->id === $jobPost?->country_id) value="{{ $item?->id }}">
                                                            {{ $item?->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('country')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--state-->
                                        <div class="col-md-4">
                                            <div class="form-group select-style">
                                                <label>State</label>
                                                <select class="form-control form-icons select-active state" name="state">
                                                    <option value="">Select</option>
                                                    @foreach ($state as $item)
                                                        <option @selected($item?->id === $jobPost?->state_id) value="{{ $item?->id }}">
                                                            {{ $item?->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('state')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--city-->
                                        <div class="col-md-4">
                                            <div class="form-group select-style">
                                                <label>City</label>
                                                <select class="form-control form-icons select-active city" name="city">
                                                    <option value="">Select</option>
                                                    @foreach ($city as $item)
                                                        <option @selected($item?->id === $jobPost?->city_id) value="{{ $item?->id }}">
                                                            {{ $item?->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('city')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--address-->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="address"
                                                    value="{{ $jobPost?->address }}">

                                                @error('address')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4>Salary Details</h4>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <!--salary mode-->
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-group d-flex">
                                                        <input @checked($jobPost?->salary_mode === 'range')
                                                            style="height: 20px; width: 20px; margin-right: 10px;"
                                                            onclick="salaryModeChnage('salary_range')" type="radio"
                                                            id="salary_range" class="from-control" name="salary_mode"
                                                            checked value="range">
                                                        <label for="salary_range">Salary Range </label>

                                                        @error('salary_range')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group d-flex">
                                                        <input @checked($jobPost?->salary_mode === 'custom')
                                                            style="height: 20px; width: 20px; margin-right: 10px;"
                                                            onclick="salaryModeChnage('custom_salary')" type="radio"
                                                            id="custom_salary" class="from-control" name="salary_mode"
                                                            value="custom">
                                                        <label for="custom_salary">Custom Salary </label>

                                                        @error('custom_salary')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 salary_range_part">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Minimum Salary *</label>
                                                        <input type="text" class="form-control" name="min_salary"
                                                            value="{{ $jobPost?->min_salary }}">

                                                        @error('min_salary')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Maximum Salary *</label>
                                                        <input type="text" class="form-control" name="max_salary"
                                                            value="{{ $jobPost?->max_salary }}">

                                                        @error('max_salary')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 custom_salary_part d-none">
                                            <div class="form-group">
                                                <label for="">Custom Salary *</label>
                                                <input type="text" class="form-control" name="custom_salary"
                                                    value="{{ $jobPost?->custom_salary }}">

                                                @error('custom_salary')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--salary-->
                                        <div class="col-md-6">
                                            <div class="form-group select-style">
                                                <label>Salary Type</label>
                                                <select class="form-control form-icons select-active" name="salary_type"
                                                    aria-hidden="true">
                                                    <option value="">Select</option>
                                                    @foreach ($salaryType as $item)
                                                        <option @selected($item?->id === $jobPost?->salary_type_id) value="{{ $item?->id }}">
                                                            {{ $item?->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('salary_type')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4>Attributes</h4>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <!--Experience-->
                                        <div class="col-md-4">
                                            <div class="form-group select-style">
                                                <label>Experience *</label>
                                                <select class="form-control form-icons select-active" name="experience"
                                                    aria-hidden="true">
                                                    <option value="">Select</option>
                                                    @foreach ($experience as $item)
                                                        <option @selected($item?->id === $jobPost?->job_experience_id) value="{{ $item?->id }}">
                                                            {{ $item?->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('experience')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--job role-->
                                        <div class="col-md-4">
                                            <div class="form-group select-style">
                                                <label>Job Role *</label>
                                                <select class="form-control form-icons select-active" name="job_role"
                                                    aria-hidden="true">
                                                    <option value="">Select</option>
                                                    @foreach ($jobRole as $item)
                                                        <option @selected($item?->id === $jobPost?->job_role_id) value="{{ $item?->id }}">
                                                            {{ $item?->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('job_role')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--Education-->
                                        <div class="col-md-4">
                                            <div class="form-group select-style">
                                                <label>Education *</label>
                                                <select class="form-control form-icons select-active" name="education"
                                                    aria-hidden="true">
                                                    <option value="">Select</option>
                                                    @foreach ($education as $item)
                                                        <option @selected($item?->id === $jobPost?->education_id) value="{{ $item?->id }}">
                                                            {{ $item?->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('education')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--Job Type-->
                                        <div class="col-md-6">
                                            <div class="form-group select-style">
                                                <label>Job Type *</label>
                                                <select class="form-control form-icons select-active" name="job_type"
                                                    aria-hidden="true">
                                                    <option value="">Select</option>
                                                    @foreach ($jobType as $item)
                                                        <option @selected($item?->id === $jobPost?->job_type_id) value="{{ $item?->id }}">
                                                            {{ $item?->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('job_type')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--Tags-->
                                        @php
                                            $postTag = $jobPost->postTag()->pluck('tag_id')->toArray() ?? [];
                                        @endphp
                                        <div class="col-md-6">
                                            <div class="form-group select-style">
                                                <label>Tags *</label>
                                                <select class="form-control form-icons select-active" multiple
                                                    name="tags[]" aria-hidden="true">
                                                    <option value="">Select</option>
                                                    @foreach ($tags as $item)
                                                        <option @selected(in_array($item?->id, $postTag)) value="{{ $item?->id }}">
                                                            {{ $item?->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('tags')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--Benefits-->
                                        @php
                                            $jobBenefit = $jobPost->jobBenefit()->pluck('name')->toArray();
                                            $benefit = implode(',', $jobBenefit);
                                        @endphp
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Benefits *</label>
                                                <input type="text" class="form-control inputtags" name="benefits"
                                                    value="{{ $benefit }}">

                                                @error('benefits')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--Skills-->
                                        @php
                                            $jobBenefit = $jobPost->jobSkill()->pluck('skill_id')->toArray() ?? [];
                                        @endphp
                                        <div class="col-md-12">
                                            <div class="form-group select-style">
                                                <label>Skills *</label>
                                                <select class="form-control form-icons select-active" multiple
                                                    name="skills[]" aria-hidden="true">
                                                    <option value="">Select</option>
                                                    @foreach ($skills as $item)
                                                        <option @selected(in_array($item?->id, $jobBenefit)) value="{{ $item?->id }}">
                                                            {{ $item?->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('skills')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4>Application Options</h4>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <!--receive_applications-->
                                        <div class="col-md-6">
                                            <div class="form-group select-style">
                                                <label>Receive Applications *</label>
                                                <select class="form-control form-icons select-active"
                                                    name="receive_applications" aria-hidden="true">
                                                    <option @selected($jobPost?->apply_on === 'app') value="app">On Our Platform
                                                    </option>
                                                    <option @selected($jobPost?->apply_on === 'email') value="email">On your email
                                                        address</option>
                                                    <option @selected($jobPost?->apply_on === 'custom_url') value="custom_url">On a custom
                                                        link</option>
                                                </select>

                                                @error('receive_applications')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4>Promote</h4>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <!--Promote option-->
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-group d-flex">
                                                        <input @checked($jobPost?->featured === 1)
                                                            style="height: 20px; width: 20px; margin-right: 10px;"
                                                            type="checkbox" id="featured" class="from-control"
                                                            name="featured" value="1">
                                                        <label for="featured">Featured </label>

                                                        @error('featured')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group d-flex">
                                                        <input @checked($jobPost?->highlight === 1)
                                                            style="height: 20px; width: 20px; margin-right: 10px;"
                                                            type="checkbox" id="highlight" class="from-control"
                                                            name="highlight" value="1">
                                                        <label for="highlight">Highlight </label>

                                                        @error('highlight')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4>Description</h4>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <!--Description-->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description *</label>
                                                <textarea id="editor" name="description">{!! $jobPost?->description !!}</textarea>

                                                @error('description')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div style="margin-top: 10px;" class="card-footer text-left">
                                <button style="background-color: #1ca774; border: none;"
                                    class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mt-80"></div>
@endsection

@push('script')
    <script>
        $(".inputtags").tagsinput('items');

        function salaryModeChnage(mode) {
            if (mode == 'salary_range') {
                $('.salary_range_part').removeClass('d-none')
                $('.custom_salary_part').addClass('d-none')
            } else if (mode == 'custom_salary') {
                $('.salary_range_part').addClass('d-none')
                $('.custom_salary_part').removeClass('d-none')
            }
        }

        // country,state,city ajax
        $(document).ready(function() {
            $(".country").on("change", function() {
                let country_id = $(this).val();
                $(".city").html("");

                $.ajax({
                    method: "GET",
                    url: "{{ route('get-states', ':id') }}".replace(':id', country_id),
                    data: {},
                    success: function(response) {
                        let html = "";

                        $.each(response, function(index, value) {
                            html += `<option value="${value.id}">${value.name}</option>`
                        });
                        $(".state").html(html);
                    },
                    error: function(xhr, status, error) {}
                });
            })

            $(".state").on("change", function() {
                let state_id = $(this).val();

                $.ajax({
                    method: "GET",
                    url: "{{ route('get-cities', ':id') }}".replace(':id', state_id),
                    data: {},
                    success: function(response) {
                        let html = "";

                        $.each(response, function(index, value) {
                            html += `<option value="${value.id}">${value.name}</option>`
                        });
                        $(".city").html(html);
                    },
                    error: function(xhr, status, error) {}
                });
            })
        })
    </script>
@endpush
