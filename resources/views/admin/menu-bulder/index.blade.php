@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Menu Bulder</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {!! Menu::render() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    {!! Menu::scripts() !!}
@endpush
