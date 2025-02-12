<div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
    <div class="card">
        <form action="{{ route('admin.stripe-setting.store') }}" method="POST">
            @csrf

            <div class="row">
                <!--Stripe status-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Stripe Status</label>
                        <select class="form-control" name="stripe_status" aria-hidden="true">
                            <option @selected(config('gatewaySetting.stripe_status' === 'active')) value="active">Active</option>
                            <option @selected(config('gatewaySetting.stripe_status' === 'inactive')) value="inactive">Inactive</option>
                        </select>

                        @error('stripe_status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!--Stripe country-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Stripe Country Name</label>
                        <select class="form-control select2" name="stripe_country" aria-hidden="true">
                            <option value="">Select</option>
                            @foreach (config('countries') as $key => $value)
                                <option @selected($key === config('gatewaySetting.stripe_country')) value="{{ $key }}">{{ $value }}
                                </option>
                            @endforeach
                        </select>

                        @error('stripe_country')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!--stripe currency-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Stripe Currency Name</label>
                        <select class="form-control select2" name="stripe_currency" aria-hidden="true">
                            <option value="">Select</option>
                            @foreach (config('currencies.currency_list') as $key => $value)
                                <option @selected($value === config('gatewaySetting.stripe_currency')) value="{{ $value }}">{{ $value }}
                                </option>
                            @endforeach
                        </select>

                        @error('stripe_currency')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!--stripe currency rate-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Stripe Currency Rate</label>
                        <input type="text" class="form-control" name="stripe_currency_rate"
                            value="{{ config('gatewaySetting.stripe_currency_rate') }}">

                        @error('stripe_currency_rate')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!--stripe publishable key-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Stripe Publishable Key</label>
                        <input type="text" class="form-control" name="stripe_publishable_key"
                            value="{{ config('gatewaySetting.stripe_publishable_key') }}">

                        @error('stripe_publishable_key')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!--stripe secret key-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Stripe Secret Key</label>
                        <input type="text" class="form-control" name="stripe_client_secret"
                            value="{{ config('gatewaySetting.stripe_client_secret') }}">

                        @error('stripe_client_secret')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer text-left">
                <button class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
