@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Update State</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">

                        <div class="card-header">
                            <h4>Update State</h4>
                        </div>
                        <form action="{{ route('admin.state.update', $states->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Select Country</label>
                                    <select class="form-control select2" name="country_id" aria-hidden="true">
                                        @foreach ($countries as $country)
                                            <option @selected($states->country_id === $country->id) value="{{ $country?->id }}">
                                                {{ $country?->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('country_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>State Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $states->name }}"
                                        required="">

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
