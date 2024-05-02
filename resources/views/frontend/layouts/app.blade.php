<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Analytics tag -->
    @if (isset($commonContent))
        @if ($commonContent['analytics'] != null)
            {!! $commonContent['analytics']['description'] !!}
        @endif
    @endif
    <title>@yield('title', 'Mid Year Cricket Association')</title>
    <meta name="description" content="@yield('description', '')">
    <meta name="keywords" content="@yield('keywords', '')">

    <link rel="canonical" href="@yield('canonical_url', '')">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}">


    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Styles -->
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/hover.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" />
    <link href="{{ asset('css/mid-year-cricket.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive-mid-year-cricket.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mid-year-cricket-s.css') }}" rel="stylesheet">


    <!-- Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<!-- Recaptcha -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Fix for custom scrollbar if JS is disabled-->
    <noscript>
        <style>
            /**
          * Reinstate scrolling for non-JS clients
          */
            .simplebar-content-wrapper {
                overflow: auto;
            }
        </style>
    </noscript>
    <style>
        body {
            font-size: 0.9rem !important;
        }

        .user-image {
            width: 50px;
        }
    </style>

</head>

<body class="">

    @include('frontend.layouts.headers.header')
    <!-- Page Content -->
    <main id="main">


        @yield('content')

        <!-- / Content-->

    </main>

    @include('frontend.layouts.footers.footer')
    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="{{ url('/js/vendor.bundle.js') }}"></script>

    <!-- jQuery -->
    <script src="{{ url('/plugins/jquery/jquery.min.js') }}"></script>

    <!-- CKEditor -->
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="{{ url('/js/owl.carousel.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    @yield('scripts')
    <script>
        $('.owlCarousel').owlCarousel({

            margin: 20,
            rewind: true,
            lazyLoad: true,
            loop: true,
            dots: false,
            nav: true,

            autoplay: true,
            smartSpeed: 300,
            singleItem: true,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            autoplayTimeout: 7000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 5
                }
            }
        });

        $('.owlCarousel1').owlCarousel({

            margin: 20,
            rewind: true,
            lazyLoad: true,
            loop: true,
            dots: false,
            nav: true,

            autoplay: true,
            smartSpeed: 300,
            singleItem: true,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            autoplayTimeout: 7000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });

        $('.owlCarousel2').owlCarousel({

            rewind: true,
            lazyLoad: true,
            loop: true,
            dots: false,
            nav: true,

            autoplay: true,
            smartSpeed: 300,
            singleItem: true,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            autoplayTimeout: 7000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });

        $('.owlCarousel3').owlCarousel({

            rewind: true,
            lazyLoad: true,
            loop: true,
            dots: false,
            nav: false,
            margin: 30,
            autoplay: true,
            smartSpeed: 300,
            singleItem: true,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            autoplayTimeout: 7000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 4
                }
            }
        });
        $('.owlCarousel4').owlCarousel({

            rewind: true,
            lazyLoad: true,
            loop: true,
            dots: false,
            nav: false,
            margin: 30,
            autoplay: true,
            smartSpeed: 300,
            singleItem: true,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            autoplayTimeout: 7000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 4
                }
            }
        });
        window.addEventListener('scroll', e => {
            var el = document.getElementById('jsScroll');
            if (window.scrollY > 300) {
                el.classList.add('visible');
            } else {
                el.classList.remove('visible');
            }
        });

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }



         function addSubscription() {



             let subscriptionEmail = document.getElementById("subscription-email").value;


             if (subscriptionEmail !== '') {

                 var email = document.getElementById('subscription-email');
                 var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;


                 if (!filter.test(email.value)) {

                     toastr.error("Please enter a valid email address !");
                     email.focus;
                     return false;

                 } else {

                     $.ajax({
                         method: "post",
                         url: "/subscribe",
                         headers: {
                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         },
                         data: {
                             'email': subscriptionEmail
                         },
                         success: function(res) {
                             if (res.status) {

                                 toastr.success(res.msg);
                                 email.value = '';

                             } else {

                                 toastr.error(res.msg);
                             }


                         },
                         error: function(data) {
                             console.log('Error:', data);

                         }
                     });

                 }



             } else {

                 toastr.error("Subscription email cannot be empty !")

             }

         }

    </script>



    <script>
        $(document).ready(function() {
            function setTabSize() {
                var screenWidth = $(window).width();
                var $tabElement = $('.tab-screen-change');

                // Remove existing classes to reset tab size


                if (screenWidth >= 992 && screenWidth <= 1199) {
                    $tabElement.removeClass('col-lg-6');

                    $tabElement.addClass('col-lg-12');
                }


            }

            // Set initial tab size
            setTabSize();

            // Update tab size on window resize
            $(window).resize(function() {
                setTabSize();
            });


            var count = 0;
            var targetNumber = 210; // The number to count up to
            var duration = 2000; // Animation duration in milliseconds
            var interval = duration / targetNumber; // Time interval for each increment

            var counter = setInterval(function() {
                if (count >= targetNumber) {
                    clearInterval(counter);
                } else {
                    count++;
                    $('#count').text(count);
                }
            }, interval);



            var count1 = 0;
            var targetNumber1 = 25; // The number to count up to
            var duration1 = 2000; // Animation duration in milliseconds
            var interval1 = duration1 / targetNumber1; // Time interval for each increment

            var counter1 = setInterval(function() {
                if (count1 >= targetNumber1) {
                    clearInterval(counter1);
                } else {
                    count1++;
                    $('#count1').text(count1);
                }
            }, interval1);

            var count3 = 0;
            var targetNumber3 = 125; // The number to count up to
            var duration3 = 2000; // Animation duration in milliseconds
            var interval3 = duration3 / targetNumber3; // Time interval for each increment

            var counter3 = setInterval(function() {
                if (count3 >= targetNumber3) {
                    clearInterval(counter3);
                } else {
                    count3++;
                    $('#count2').text(count3);
                }
            }, interval3);

            var count4 = 0;
            var targetNumber4 = 20; // The number to count up to
            var duration4 = 2000; // Animation duration in milliseconds
            var interval4 = duration4 / targetNumber4; // Time interval for each increment

            var counter4 = setInterval(function() {
                if (count4 >= targetNumber4) {
                    clearInterval(counter4);
                } else {
                    count4++;
                    $('#count3').text(count4);
                }
            }, interval4);
           


        });
    </script>

</body>

</html>
