@extends('frontend.layouts.app')
@include('frontend.common.seo_fields')
@section('content')
    <!-- page header banner section -->
    <div class="container-fluid gallery-banner-section">
        <div class="row">
            <div class="col-lg-12 px-0">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('/images/inner-banner.jpg') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption text-start mb-lg-5">
                                <h5 class="text-white font-36 family-open-sans fw-bolder pb-2 text-cover mb-lg-5">Gallery
                                </h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- / page header banner section -->

    <!-- inner content -->
    <div class="container-fluid py-5">

        <div class="row pb-5">
            <div class="col-lg-4">
                <h1 class="contacts-heading">Gallery</h1>
            </div>
            <div class="col-lg-8">
                <form class="form-inline">
                    <div class="row d-flex justify-content-end pt-2">
                        <div class="col-lg-4 col-md-4">
                            <form action="{{ route('web.gallery') }}" method="get" id="filter-form">

                                <select
                                    class="form-select club-contact-select border-primary border-1 rounded-0 font-14  family-open-sans  fw-500"
                                    aria-label="Default select example" name="selected_category"
                                    onChange="document.getElementById('search-trigger').click()">
                                    <option value="">--- Select Category ---</option>

                                    @foreach ($gallery_categories as $galleryCategory)
                                    <option {{ $galleryCategory->slug == $selectedCategory ? 'selected' : '' }}
                                        value="{{ $galleryCategory->slug }}">
                                        {{ $galleryCategory->category_name }}</option>
                                @endforeach
                                </select>
                        </div>

                        <div class="col-lg-1 col-md-3 col-4 p-0 mt-md-0 mt-3 d-none">
                            <button class="btn btn-outline-success font-14 club-contact-btn" type="submit"
                                id="search-trigger">Search</button>
                        </div>
                        <div class="col-lg-2 col-md-3 col-12 p-0 mt-md-0 mt-3 text-lg-start text-center">
                            <a href="{{ route('web.gallery') }}"><button
                                    class="btn font-14 px-4 text-white family-open-sans  bg-orange border-rounded-left"
                                    type="button"> Reset Filters</button></a>

                        </div>

                    </div>
                </form>
            </div>
        </div>
        <!-- row -->
        @if (sizeof($galleries) > 0)
        <div class="row">
            @foreach ($galleries as $gallery)
                <div class="col-lg-3 col-md-6 pt-lg-0 pt-3 mb-4">
                    <a class="example-image-link" href="{{ asset($gallery->src) }}" data-lightbox="example-set"
                        data-title="Or press the right arrow on your keyboard.">
                        <img src="{{ asset($gallery->src) }}" class="d-block w-100 h-100 filter-black gallery-height"
                            alt="MYCA ">
                    </a>



                </div>
            @endforeach

        </div>
        @else
        <div class="text-center">
            <h2 class="color-orange font-36 family-open-sans fw-bolder pb-2 text-cover"> No records found</h2>
        </div>
    @endif
    </div>
    <!-- / inner content -->
@endsection
