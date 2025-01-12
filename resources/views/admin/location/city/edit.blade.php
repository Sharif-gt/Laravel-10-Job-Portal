@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Update Cities</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">

                        <div class="card-header">
                            <h4>Update City</h4>
                        </div>
                        <form action="{{ route('admin.cities.update', $cities->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <!--  Country-->
                                <div class="form-group">
                                    <label>Select Country</label>
                                    <select class="form-control select2 country" name="country_id" aria-hidden="true">
                                        <option value="">Select</option>
                                        @foreach ($countries as $country)
                                            <option @selected($cities->country_id === $country->id) value="{{ $country?->id }}">
                                                {{ $country?->name }}</option>
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
                                        @foreach ($states as $state)
                                            <option @selected($state->id === $cities->state_id) value="{{ $state?->id }}">
                                                {{ $state?->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('state_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!--  City-->
                                <div class="form-group">
                                    <label>City Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $cities->name) }}" required="">

                                    @error('name')
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
