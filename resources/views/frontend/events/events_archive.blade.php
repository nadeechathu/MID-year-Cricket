@extends('frontend.layouts.app')
@include('frontend.common.seo_fields')
@section('content')

<!-- page header banner section -->
<div class="container-fluid event-banner-section">
    <div class="row">
        <div class="col-lg-12 px-0">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('/images/inner-banner.jpg') }}" class="d-block w-100" alt="Header Banner">
                        <div class="carousel-caption text-start mb-lg-5 pb-5">
                            <h5 class="text-white font-36 family-open-sans fw-bolder pb-2 text-cover mb-lg-5">Events
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
<div class="container-fluid py-5 family-open-sans">

    <div class="row pb-5">
        <div class="col-lg-4">
            <h1 class="contacts-heading">Event</h1>
        </div>
        <div class="col-lg-8">

                <div class="row d-flex justify-content-end pt-2">
                    <div class="col-lg-4 col-md-4">
                        <form action="{{ route('web.events.archive') }}" method="get" id="filter-form">

                            <select
                                class="form-select club-contact-select border-primary border-1 rounded-0 font-14  family-open-sans  fw-500"
                                aria-label="Default select example" name="selectedYear"
                                onChange="document.getElementById('search-trigger').click()">
                                <option value="">--- Select Event Year ---</option>
                                @foreach ($years as $year)
                                <option {{ $year == $selectedEventYear ? 'selected' : '' }}
                                    value="{{ $year }}">
                                    {{ $year }}
                                </option>

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
    </div>

    @if(sizeof($events) > 0)
    <div class="row">

        <!-- event card -->
        @foreach ( $events as  $event)
        <div class="col-lg-4 col-sm-6 col-12 mb-3">
            <div class="card border-0 event-card ">
                <div class="row">
                    <div class="card-body py-0">
                        <div class="col-12">

                                <img src="{{$event->featuredImage != null ? asset($event->featuredImage->src) : asset($event->images[0]->src)}}" class="d-block w-100 event-img"
                                    alt="Event">

                        </div>
                    </div>
                </div>
                <div class="card-body py-0">
                    <div class="row">
                        <div class="col-3 text-center event-date-time ">
                            <p class="date mt-5">{{ date('d', strtotime($event->event_date_time)) }}</p>
                            <h1>  {{ date('M', strtotime($event->event_date_time)) }}</h1>
                             <br>



                        </div>
                        <div class="col-9 py-3 event-content">

                                <h5 class="event-title mb-2">{{ $event->title }}
                                </h5>

                            {!! substr($event->body, 0, 200) !!}

                            <div class="row pt-3">
                                <div class="col-12 text-center">
                                    <a href="{{ route('web.events.single', ['slug'=> $event->slug]) }}"
                                        class="bg-orange text-white py-2 px-5 w-100 font-16 family-open-sans hvr-shrink
                                        fw-light rounded-pill">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endforeach



    </div>
    @else
    <div class="row">
        <div class="col-md-12 text-center">
            <h4>Oops.. Sorry, there are no events.</h4>
        </div>
    </div>
    @endif
</div>
<!-- / inner content -->

@endsection
