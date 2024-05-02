@extends('frontend.layouts.app')

@section('content')

    <div class="container-fluid border-top light-blue box-new-shadow  mt-lg-5">
        <div class=" mt-lg-5">
            <div class="row mt-lg-5">
                <div class="col-12 mt-lg-5 pt-3">
                    <nav style="--bs-breadcrumb-divider: '>';" class="" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-2">
                            <li class="breadcrumb-item"><a class="font-14 family-open-sans fw-bolder hover-orange text-white"
                                    href="/">Home</a></li>
                            <li class="breadcrumb-item " aria-current="page"><a
                                    class="font-14 family-open-sans fw-bolder  text-white hover-orange"
                                    href="{{ route('web.events.archive') }}">Events</a></li>
                            <li class="breadcrumb-item active font-14 family-open-sans fw-500 text-white "
                                aria-current="page">
                                {{ $eventsData->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid single-news-section py-5 ">
        <div class="row">
            <div class="col-12">

                <div class="clearfix">
                    <img src="{{ asset($eventsData->image->src) }}" class="col-lg-5 float-lg-end mb-3 ms-lg-3  rounded-10"
                        alt="Image 1">

                    <h1 class="font-36  fw-bolder family-open-sans pb-2">
                        {{ $eventsData->title }}
                    </h1>

            <div class="row">


                <div class="col-lg-4 pt-lg-3">
                    <div class="row">
                    <div class="col-lg-3 col-2">

                        {{-- <img src="{{ $eventsData->user != null ? asset($eventsData->user->user_image) : asset('/images/no_user_image.png') }}"
                            class="d-block w-100 rounded-circle" alt="..."> --}}



                            <img src="{{$eventsData->user_image != null ? asset($eventsData->user_image) : asset('images/no_user_image.png')}}" class="d-block w-100 rounded-circle"
                            alt="Image 1">

                    </div>
                    <div class="col-lg-9 col-10">
                        @if ($eventsData->user != null)
                            <p class=" font-14 family-open-sans fw-bolder pt-2">by
                                {{ $eventsData->user->first_name }} {{ $eventsData->user->last_name }}</p>
                        @else
                            Unknown
                        @endif
                    </div>
                </div>
                </div>


                <div class="col-lg-8 pb-3 ">
                    <div class="row justify-content-end">
                        <div class="col-lg-7">
                 
                            @if ($eventsData->location != null)
                            <div class="row pt-2">
                                <div class="col-lg-1 col-2">
                                    <i class="fa fa-map-marker fw-lighter  fs-5 " aria-hidden="true"></i>

                                </div>
                                <div class="col-lg-10 col-10">

                                    <div class="row">
                                        <div class="col-12">
                                            <p class=" font-14 family-open-sans fw-bolder"> {{ $eventsData->location }}
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @else
                            @endif
                        </div>
                        <div class="col-lg-7">
                      
                            @if ($eventsData->event_date_time != null)
                            <div class="row pt-2">




                                <div class="col-lg-1 col-2">
                                    <i class="fa fa-calendar fw-lighter  fs-5 " aria-hidden="true"></i>

                                </div>
                                <div class="col-lg-10 col-10">

                                    <div class="row">
                                        <div class="col-12">
                                            <p class=" font-14 family-open-sans fw-bolder"> {{ date("Y-m-d h:i A", strtotime($eventsData->event_date_time)) }}
                                            </p>
                                        </div>

                                    </div>
                                </div>
                        </div>

                            @else
                            @endif
                        </div>
                    </div>
                    </div>



            <div class="pt-2 font-14  fw-500 family-open-sans">

                {!! $eventsData->body !!}
            </div>
        </div>
    </div>

    </div>

    <div class="row pt-3">

        <div class="col-12 owlCarousel4 owl-carousel ">
            @foreach ($eventsData->images as $eventGalleyImage)
                <div class="item">
                    <a class="example-image-link " href="{{ asset($eventGalleyImage->src) }}" data-lightbox="example-set"
                        data-title="Or press the right arrow on your keyboard.">
                        <img src="{{ asset($eventGalleyImage->src) }}" class="d-block w-100 filter-black rounded-10"
                            alt="Image 2">
                    </a>

                </div>
            @endforeach

        </div>
    </div>
    </div>
@endsection
