<div class="bg-homepage1" style="background-image: url({{ $hero?->bg_image }})"></div>

<section class="section-box mt-100 mb-100 banner_section">
    <div class="container">
        <div class="banner-hero hero-1">
            <div class="banner-inner">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-12 d-none d-xl-block col-md-6">
                        <div class="banner-imgs mt-40">
                            <div class="block-1"><img class="img-responsive" alt="joblist"
                                    src="{{ asset($hero?->image) }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-12">
                        <div class="block-banner">
                            <h1 class="heading-banner wow animate__animated animate__fadeInUp">{{ $hero?->title }}</h1>
                            <div class="banner-description mt-20 wow animate__animated animate__fadeInUp"
                                data-wow-delay=".1s">{{ $hero?->sub_title }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
