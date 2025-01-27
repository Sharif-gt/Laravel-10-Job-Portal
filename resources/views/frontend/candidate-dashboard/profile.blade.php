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
                                data-bs-target="#pills-experience" type="button" role="tab"
                                aria-controls="pills-experience" aria-selected="false">Experience & Education</button>
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

                        <!--Candidate profile-ecperience -->
                        @include('frontend.candidate-dashboard.layouts.profile-ecperience')

                        <!--Account Setting -->
                        <!--<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">hhhh</div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Experience model -->
    @include('frontend.candidate-dashboard.layouts.ecperience-model')
    @include('frontend.candidate-dashboard.layouts.experience-edit-model')
    @include('frontend.candidate-dashboard.layouts.education-model')
    @include('frontend.candidate-dashboard.layouts.education-edit-model')
@endsection

<!-- Ajax request Script -->
@push('script')
    <script>
        $(document).ready(function() {
            // EXPERIENCE SECTION
            // Ajax function for fetch experience data
            function fetchExperience() {
                $.ajax({
                    method: "GET",
                    url: "{{ route('candidate.add-experience.index') }}",
                    data: {},
                    success: function(response) {
                        $(".experience-tbody").html(response);
                    },
                    error: function(xhr, status, error) {}
                })
            }
            // Add Experience.....
            $("#experienceAdd").on("submit", function(e) {
                e.preventDefault();
                const experienceData = $(this).serialize();
                $.ajax({
                    method: "POST",
                    url: "{{ route('candidate.add-experience.store') }}",
                    data: experienceData,
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        $("#experienceAdd").trigger("reset");
                        $('#experienceModel').modal('hide');
                        fetchExperience();
                        hideLoader();
                        notyf.success(response.message);
                    },
                    error: function(xhr, status, error) {

                    }
                });
            });
            // Edit experience show
            $("body").on("click", ".editExperience", function(e) {
                // Reset the form before populating it
                $("#experienceEdit").trigger("reset");

                let url = $(this).attr('href');

                $.ajax({
                    method: "GET",
                    url: url,
                    data: {},
                    success: function(response) {
                        editId = response.id;
                        $.each(response, function(index, value) {
                            $(`input[name="${index}"]:text`).val(value);
                            if (index === 'currently_working' && value == 1) {
                                $(`input[name="${index}"]:checkbox`).prop('checked',
                                    true);
                            }
                            if (index === 'responsibility') {
                                $(`textarea[name="${index}"]`).val(value);
                            }
                        })
                    },
                    error: function(xhr, status, error) {}
                });
            })
            // update experience
            $("body").on("submit", "#experienceEdit", function(e) {
                e.preventDefault();
                const experienceData = $(this).serialize();
                $.ajax({
                    method: "PUT",
                    url: "{{ route('candidate.add-experience.update', ':id') }}".replace(':id',
                        editId),
                    data: experienceData,
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        $("#experienceEdit").trigger("reset");
                        $('#experienceEditModel').modal('hide');
                        fetchExperience();
                        hideLoader();
                        notyf.success(response.message);
                    },
                    error: function(xhr, status, error) {}
                });
            })
            // sweet alert for experience delete
            $("body").on("click", ".delete-item", function(e) {
                e.preventDefault();

                Swal.fire({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = $(this).attr('href');
                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            beforeSend: function() {
                                showLoader();
                            },
                            success: function(response) {
                                fetchExperience();
                                hideLoader();
                                notyf.success(response.message);
                            },
                            error: function(xhr, status, error) {
                                swal(xhr.responseJSON.message, {
                                    icon: 'error',
                                });
                            }
                        })
                    }
                });
            })

            // EDUCATION SECTION

            // Add Education.....
            // Ajax function for fetch education data
            function fetchEducation() {
                $.ajax({
                    method: "GET",
                    url: "{{ route('candidate.add-education.index') }}",
                    data: {},
                    success: function(response) {
                        $(".education-tbody").html(response);
                    },
                    error: function(xhr, status, error) {}
                })
            }
            $("#educationAdd").on("submit", function(e) {
                e.preventDefault();
                const educationData = $(this).serialize();
                $.ajax({
                    method: "POST",
                    url: "{{ route('candidate.add-education.store') }}",
                    data: educationData,
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        $("#educationAdd").trigger("reset");
                        $('#educationModel').modal('hide');
                        fetchEducation();
                        hideLoader();
                        notyf.success(response.message);
                    },
                    error: function(xhr, status, error) {

                    }
                });
            });

            // Edit education show
            $("body").on("click", ".editEducation", function(e) {
                // Reset the form before populating it
                $("#educationEdit").trigger("reset");

                let url = $(this).attr('href');

                $.ajax({
                    method: "GET",
                    url: url,
                    data: {},
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        editId = response.id;
                        $.each(response, function(index, value) {
                            $(`input[name="${index}"]:text`).val(value);
                            if (index === 'note') {
                                $(`textarea[name="${index}"]`).val(value);
                            }
                        })
                        hideLoader();
                    },
                    error: function(xhr, status, error) {}
                });
            })

            // update education
            $("body").on("submit", "#educationEdit", function(e) {
                e.preventDefault();
                const educationData = $(this).serialize();
                $.ajax({
                    method: "PUT",
                    url: "{{ route('candidate.add-education.update', ':id') }}".replace(':id',
                        editId),
                    data: educationData,
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        $("#educationEdit").trigger("reset");
                        $('#educationEditModel').modal('hide');
                        fetchEducation();
                        hideLoader();
                        notyf.success(response.message);
                    },
                    error: function(xhr, status, error) {}
                });
            })

            // sweet alert for experience delete
            $("body").on("click", ".delete-item", function(e) {
                e.preventDefault();

                Swal.fire({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = $(this).attr('href');
                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            beforeSend: function() {
                                showLoader();
                            },
                            success: function(response) {
                                fetchEducation();
                                hideLoader();
                                notyf.success(response.message);
                            },
                            error: function(xhr, status, error) {
                                swal(xhr.responseJSON.message, {
                                    icon: 'error',
                                });
                            }
                        })
                    }
                });
            })
            // END EDUCATION SECTION

        })
    </script>
@endpush
