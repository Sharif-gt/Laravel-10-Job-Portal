@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create State</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">

                        <div class="card-header">
                            <h4>Create State</h4>
                        </div>
                        <form action="{{ route('admin.state.store') }}" method="POST">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Select Country</label>
                                    <select class="form-control select2" name="country_id" aria-hidden="true">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country?->id }}">{{ $country?->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('country_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>State Name</label>
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
