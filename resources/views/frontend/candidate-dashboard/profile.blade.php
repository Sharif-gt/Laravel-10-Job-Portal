@extends('frontend.pages.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Profile</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>Profile</li>
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
                @include('frontend.candidate-dashboard.layouts.sidebar')

                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Basic</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Experience & Education</button>
                        </li>
                        <li class="nav-item" role="presentation"> <button class="nav-link" id="pills-contact-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab"
                                aria-controls="pills-contact" aria-selected="false">Account Setting</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">

                        <!-- Basic info -->

                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">

                            <form method="POST" action="" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <!-- Profile Picture -->
                                    <div class="col-md-6">
                                        {{-- <x-image-preview :height="200" :width="200" :source="$companieInfo?->logo" /> --}}
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Profile Picture *</label>
                                            <input class="form-control" name="image" type="file" value="">

                                            @error('image')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- CV -->
                                    <div class="col-md-6">
                                        {{-- <x-image-preview :height="200" :width="300" :source="$companieInfo?->banner" /> --}}
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">CV</label>
                                            <input class="form-control" name="cv" type="file" value="">

                                            @error('cv')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Full Name -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Full Name *</label>
                                            <input class="form-control" name="full_name" type="text" value="">

                                            @error('full_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Title -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Title</label>
                                            <input class="form-control" name="title" type="text" value="">

                                            @error('title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Experience Level -->
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Experience Level *</label>
                                            <select class="form-control country form-icons select-active"
                                                name="experience_level">
                                                <option value="">Select</option>

                                            </select>

                                            @error('experience_level')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Website -->
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Website</label>
                                            <input class="form-control" name="website" type="text" value="">

                                            @error('website')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Date of Birth -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Date of Birth</label>
                                            <input class="form-control datepicker" name="date_of_birth" type="text"
                                                value="" placeholder="yyyy/mm/dd">

                                            @error('date_of_birth')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="box-button mt-15 col-md-4">
                                        <button type="submit" class="btn btn-apply-big font-md font-bold">Save All
                                            Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!--Founding Info -->
                        {{-- <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                            <form method="POST" action="{{ route('company.profile.founding.info') }}">
                                @csrf

                                <div class="row">
                                    <!-- Industry Type -->
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Industry Type *</label>
                                            <select class="form-control form-icons select-active" name="industry_type_id">
                                                <option value="">Select</option>
                                                @foreach ($Industrys as $Industry)
                                                    <option @selected($Industry->id === $companieInfo->industry_type_id) value="{{ $Industry?->id }}">
                                                        {{ $Industry?->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('industry_type_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Organization Type -->
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Organization Type *</label>
                                            <select class="form-control form-icons select-active"
                                                name="organization_type_id">
                                                <option value="">Select</option>
                                                @foreach ($organizations as $organization)
                                                    <option @selected($organization->id === $companieInfo->organization_type_id) value="{{ $organization?->id }}">
                                                        {{ $organization?->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('organization_type_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Team Size -->
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Team Size *</label>
                                            <select class="form-control form-icons select-active" name="team_size_id">
                                                <option value="">Select</option>
                                                @foreach ($teamSize as $team)
                                                    <option @selected($team->id === $companieInfo->team_size_id) value="{{ $team?->id }}">
                                                        {{ $team?->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('team_size_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Email *</label>
                                            <input class="form-control" name="email" type="email"
                                                value="{{ $companieInfo?->email }}">

                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Phone -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Phone *</label>
                                            <input class="form-control" name="phone" type="text"
                                                value="{{ $companieInfo?->phone }}">

                                            @error('phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Establishment Date -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Establishment Date *</label>
                                            <input class="form-control datepicker" name="establishment_date"
                                                type="text" value="{{ $companieInfo?->establishment_date }}"
                                                placeholder="yyyy/mm/dd">

                                            @error('establishment_date')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Website Link -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Website Link</label>
                                            <input class="form-control" name="website" type="text"
                                                value="{{ $companieInfo?->website }}">

                                            @error('website')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Country -->
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Country *</label>
                                            <select class="form-control country form-icons select-active" name="country">
                                                <option value="">Select</option>
                                                @foreach ($countries as $country)
                                                    <option @selected($country->id === $companieInfo->country) value="{{ $country?->id }}">
                                                        {{ $country?->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('country')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- State -->
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">State</label>
                                            <select class="form-control state form-icons select-active" name="state">
                                                <option value="">Select</option>
                                                @foreach ($states as $state)
                                                    <option @selected($state->id === $companieInfo->state) value="{{ $state->id }}">
                                                        {{ $state->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('state')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- City -->
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">City</label>
                                            <select class="form-control city form-icons select-active" name="city">
                                                <option value="">Select</option>
                                                @foreach ($cities as $city)
                                                    <option @selected($city->id === $companieInfo->city) value="{{ $city->id }}">
                                                        {{ $city->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('city')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Address -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Address</label>
                                            <input class="form-control" name="address" type="text"
                                                value="{{ $companieInfo?->address }}">

                                            @error('address')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Map Link -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Map Link</label>
                                            <input class="form-control" name="map_link" type="text"
                                                value="{{ $companieInfo?->map_link }}">

                                            @error('map_link')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="box-button mt-15 col-md-4">
                                        <button type="submit" class="btn btn-apply-big font-md font-bold">Save All
                                            Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}

                        <!--Account Setting -->
                        <!--<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">hhhh</div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- Ajax request Script -->
@push('script')
    <script>
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
