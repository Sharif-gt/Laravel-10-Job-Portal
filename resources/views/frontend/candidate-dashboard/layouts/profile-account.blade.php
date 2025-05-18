<!--Account Setting -->
<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
    <!--Location and Contact Info -->
    <h4 class="mb-3">Location and Contact Info</h4>
    <form method="POST" action="{{ route('candidate.account-settings') }}">
        @csrf

        <div class="row">
            <!-- Country -->
            <div class="col-md-4">
                <div class="form-group select-style">
                    <label class="font-sm color-text-mutted mb-10">Country *</label>
                    <select class="form-control country form-icons select-active" name="country">
                        <option value="">Select</option>
                        @foreach ($countries as $country)
                            <option @selected($country?->id === $candidatesInfo?->country) value="{{ $country?->id }}">
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
                            <option @selected($state?->id === $candidatesInfo?->state) value="{{ $state->id }}">
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
                            <option @selected($city->id === $candidatesInfo?->city) value="{{ $city->id }}">
                                {{ $city->name }}</option>
                        @endforeach
                    </select>

                    @error('city')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Address -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Address</label>
                    <input class="form-control" name="address" type="text" value="{{ $candidatesInfo?->address }}">

                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Phone one -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Phone Number *</label>
                    <input class="form-control" name="phone_number" type="number"
                        value="{{ $candidatesInfo?->phone_one }}">

                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- phone two -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Secondary Phone</label>
                    <input class="form-control" name="secondary_phone" type="number"
                        value="{{ $candidatesInfo?->phone_two }}">

                    @error('address')
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

    <!--account email -->
    <hr>
    <h4 class="mt-3 mb-3">Change Email Address</h4>
    <form method="POST" action="{{ route('candidate.account-email') }}">
        @csrf

        <div class="row">
            <!-- email -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Email</label>
                    <input class="form-control" name="email" type="email" value="{{ auth()->user()->email }}">

                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box-button mt-15 col-md-4">
                <button type="submit" class="btn btn-apply-big font-md font-bold">Change Email</button>
            </div>
        </div>
    </form>

    <!--account password -->
    <hr>
    <h4 class="mt-3 mb-3">Change Password</h4>
    <form method="POST" action="{{ route('candidate.account-password') }}">
        @csrf

        <div class="row">
            <!-- password -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Password</label>
                    <input class="form-control" name="password" type="password" value="">

                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- confirm password -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Confirm Password</label>
                    <input class="form-control" name="password_confirmation" type="password" value="">

                    @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box-button mt-15 col-md-4">
                <button type="submit" class="btn btn-apply-big font-md font-bold">Change Password</button>
            </div>
        </div>
    </form>
</div>

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
