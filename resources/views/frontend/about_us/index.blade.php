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
                                <h5 class="text-white font-36 family-open-sans fw-bolder pb-2 text-cover mb-lg-5"> About Us
                                </h5>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- banner end --}}
    <div class="container-fluid about-section ">

        <div class="row ">
            <div class="col-lg-7">
              <div class="row">
                <div class="col-12 dark-blue py-5">
                    <h1 class="text-white font-36 family-open-sans fw-500 pb-2"> About
                    </h1>
                    <h2 class="text-white font-36 family-open-sans fw-bolder pb-3"> Mid Year Cricket Association
                    </h2>
                    <p class="font-14 text-white fw-500 family-open-sans  pb-2">
                        The Mid Year Cricket Association is a new competition designed to allow passionate players of cricket of all abilities and from all levels to continue playing cricket throughout the year.
                    </p>
                    <p class="font-14 text-white fw-500 family-open-sans pb-2 ">
                        Running from the late April through to the Final on the second last Saturday of August, the season consists of nine rounds. Games consist of 35 overs and start at 12pm, finishing by 4:45pm. Games are usually played fortnightly, with the second weekend a reserve day in case of inclement weather.
                    </p>
                    <p class="font-14 text-white fw-500 family-open-sans pb-2 ">
                        The MYCA started with 10 member clubs, mainly based in the Bayside area.  Now MYCA stretches from our easternmost clubs in Launching Place and Officer to our westernmost clubs in Werribee and Melton and our northern most location at Donnybrook.  For Season 2018 we had 114 teams in 12 Divisions - MYCA remains one of the quickest growing competitions in the Country.
                    </p>
                    <p class="font-14 text-white fw-500 family-open-sans pb-2 ">
                        If you would like to register your interest as a club or find out more, please contact the Secretary. If you are a player looking for game, most clubs are open to outside players so, again, please contact us for more information.
                    </p>
                </div>

                <div class="col-12 py-5">
                    <div class="row  pb-2 ">
                        <div class="col-lg-1 col-sm-1 col-2">
                            <img src="{{ asset('/images/mission-ico.png') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="col-lg-4 col-sm-4 col-8">
                            <h2 class="text-black font-36 family-open-sans fw-bolder">
                                Objective </h2>
                        </div>
                    </div>
                    <p class="font-14  fw-500 family-open-sans  pb-2">
                        The objective of the Mid Year Cricket Association (MYCA) is to provide a year-round cricket competition that fosters a love for the sport among players of all abilities and levels. The MYCA season runs from late April to the Final held on the second last Saturday of August, with games played on a fortnightly basis and a reserve day available in case of inclement weather. From its inception with 10 member clubs centered in the Bayside area, the MYCA has expanded its reach, spanning from Launching Place and Officer in the east to Werribee and Melton in the west, and even including the northernmost location at Donnybrook. With 114 teams across 12 Divisions during Season 2018, the MYCA continues to flourish as one of the fastest-growing cricket competitions in the country. To register your club's interest or seek further information, please contact the Secretary. Players in search of a game are also encouraged to reach out, as most clubs welcome outside players. Join the MYCA to be a part of this thriving cricket community.
                    </p>
                </div>

                <div class="col-12  mission-section pt-3 pb-5">

                    <div class="row ">

                        <div class="col-lg-12">
                            <div class="row  pb-2 ">
                                <div class="col-lg-1 col-sm-1 col-2 ">
                                    <img src="{{ asset('/images/vision-ico.png') }}" class="d-block w-100 mt-lg-4 mt-3" alt="...">
                                </div>
                                <div class="ps-lg-0  col-lg-10 col-sm-10 col-9 ">
                                    <h2 class="text-white font-36 pt-3 family-open-sans fw-bolder">
                                        Goal </h2>
                                </div>
                            </div>

                            <p class="font-14  fw-500 family-open-sans text-white ">
                                The goal of the Mid Year Cricket Association (MYCA) is to provide a year-round cricket competition that caters to players of all abilities and levels, fostering their passion for the sport. The expansion of the association from its initial 10 member clubs in the Bayside area to encompassing clubs across Launching Place, Officer, Werribee, Melton, and Donnybrook demonstrates the goal of inclusivity and accessibility. With continued growth and the support of outside players, the MYCA aims to strengthen the cricketing community and provide a platform for enjoyment and development.
                            </p>
                        </div>
                    </div>
                </div>

              </div>
            </div>
            <div class="col-lg-5 pt-lg-5 pt-0 ">
                <img src="{{ asset('/images/about-us.jpg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>




@endsection
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.2.0/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.2.0/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@4.2.0/main.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.2.0/main.min.css" rel="stylesheet" />
@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('web.get.eventData') }}",
                method: "GET",
                dataType: "json",
                success: function(response) {
                    // Handle the data received in the response

                    $('#date').html(response[0].created_at);
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle errors, if any
                    console.log(error);
                }
            });
        });
    </script>

    <script>
        var eventsArray = [{
                title: 'event1',
                start: '2019-07-20'
            },
            {
                title: 'event2',
                start: '2019-08-05',
                end: '2019-08-07'
            },
            {
                title: 'event3',
                start: '2019-09-03'
            },
            {
                title: 'event3',
                start: '2019-10-05'
            }
        ];

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                height: 600,
                plugins: ['dayGrid', 'interaction'],

                dateClick: function(info) {
                    alert('Clicked on: ' + info.dateStr);

                    eventsArray.push({
                        date: info.dateStr,
                        title: "test event added from click"
                    });

                    calendar.refetchEvents();
                },

                eventClick: function(info) {
                    alert(info.event.title)
                },

                events: function(info, successCallback, failureCallback) {
                    successCallback(eventsArray);
                }
            });

            calendar.render();
        });
    </script>
@endsection
