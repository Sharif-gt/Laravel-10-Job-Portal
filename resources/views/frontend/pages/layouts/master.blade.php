<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <link rel="manifest" href="manifest.json" crossorigin>
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">

    <link rel="shortcut icon" type="image/x-icon" href="">
    <link href="{{ asset('frontend/assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
    <title>Job Portal</title>
</head>

<body>

    {{-- <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
      <div class="preloader-inner position-relative">
        <div class="text-center"><img src="{{asset('frontend/assets/imgs/template/loading.gif')}}" alt="joblist"></div>
      </div>
    </div>
  </div> --}}

    <!-- Navbar Section-->
    @include('frontend.pages.layouts.navbar')



    <main class="main">

        @yield('content')

    </main>

    <section class="section-box subscription_box">
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
                                    <input class="input-newsletter" type="text" value=""
                                        placeholder="Enter your email here">
                                    <button class="btn btn-default font-heading">Subscribe</button>
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
                <div class="footer-col-2 col-md-2 col-xs-6">
                    <h6 class="mb-20">Resources</h6>
                    <ul class="menu-footer">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Our Team</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-col-3 col-md-2 col-xs-6">
                    <h6 class="mb-20">Community</h6>
                    <ul class="menu-footer">
                        <li><a href="#">Feature</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">Credit</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-col-4 col-md-2 col-xs-6">
                    <h6 class="mb-20">Quick links</h6>
                    <ul class="menu-footer">
                        <li><a href="#">iOS</a></li>
                        <li><a href="#">Android</a></li>
                        <li><a href="#">Microsoft</a></li>
                        <li><a href="#">Desktop</a></li>
                    </ul>
                </div>
                <div class="footer-col-5 col-md-2 col-xs-6">
                    <h6 class="mb-20">More</h6>
                    <ul class="menu-footer">
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">FAQ</a></li>
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
                                &amp; Conditions</a><a class="font-xs color-text-paragraph"
                                href="#">Security</a></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/Font-Awesome.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js?v=4.1') }}"></script>
</body>

</html>