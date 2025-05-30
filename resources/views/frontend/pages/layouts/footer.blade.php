<section style="margin-top: 70px;" class="section-box subscription_box">
    <div class="container">
        <div class="box-newsletter">
            <div class="newsletter_textarea">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="text-md-newsletter">Subscribe our newsletter</h2>
                    </div>
                    <div class="col-lg-6">
                        <div class="box-form-newsletter">
                            <form class="form-newsletter">
                                @csrf
                                <input class="input-newsletter" type="text" name="email" value=""
                                    placeholder="Enter your email here">
                                <button class="btn btn-default font-heading submit" type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer pt-165">
    <div class="container">
        <div class="row justify-content-between">
            <div class="footer-col-1 col-md-3 col-sm-12">
                <a class="footer_logo" href="index.html">
                    <img alt="joblist" src="{{ asset('frontend/assets/imgs/template/logo_2.png') }}">
                </a>
                <div class="mt-20 mb-20 font-xs color-text-paragraph-2">joblist is the heart of the design
                    community and the
                    best resource to discover and connect with designers and jobs worldwide.</div>
                <div class="footer-social">
                    <a class="icon-socials icon-facebook" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="icon-socials icon-twitter" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="icon-socials icon-linkedin" href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            @php
                $footerOne = Menu::getByName('Footer Menu One ');
                $footerTwo = Menu::getByName('Footer Menu Two ');
                $footerThree = Menu::getByName('Footer Menu Three ');
                $footerFour = Menu::getByName('Footer Menu Four ');
            @endphp

            <div class="footer-col-2 col-md-2 col-xs-6">
                <h6 class="mb-20">Resources</h6>
                <ul class="menu-footer">
                    @foreach ($footerOne as $one)
                        <li><a href="{{ $one['link'] }}">{{ $one['label'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="footer-col-3 col-md-2 col-xs-6">
                <h6 class="mb-20">Community</h6>
                <ul class="menu-footer">
                    @foreach ($footerTwo as $two)
                        <li><a href="{{ $two['link'] }}">{{ $two['label'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="footer-col-4 col-md-2 col-xs-6">
                <h6 class="mb-20">Quick links</h6>
                <ul class="menu-footer">
                    @foreach ($footerThree as $three)
                        <li><a href="{{ $three['link'] }}">{{ $three['label'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="footer-col-5 col-md-2 col-xs-6">
                <h6 class="mb-20">More</h6>
                <ul class="menu-footer">
                    @foreach ($footerFour as $four)
                        <li><a href="{{ $four['link'] }}">{{ $four['label'] }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="footer-bottom mt-50">
            <div class="row">
                <div class="col-md-6"><span class="font-xs color-text-paragraph">Copyright &copy;
                        {{ date('Y') }}. JOBLIST
                        all right
                        reserved</span></div>
                <div class="col-md-6 text-md-end text-start">
                    <div class="footer-social"><a class="font-xs color-text-paragraph" href="#">Privacy
                            Policy</a><a class="font-xs color-text-paragraph mr-30 ml-30" href="#">Terms
                            &amp; Conditions</a><a class="font-xs color-text-paragraph" href="#">Security</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


@push('script')
    <script>
        $(document).ready(function() {
            $('.form-newsletter').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                let button = $('.submit');
                $.ajax({
                    method: 'POST',
                    url: "{{ route('subscrib') }}",
                    data: formData,
                    beforeSend: function() {
                        button.text('Sending...');
                        button.prop('disable', true);
                    },
                    success: function(response) {
                        button.text('Subscribe');
                        button.prop('disable', false);
                        $('.form-newsletter').trigger('reset');
                        notyf.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(index, value) {
                            notyf.error(value[0]);
                        });

                        button.text('Subscribe');
                        button.prop('disable', true);
                    }
                })
            });
        })
    </script>
@endpush
