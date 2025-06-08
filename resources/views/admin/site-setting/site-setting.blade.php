@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Site Settings</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-7 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Setting</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-2">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4"
                                                role="tab" aria-controls="home" aria-selected="true">General Setting</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-10">
                                    <div class="tab-content no-padding" id="myTab2Content">
                                        <!--paypal-->
                                        @include('admin.site-setting.section.general-setting')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
