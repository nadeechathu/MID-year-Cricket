@extends('frontend.layouts.app')
@include('frontend.common.seo_fields')
@section('content')
    <div class="container-fluid banner-section">
        <div class="row">
            <div class="col-lg-12 px-0">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('/images/inner-banner.jpg') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption text-start mb-lg-5">
                                <h5 class="text-white font-36 family-open-sans fw-bolder pb-2 text-cover mb-lg-5">News</h5>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- banner end --}}
    <div class="container-fluid news-section py-5">




        <div class="row pb-5">
            <div class="col-lg-4 mb-4">
                <h1 class="contacts-heading">News</h1>
            </div>
           <div class="col-lg-8">
                <form class="form-inline">
                    <div class="row d-flex justify-content-end pt-2">
                        <div class="col-lg-4 col-md-4">
                            <form action="{{ route('web.events.archive') }}" method="get" id="filter-form">

                                <select
                                    class="form-select club-contact-select border-primary border-1 rounded-0 font-14  family-open-sans  fw-500"
                                    aria-label="Default select example" name="selectedYear"
                                    onChange="document.getElementById('search-trigger').click()">
                                    <option value="">--- Select Year ---</option>

                                    @foreach ($years as $year)
                                    <option {{$selectedNewsYear == $year ? 'selected':''}} value="{{$year}}">{{$year}}</option>
                                    @endforeach


                                </select>

                        </div>

                        <div class="col-lg-1 col-md-3 col-4 p-0 mt-md-0 mt-3 d-none">
                            <button class="btn btn-outline-success font-14 club-contact-btn" type="submit"
                                id="search-trigger">Search</button>
                        </div>
                        <div class="col-lg-2 col-md-3 col-12 p-0 mt-md-0 mt-3 text-lg-start text-center">
                            <a href="{{ route('web.events.archive') }}"><button
                                    class="btn font-14 px-4 text-white family-open-sans  bg-orange border-rounded-left"
                                    type="button"> Reset Filters</button></a>

                        </div>

                    </div>
                </form>
            </div>
















        @if($latestNews != null)
        <div class="row">
            <div class="col-12">
                <h2 class="color-orange font-36 family-open-sans fw-bolder mb-3 text-cover pt-lg-0 pt-3"> {{ $latestNews->title }} </h2>

            </div>
            <div class="col-lg-7">

                <img src="{{ asset($latestNews->image->src) }}" class="d-block w-100 rounded-10" alt="Image 1">
                <div class="row news-des">
                    <div class="col-lg-8 col-8 py-3 px-4">
                        <div class="row">

                            <div class="col-lg-2 col-2">
                                <img src="{{ $latestNews->user != null ? asset($latestNews->user->user_image) : asset('/images/no_user_image.png') }}"
                                    class="d-block w-100 rounded-circle" alt="...">
                            </div>
                            <div class="col-lg-10 col-10">
                                {{-- <p class="text-white  font-13 family-open-sans fw-500 text-uppercase">
                                        match
                                    </p> --}}
                                <h5 class="font-18 text-white fw-500 family-open-sans">{{ $latestNews->title }}</h5>
                                <div class="row pt-2 ">
                                    <div class="col-lg-6 col-6">
                                        <p class="text-white font-14 family-open-sans fw-500">
                                            @if ($latestNews->user != null)
                                                <p class=" font-14 family-open-sans fw-bolder pt-2 text-white">by
                                                    {{ $latestNews->user->first_name }} {{ $latestNews->user->last_name }}
                                                </p>
                                            @else
                                                Unknown
                                            @endif
                                        </p>
                                    </div>
                                    @if ($latestNews->event_date_time != null)
                                    <div class="col-lg-6 col-6">
                                        <h5 class="text-white pt-2 font-14 family-open-sans fw-500">
                                            {{ $latestNews->event_date_time }} </h5>
                                    </div>
                                    @else
                                    @endif
                                </div>
                            </div>
                        </div>



                    </div>
                </div>






            </div>
            <div class="col-lg-5">
                <div class="scrollDiv pe-lg-4">


                    @foreach ($newsRelateds as $newsRelated)

                        <div class="recent-news blue-inner  rounded-10 mb-3">
                            <div class="row">
                                <div class="col-lg-8 col-sm-8 col-9 py-3 px-4">

                                    <h5 class="font-18 text-white fw-500 family-open-sans"> {{ $newsRelated->title }}</h5>
                                    <div class="row pt-2">


                                        <div class="col-lg-3 pt-2">
                                            {{-- <img src="{{ $newsRelated->user != null ? asset($newsRelated->user->user_image) : asset('/images/no_user_image.png') }}"
                                                class="d-block w-100 rounded-circle" alt="..."> --}}
                                                <img src="{{$newsRelated->user_image != null ? asset($newsRelated->user_image) : asset('images/no_user_image.png')}}"
                                                class="d-block w-100 rounded-circle" alt="...">


{{--

                                                <img class="rounded-circle" style="width:8.5rem;margin-bottom:20px;" src="{{$user->user_image != null ? asset($user->user_image) : asset('images/no_user_image.png')}}" alt="Dev"> --}}
                                        </div>
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    @if ($newsRelated->user != null)
                                                        <p class="text-white pt-2 font-14 family-open-sans fw-500">by
                                                            {{ $newsRelated->user->first_name }}
                                                            {{ $newsRelated->user->last_name }}</p>
                                                    @else
                                                        Unknown
                                                    @endif
                                                </div>
                                                @if ($newsRelated->event_date_time != null)
                                                <div class="col-lg-12 pt-1">
                                                    <div class="row">
                                                        <div class="col-1">
                                                            <i class="fa fa-calendar fw-lighter text-white  fs-6 "
                                                                aria-hidden="true"></i>
                                                        </div>
                                                        <div class="col-10">
                                                            <h5 class="text-white font-14 family-open-sans fw-500">
                                                                {{ $newsRelated->event_date_time }} </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                @else
                            @endif
                                                <div class="col-lg-8 pt-1 text-center">
                                                    <a href="{{ route('web.single_news', ['slug' => $newsRelated->slug]) }}"
                                                        class="bg-orange text-white py-1 px-3 w-100 font-13 family-open-sans hvr-grow fw-light rounded-pill">Read
                                                        More</a>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-3">
                                    {{-- @dd($newsRelated->image->src); --}}
                                    <img src="{{ asset($newsRelated->image->src) }}" class="d-block w-100 rounded-10-right"
                                        alt="...">
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>
            </div>

            <div class="col-12 pt-3">
                <div class="text-black fw-500 family-open-sans px-2 pb-4"> {!! $latestNews->body !!} </div>


                <div class="col-12 owlCarousel4 owl-carousel ">
                    @foreach ($latestNews->images as $eventGalleyImage)
                        <div class="item">
                            <a class="example-image-link " href="{{ asset($eventGalleyImage->src) }}"
                                data-lightbox="example-set" data-title="Or press the right arrow on your keyboard.">
                                <img src="{{ asset($eventGalleyImage->src) }}"
                                    class="d-block w-100 filter-black rounded-10" alt="Image 2">
                            </a>

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @else
    <div class="row">
        <div class="col-md-12 text-center">
            <h4>Oops.. Sorry, there are no news items.</h4>
        </div>
    </div>
    @endif
    </div>
@endsection
