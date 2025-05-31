@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Clear Database</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Clear Database</h4>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-warning alert-has-icon">
                                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                <div class="alert-body">
                                    <div class="alert-title">Danger</div>
                                    if you fire this action this will wipe your entire database...
                                </div>
                                <form action="" class="mt-2 clear-db">
                                    <button class="btn btn-danger submit-button" type="submit">Clear Database</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.clear-db').on('submit', function(e) {
                e.preventDefault();

                swal({
                        title: 'Are you sure?',
                        text: 'Once deleted, this will wipe your entire database!',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajax({
                                method: 'POST',
                                url: "{{ route('admin.clear-database') }}",
                                data: {
                                    _token: "{{ csrf_token() }}"
                                },
                                beforeSend: function() {
                                    swal('Clearing database please wait don\'t refresh the page', {
                                        icon: 'info',
                                        buttons: false,
                                        closeOnClickOutside: false,
                                    });
                                },
                                success: function(response) {
                                    swal(response.message, {
                                        icon: 'success',
                                    });
                                    window.location.reload();
                                },
                                error: function(xhr, status, error) {
                                    swal(xhr.responseJSON.message, {
                                        icon: 'error',
                                    });
                                }
                            })
                        }
                    });
            });
        });
    </script>
@endpush
