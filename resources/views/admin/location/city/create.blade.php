@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create Cities</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">

                        <div class="card-header">
                            <h4>Create Cities</h4>
                        </div>
                        <form action="{{ route('admin.cities.store') }}" method="POST">
                            @csrf

                            <div class="card-body">
                                <!--  Country-->
                                <div class="form-group">
                                    <label>Select Country</label>
                                    <select class="form-control select2 country" name="country_id" aria-hidden="true">
                                        <option value="">Select</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country?->id }}">{{ $country?->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('country_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!--  State-->
                                <div class="form-group">
                                    <label>Select State</label>
                                    <select class="form-control select2 state" name="state_id" aria-hidden="true">
                                        <option value="">Select</option>
                                    </select>

                                    @error('state_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!--  City-->
                                <div class="form-group">
                                    <label>City Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                        required="">

                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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

<!-- Ajax request Script -->
@push('script')
    <script>
        $(document).ready(function() {
            $(".country").on("change", function() {
                let country_id = $(this).val();

                $.ajax({
                    method: "GET",
                    url: "{{ route('admin.get-states', ':id') }}".replace(':id', country_id),
                    data: {},
                    success: function(response) {
                        let html = "";

                        $.each(response, function(index, value) {
                            html += `<option value="${value.id}">${value.name}</option>`
                        });
                        $(".state").html(html);
                    },
                    error: function(xhr, status, error) {

                    }
                })
            })
        })
    </script>
@endpush
