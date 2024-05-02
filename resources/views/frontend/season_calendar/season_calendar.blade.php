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
                                <h5 class="text-white font-36 family-open-sans fw-bolder pb-2 text-cover mb-lg-5"> Season
                                    Calendar

                                </h5>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- banner end --}}



    <div class="container-fluid calender_section py-5 family-open-sans">
        <div class="container">
            <div class="row">
                <div class="col-12">


                    <div id="calendar"></div>
                </div>
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
                    var eventsArray = [];


                    response.forEach(function(item) {


                        eventsArray.push({
                            'title': item.title,
                            'start': item.event_date_time,
                            'id': item.id
                        });

                    });

                    var calendarEl = document.getElementById('calendar');

                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        height: 600,
                        plugins: ['dayGrid', 'interaction'],
                        buttonText: {

                            today: 'Today'
                        },

                        dateClick: function(info) {

                            calendar.refetchEvents();
                        },

                        eventClick: function(info) {

                            var eventId = info.event.id;
                            // alert(eventId);
                            // console.log(info.event.id);
                            $.ajax({
                                url: '/load_eventData/' + eventId,
                                method: 'GET', // Choose the appropriate HTTP method
                                dataType: 'json',
                                success: function(response) {

                                    setTimeout(function() {

                                        var redirectUrl = response.url;
                                        window.location.href =
                                            redirectUrl;
                                    }, 10);

                                },
                                error: function(xhr, status, error) {

                                    console.log(error);
                                }
                            });
                        },

                        events: function(info, successCallback, failureCallback) {
                            successCallback(eventsArray);
                        }
                    });

                    console.log(eventsArray)
                    // calendar.refetchEvents();
                    calendar.render();
                },

                error: function(xhr, status, error) {
                    // Handle errors, if any
                    console.log(error);
                }
            });
        });


        function processData(response) {
            var dataList = document.getElementById('data-list');

            response.forEach(function(item) {
                // Create an HTML element to display the data
                var listItem = document.createElement('li');
                listItem.innerHTML = 'date: ' + item.created_at + ', title: ' + item.title;

                eventsArray.push({
                    'title': item.title,
                    'start': item.created_at
                });
                // var title = item.title;
                // Append the element to the data list
                dataList.appendChild(listItem);
            });
        }


        // document.addEventListener('DOMContentLoaded', function() {
        //     var calendarEl = document.getElementById('calendar');

        //     var calendar = new FullCalendar.Calendar(calendarEl, {
        //         height: 600,
        //         plugins: ['dayGrid', 'interaction'],

        //         dateClick: function(info) {
        //             alert('Clicked on: ' + info.dateStr);

        //             eventsArray.push({
        //                 date: info.dateStr,
        //                 title: "test event added from click"
        //             });

        //             calendar.refetchEvents();
        //         },

        //         eventClick: function(info) {
        //             alert(info.event.title)
        //         },

        //         events: function(info, successCallback, failureCallback) {
        //             successCallback(eventsArray);
        //         }
        //     });

        //     calendar.render();
        // });
    </script>
@endsection
