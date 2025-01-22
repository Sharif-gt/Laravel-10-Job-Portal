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
                        @include('frontend.candidate-dashboard.layouts.profile-besic')

                        <!--Candidate Profile -->
                        @include('frontend.candidate-dashboard.layouts.profile-profile')

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
