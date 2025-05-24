<div class="mt-100"></div>

<section class="section-box category_section mt-35">
    <div class="section-box wow animate__animated animate__fadeIn">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Popular Job Categories
                </h2>
                <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Total jobs published
                    {{ $totalJobs }}.</p>
            </div>
            <div class="box-swiper mt-50">
                <div class="swiper-container swiper-group-5 swiper">
                    <div class="swiper-wrapper pb-70 pt-5">
                        @foreach ($popularJobCategory->chunk(2) as $categories)
                            <div class="swiper-slide hover-up">
                                @foreach ($categories as $pair)
                                    <a href="{{ route('all.jobs', ['category' => $pair->slug]) }}">
                                        <div class="item-logo">
                                            <div class="image-left">
                                                <i class="{{ $pair?->icon }}"></i>
                                            </div>
                                            <div class="text-info-right">
                                                <h4>{{ Str::limit($pair?->name, 20, '...') }}</h4>
                                                <p class="font-xs">{{ $pair?->jobs_count }}<span> Jobs
                                                        Available</span></p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</section>
