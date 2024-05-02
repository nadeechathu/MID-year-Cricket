@extends('frontend.layouts.app')

@section('content')

<div class="container-fluid mt-lg-5 py-5 family-open-sans">
    <div class="row mt-lg-5 py-lg-5">
        <div class="col-lg-6 col-12">

            <!-- event card -->
            <div class="card border-0 event-card">
                <div class="card-body py-0">
                    <div class="row">
                        <div class="col-md-2 col-3 text-center event-single-date-time">
                            <p class="fs-2 date d mt-lg-5 pt-md-5 pt-4">SEP</p>
                            <h1 class="single-event-date">28</h1>
                        </div>
                        <div class="col-md-10 col-9 p-0 single-event-content">
                            <img src="{{ asset('/images/events/event-01.png') }}" class="d-block w-100 single-event-img"
                                alt="Event">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-6 mt-lg-0 mt-4">
            <h1 class="event-main-title display-4 mb-3">We Make Event</h1>
            <!-- countdown timer -->
            <div id="countdown">
                <div class="row">
                    <div class="col-md-9 col-12">
                        <ul>
                            <div class="row">
                                <div class="col-2 pe-0">
                                    <li class="event-counter text-center py-3"><span id="days"></span></li>
                                    <p class="mt-2 text-center counter-text">DAYS</p>
                                </div>
                                <div class="col-2 pe-0">
                                    <li class="event-counter text-center py-3"><span id="hours"></span></li>
                                    <p class="mt-2 text-center counter-text">HOURS</p>
                                </div>
                                <div class="col-2 pe-0">
                                    <li class="event-counter text-center py-3"><span id="minutes"></span></li>
                                    <p class="mt-2 text-center counter-text">MINUTES</p>
                                </div>
                                <div class="col-2 pe-0">
                                    <li class="event-counter text-center py-3"><span id="seconds"></span></li>
                                    <p class="mt-2 text-center counter-text">SECONDS</p>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>

            </div>
            <!-- / countdown timer -->
            <div class="event-short-description mt-4">
                <p class="event-para">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                    Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took. </p>
            </div>
        </div>
        <div class="col-12">
            <div class="event-description mt-4">
                <p class="event-para">"But I must explain to you how all this mistaken idea of denouncing pleasure and
                    praising pain was born and I will give you a complete account of the system, and expound the actual
                    teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects,
                    dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how
                    to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there
                    anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because
                    occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take
                    a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some
                    advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure
                    that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"
                </p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="owlCarousel3 owl-carousel ">
                <div class="item">
                    <a class="example-image-link " href="{{ asset('/images/news/news-slider-1.jpg') }}"
                        data-lightbox="example-set" data-title="Or press the right arrow on your keyboard.">
                        <img src="{{ asset('/images/news/news-slider-1.jpg') }}"
                            class="d-block w-100 filter-black rounded-10" alt="Image 2">
                    </a>


                </div>
                <div class="item">
                    <a class="example-image-link " href="{{ asset('/images/news/news-slider-2.jpg') }}"
                        data-lightbox="example-set" data-title="Or press the right arrow on your keyboard.">
                        <img src="{{ asset('/images/news/news-slider-2.jpg') }}"
                            class="d-block w-100 filter-black rounded-10" alt="Image 2">
                    </a>


                </div>
                <div class="item">
                    <a class="example-image-link " href="{{ asset('/images/news/news-slider-3.jpg') }}"
                        data-lightbox="example-set" data-title="Or press the right arrow on your keyboard.">
                        <img src="{{ asset('/images/news/news-slider-3.jpg') }}"
                            class="d-block w-100 filter-black rounded-10" alt="Image 2">
                    </a>


                </div>
                <div class="item">
                    <a class="example-image-link " href="{{ asset('/images/news/news-slider-4.jpg') }}"
                        data-lightbox="example-set" data-title="Or press the right arrow on your keyboard.">
                        <img src="{{ asset('/images/news/news-slider-4.jpg') }}"
                            class="d-block w-100 filter-black rounded-10" alt="Image 2">
                    </a>


                </div>

            </div>
        </div>
    </div>
</div>

@endsection

<script>
(function() {
    const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

    //I'm adding this section so I don't have to keep updating this pen every year :-)
    //remove this if you don't need it
    let today = new Date(),
        dd = String(today.getDate()).padStart(2, "0"),
        mm = String(today.getMonth() + 1).padStart(2, "0"),
        yyyy = today.getFullYear(),
        nextYear = yyyy + 1,
        dayMonth = "09/30/",
        birthday = dayMonth + yyyy;

    today = mm + "/" + dd + "/" + yyyy;
    if (today > birthday) {
        birthday = dayMonth + nextYear;
    }
    //end

    const countDown = new Date(birthday).getTime(),
        x = setInterval(function() {

            const now = new Date().getTime(),
                distance = countDown - now;

            document.getElementById("days").innerText = Math.floor(distance / (day)),
                document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

            //do something later when date is reached
            if (distance < 0) {
                document.getElementById("headline").innerText = "It's my birthday!";
                document.getElementById("countdown").style.display = "none";
                document.getElementById("content").style.display = "block";
                clearInterval(x);
            }
            //seconds
        }, 0)
}());
</script>
