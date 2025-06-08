@extends('frontend.pages.layouts.master')
@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Blog's</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('home') }}">Home</a></li>
                            <li>Blog's</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-90">
        <div class="post-loop-grid">
            <div class="container">
                <div class="row mt-30">
                    <div class="col-lg-8">
                        <div class="row">
                            @forelse ($blogs as $item)
                                <div class="col-lg-6 mb-30">
                                    <div class="card-grid-3 hover-up">
                                        <div class="text-center card-grid-3-image"><a
                                                href="{{ route('blog-detail', $item?->slug) }}">
                                                <figure><img style="height: 220px; object-fit: cover;" alt="joblist"
                                                        src="{{ asset($item?->image) }}">
                                                </figure>
                                            </a></div>
                                        <div class="card-block-info">
                                            <h5><a href="{{ route('blog-detail', $item?->slug) }}">{{ $item?->title }}</a>
                                            </h5>
                                            <p class="mt-10 color-text-paragraph font-sm">
                                                {{ Str::limit(strip_tags($item?->description), $limit = 150, $end = '....') }}
                                            </p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-6 col-6">
                                                        <div class="d-flex">
                                                            <div class="info-right-img"><span
                                                                    class="font-sm font-bold color-brand-1 op-70">{{ $item?->author?->name }}</span><br><span
                                                                    class="font-xs color-text-paragraph-2">{{ formatDate($item?->created_at) }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 text-end col-6 pt-15"><span
                                                            class="color-text-paragraph-2 font-xs">{{ $item?->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <span class="text-center mt-60">No Blog Found</span>
                            @endforelse

                        </div>
                        <div class="paginations">
                            <nav class="d-inline-block">
                                @if ($blogs->hasPages())
                                    {{ $blogs->withQueryString()->links() }}
                                @endif
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                        <div class="widget_search mb-40">
                            <div class="search-form">
                                <form action="{{ route('all-blogs') }}">
                                    <input type="text" name="search" placeholder="Search…"
                                        value="{{ request()->search }}">
                                    <button type="submit"><i class="fi-rr-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-shadow sidebar-news-small">
                            <h5 class="sidebar-title">Featured Post</h5>
                            @forelse ($feturedBlog as $item)
                                <div class="post-list-small">
                                    <div class="post-list-small-item d-flex align-items-center">
                                        <figure class="thumb mr-15"><img style="height: 50px; object-fit: cover;"
                                                src="{{ asset($item?->image) }}" alt="joblist">
                                        </figure>
                                        <div class="content">
                                            <h5><a href="{{ route('blog-detail', $item?->slug) }}">{{ $item?->title }}</a>
                                            </h5>
                                            <div class="post-meta text-muted d-flex align-items-center mb-15">
                                                <div class="author d-flex align-items-center mr-20">
                                                    <span>{{ $item?->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <span class="text-center">No Blog</span>
                            @endforelse

                        </div>
                        <div class="sidebar-shadow sidebar-news-small">
                            <h5 class="sidebar-title">Gallery</h5>
                            <div class="post-list-small">
                                <ul class="gallery-3">
                                    @forelse ($blogImage as $img)
                                        <li><a href="#"><img style="height: 60px; object-fit: cover;"
                                                    src="{{ asset($img?->image) }}"></a></li>
                                    @empty
                                        <span class="text-center">No Image</span>
                                    @endforelse

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
