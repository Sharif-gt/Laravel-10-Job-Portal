<div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <form action="{{ route('admin.payment-setting.store') }}" method="POST">
            @csrf

            <div class="row">
                <!--paypal status-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Paypal Status</label>
                        <select class="form-control" name="paypal_status" aria-hidden="true">
                            <option @selected(config('gatewaySetting.paypal_status' === 'active')) value="active">Active</option>
                            <option @selected(config('gatewaySetting.paypal_status' === 'inactive')) value="inactive">Inactive</option>
                        </select>

                        @error('paypal_status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!--paypal account mode-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Paypal Account Mode</label>
                        <select class="form-control" name="paypal_mode" aria-hidden="true">
                            <option @selected(config('gatewaySetting.paypal_mode' === 'sandbox')) value="sandbox">Sandbox</option>
                            <option @selected(config('gatewaySetting.paypal_mode' === 'live')) value="live">Live</option>
                        </select>

                        @error('paypal_mode')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!--paypal country-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Paypal Country Name</label>
                        <select class="form-control select2" name="paypal_country" aria-hidden="true">
                            <option value="">Select</option>
                            @foreach (config('countries') as $key => $value)
                                <option @selected($key === config('gatewaySetting.paypal_country')) value="{{ $key }}">{{ $value }}
                                </option>
                            @endforeach
                        </select>

                        @error('paypal_country')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!--paypal currency-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Paypal Currency Name</label>
                        <select class="form-control select2" name="paypal_currency" aria-hidden="true">
                            <option value="">Select</option>
                            @foreach (config('currencies.currency_list') as $key => $value)
                                <option @selected($value === config('gatewaySetting.paypal_currency')) value="{{ $value }}">{{ $value }}
                                </option>
                            @endforeach
                        </select>

                        @error('paypal_currency')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!--paypal currency rate-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Paypal Currency Rate</label>
                        <input type="text" class="form-control" name="paypal_currency_rate"
                            value="{{ config('gatewaySetting.paypal_currency_rate') }}">

                        @error('paypal_currency_rate')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!--paypal client id-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Paypal Client Id</label>
                        <input type="text" class="form-control" name="paypal_client_id"
                            value="{{ config('gatewaySetting.paypal_client_id') }}">

                        @error('paypal_client_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!--paypal secret key-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Paypal Secret Key</label>
                        <input type="text" class="form-control" name="paypal_client_secret"
                            value="{{ config('gatewaySetting.paypal_client_secret') }}">

                        @error('paypal_client_secret')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!--paypal app id-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Paypal App Id</label>
                        <input type="text" class="form-control" name="paypal_app_id"
                            value="{{ config('gatewaySetting.paypal_app_id') }}">

                        @error('paypal_app_id')
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
