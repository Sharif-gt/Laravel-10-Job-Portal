@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Subscribers</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4>Create Message</h4>
                        </div>
                        <form action="{{ route('admin.send-mail') }}" method="POST">
                            @csrf

                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Subject</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="subject" class="form-control"
                                                value="{{ old('subject') }}">

                                            @error('subject')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Message</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="summernote" name="message" value="{{ old('message') }}"></textarea>

                                            @error('message')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-left">
                                <button class="btn btn-primary">Send Mail</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Subscribers</h4>
                            <div class="card-header-form">
                                <form action="{{ route('admin.subscribers') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="search"
                                            value="{{ request('search') }}">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse ($allSubscribers as $item)
                                        <tr>
                                            <td>{{ $item?->email }}</td>
                                            <td style="width: 20%">
                                                <a href="{{ route('admin.subscribers.destroy', $item->id) }}"
                                                    class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No Result Found</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                @if ($allSubscribers->hasPages())
                                    {{ $allSubscribers->withQueryString()->links() }}
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
