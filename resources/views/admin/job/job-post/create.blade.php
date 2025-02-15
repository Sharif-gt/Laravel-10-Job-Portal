@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create Jobs</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card-body">
                        <form action="{{ route('admin.jobs.store') }}" method="POST">
                            @csrf

                            <div class="card">
                                <div class="card-header">
                                    <h4>Job Details</h4>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <!--title-->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Title *</label>
                                                <input type="text" class="form-control" name="title" value="">

                                                @error('title')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--company-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Company *</label>
                                                <select class="form-control select2" name="company" aria-hidden="true">
                                                    <option value="">Select</option>
                                                    @foreach ($companies as $item)
                                                        <option value="{{ $item?->id }}">{{ $item?->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('company')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--category-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Category *</label>
                                                <select class="form-control select2" name="category" aria-hidden="true">
                                                    <option value="">Select</option>
                                                    @foreach ($category as $item)
                                                        <option value="{{ $item?->id }}">{{ $item?->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('category')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--vacancies-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Total Vacancies *</label>
                                                <input type="text" class="form-control" name="vacancies" value="">

                                                @error('vacancies')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--deadline-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Deadline *</label>
                                                <input type="text" class="form-control datepicker" name="deadline"
                                                    value="">

                                                @error('vacancies')
                                                    <div class="alert alert-danger">{{ $message }}</div>
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
                                            <div class="form-group">
                                                <label>Country</label>
                                                <select class="form-control select2 country" name="country"
                                                    aria-hidden="true">
                                                    <option value="">Select</option>
                                                    @foreach ($country as $item)
                                                        <option value="{{ $item?->id }}">{{ $item?->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('country')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--state-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>State</label>
                                                <select class="form-control select2 state" name="state"
                                                    aria-hidden="true">
                                                    <option value="">Select</option>
                                                </select>

                                                @error('state')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--city-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <select class="form-control select2 city" name="city" aria-hidden="true">
                                                    <option value="">Select</option>
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
                                                <input type="text" class="form-control" name="address" value="">

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
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <input onclick="salaryModeChnage('salary_range')" type="radio"
                                                            id="salary_range" class="from-control" name="salary_mode"
                                                            checked value="range">
                                                        <label for="salary_range">Salary Range </label>

                                                        @error('salary_range')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <input onclick="salaryModeChnage('custom_salary')" type="radio"
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
                                                            value="{{ old('min_salary') }}">

                                                        @error('min_salary')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Maximum Salary *</label>
                                                        <input type="text" class="form-control" name="max_salary"
                                                            value="{{ old('max_salary') }}">

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
                                                    value="{{ old('custom_salary') }}">

                                                @error('custom_salary')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--salary-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Salary Type</label>
                                                <select class="form-control select2" name="salary_type"
                                                    aria-hidden="true">
                                                    <option value="">Select</option>
                                                    @foreach ($salaryType as $item)
                                                        <option value="{{ $item?->id }}">{{ $item?->name }}</option>
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
                                            <div class="form-group">
                                                <label>Experience *</label>
                                                <select class="form-control select2" name="experience"
                                                    aria-hidden="true">
                                                    <option value="">Select</option>
                                                    @foreach ($experience as $item)
                                                        <option value="{{ $item?->id }}">{{ $item?->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('experience')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--job role-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Job Role *</label>
                                                <select class="form-control select2" name="job_role" aria-hidden="true">
                                                    <option value="">Select</option>
                                                    @foreach ($jobRole as $item)
                                                        <option value="{{ $item?->id }}">{{ $item?->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('job_role')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--Education-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Education *</label>
                                                <select class="form-control select2" name="education" aria-hidden="true">
                                                    <option value="">Select</option>
                                                    @foreach ($education as $item)
                                                        <option value="{{ $item?->id }}">{{ $item?->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('education')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--Job Type-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Job Type *</label>
                                                <select class="form-control select2" name="job_type" aria-hidden="true">
                                                    <option value="">Select</option>
                                                    @foreach ($jobType as $item)
                                                        <option value="{{ $item?->id }}">{{ $item?->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('job_type')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--Tags-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tags *</label>
                                                <select class="form-control select2" multiple name="tags[]"
                                                    aria-hidden="true">
                                                    <option value="">Select</option>
                                                    @foreach ($tags as $item)
                                                        <option value="{{ $item?->name }}">{{ $item?->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('tags')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--Benefits-->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Benefits *</label>
                                                <input type="text" class="form-control inputtags" name="benefits"
                                                    value="">

                                                @error('benefits')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--Skills-->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Skills *</label>
                                                <select class="form-control select2" multiple name="skills[]"
                                                    aria-hidden="true">
                                                    <option value="">Select</option>
                                                    @foreach ($skills as $item)
                                                        <option value="{{ $item?->id }}">{{ $item?->name }}</option>
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
                                        <!--country-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Receive Applications *</label>
                                                <select class="form-control select2" name="receive_applications"
                                                    aria-hidden="true">
                                                    <option value="app">On Our Platform</option>
                                                    <option value="email">On your email address</option>
                                                    <option value="custom_url">On a custom link</option>
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
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <input type="checkbox" id="featured" class="from-control"
                                                            name="featured" value="1">
                                                        <label for="featured">Featured </label>

                                                        @error('featured')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <input type="checkbox" id="highlight" class="from-control"
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
                                                <textarea id="editor" name="description"></textarea>

                                                @error('description')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-left">
                                <button class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
