<div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">
        <form action="{{ route('admin.site-settings.store') }}" method="POST">
            @csrf

            <div class="row">
                <!--site name-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Site Name</label>
                        <input type="text" class="form-control" name="site_name"
                            value="{{ config('generalSetting.site_name') }}">

                        @error('site_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!--site email-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Site Email</label>
                        <input type="text" class="form-control" name="site_email"
                            value="{{ config('generalSetting.site_email') }}">

                        @error('site_email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!--site phone-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Site Phone</label>
                        <input type="text" class="form-control" name="site_phone"
                            value="{{ config('generalSetting.site_phone') }}">

                        @error('site_phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!--default currency-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Site Default Currency</label>
                        <select class="form-control select2" name="site_default_currency" aria-hidden="true">
                            <option value="">Select</option>
                            @foreach (config('currencies.currency_list') as $key => $value)
                                <option @selected($value === config('generalSetting.site_default_currency')) value="{{ $value }}">{{ $value }}
                                </option>
                            @endforeach
                        </select>

                        @error('site_default_currency')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!--currency icon-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Currency Icon</label>
                        <input type="text" class="form-control" name="currency_icon"
                            value="{{ config('generalSetting.currency_icon') }}">

                        @error('currency_icon')
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
