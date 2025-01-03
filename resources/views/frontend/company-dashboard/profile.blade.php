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
                @include('frontend.company-dashboard.layouts.sidebar')

                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Company Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Founding Info</button>
                        </li>
                        <!-- <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                        aria-selected="false">Account Setting</button>
                                </li>  -->
                    </ul>
                    <div class="tab-content" id="pills-tabContent">

                        <!-- Company Info -->
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">

                            <form action="">
                                <div class="row">
                                    <!-- Logo -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Logo *</label>
                                            <input class="form-control" name="logo" type="file" value="">
                                        </div>
                                    </div>
                                    <!-- Banner -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Banner *</label>
                                            <input class="form-control" name="banner" type="file" value="">
                                        </div>
                                    </div>
                                    <!-- User Name -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">User Name *</label>
                                            <input class="form-control" name="username" type="text" value="">
                                        </div>
                                    </div>
                                    <!-- Company Name -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Company Name *</label>
                                            <input class="form-control" name="name" type="text" value="">
                                        </div>
                                    </div>
                                    <!-- Company Bio -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Company Bio *</label>
                                            <textarea name="bio" id="" class=""></textarea>
                                        </div>
                                    </div>
                                    <!-- Company Vision -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Company Vision *</label>
                                            <textarea name="vision" id="" class=""></textarea>
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
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                            <form action="">
                                <div class="row">
                                    <!-- Industry Type -->
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Industry Type *</label>
                                            <select class="form-control form-icons select-active" name="industry_type_id">
                                                <option>Select</option>
                                                <option>test1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Organization Type -->
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Organization Type *</label>
                                            <select class="form-control form-icons select-active"
                                                name="organization_type_id">
                                                <option>Select</option>
                                                <option>test1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Team Size -->
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Team Size *</label>
                                            <select class="form-control form-icons select-active" name="team_size_id">
                                                <option>Select</option>
                                                <option>test1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Email *</label>
                                            <input class="form-control" name="email" type="email" value="">
                                        </div>
                                    </div>
                                    <!-- Phone -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Phone *</label>
                                            <input class="form-control" name="phone" type="text" value="">
                                        </div>
                                    </div>
                                    <!-- Establishment Date -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Establishment Date *</label>
                                            <input class="form-control datepicker" name="establishment_date"
                                                type="text" value="" placeholder="mm/dd/yyyy">
                                        </div>
                                    </div>
                                    <!-- Website Link -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Website Link</label>
                                            <input class="form-control" name="website" type="text" value="">
                                        </div>
                                    </div>
                                    <!-- Country -->
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Country *</label>
                                            <select class="form-control form-icons select-active" name="country">
                                                <option>Select</option>
                                                <option>test1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- State -->
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">State</label>
                                            <select class="form-control form-icons select-active" name="state">
                                                <option>Select</option>
                                                <option>test1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- City -->
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">City</label>
                                            <select class="form-control form-icons select-active" name="city">
                                                <option>Select</option>
                                                <option>test1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Address -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Address</label>
                                            <input class="form-control" name="address" type="text" value="">
                                        </div>
                                    </div>
                                    <!-- Map Link -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Map Link</label>
                                            <input class="form-control" name="map_link" type="text" value="">
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

                        <!--Account Setting -->
                        <!--<div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                        aria-labelledby="pills-contact-tab">hhhh</div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
