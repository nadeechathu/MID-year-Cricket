<div class="container-fluid header-section py-3 {{!isset($homeHeader) ? 'non_homePage':'homePage'}} ">
    <div class="row">
        <div class="col-lg-4">
            <a href="/" title="Mid Year Cricket Association | Home Page">
                <img class="mx-auto w-100" src="{{ asset('/images/logo.png') }}" alt="Mid Year Cricket Association">
            </a>
        </div>
        <div class="col-lg-8 text-end d-none d-sm-block">
            <div class=" pt-3">
                <a class="social-button  color-orange facebook hvr-wobble-bottom" href="{{$commonContent['facebookLink']['description']}}" target="_blank"><i class="fa fa-facebook-f"></i></a>
                <a class="social-button color-orange instagram hvr-wobble-bottom" href="{{$commonContent['instagramLink']['description']}}" target="_blank"><img class="" src="{{ asset('/images/gold-hq.png') }}" alt="Mid Year Cricket Association"></a>
                <a class="social-button color-orange twitter hvr-wobble-bottom" href="{{$commonContent['twitterLink']['description']}}" target="_blank"><i class="fa fa-twitter"></i></a>

                </div>
          </div>
    </div>



    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg nav-section py-0">

                      <a class="navbar-brand d-block d-sm-none text-white font-24 family-open-sans fw-500" href="#">Menu</a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars text-white font-36" aria-hidden="true"></i>

                      </button>
                      <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav mx-auto">
                     <li class="nav-item mx-lg-3">
                            <a class="nav-link font-15 text-white fw-500 family-open-sans hover-orange px-0 pb-1  {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
                          </li>
                     <li class="nav-item mx-lg-3">
                            <a class="nav-link font-15 text-white fw-500 family-open-sans hover-orange px-0 pb-1 {{ request()->is('about-us') ? 'active' : '' }}" href="{{ route('web.about_us')}}">About Us</a>
                          </li>
                     <li class="nav-item mx-lg-3">
                            <a class="nav-link font-15 text-white fw-500 family-open-sans hover-orange px-0 pb-1 {{ request()->is('news') ? 'active' : '' }}" href="{{ route('web.news')}}">News</a>
                          </li>
                     <li class="nav-item mx-lg-3">
                            <a class="nav-link font-15 text-white fw-500 family-open-sans hover-orange px-0 pb-1 {{ request()->is('events') ? 'active' : '' }}" href="{{ route('web.events.archive')}}">Events</a>
                          </li>
                          @if(sizeof($commonContent['formLinks']) > 0)
                          <li class="nav-item dropdown mx-lg-3">
                            <a class="nav-link dropdown-toggle font-16 text-white fw-500 family-open-sans hover-orange px-0 pb-1" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Register
                            </a>
                            <ul class="dropdown-menu  dark-blue  border-0
                            " aria-labelledby="navbarDropdownMenuLink">
                            @foreach ($commonContent['formLinks'] as $formLink)

                            <li><a class="dropdown-item font-14 text-white fw-500 family-open-sans hover-orange bg-transparent
                                " target="_blank" href="{{ $formLink->link }}">
                                {{$formLink->display_name, 0, 10}}
                            </a></li>
                         @endforeach
                            </ul>
                          </li>
                          @endif
                     <li class="nav-item mx-lg-3">
                            <a class="nav-link font-15 text-white fw-500 family-open-sans hover-orange px-0 pb-1 {{ request()->is('rules-and-regulations') ? 'active' : '' }}" href="{{ route('web.rules.regulations')}}">Rules</a>
                          </li>

                     <li class="nav-item mx-lg-3">
                            <a class="nav-link font-15 text-white fw-500 family-open-sans hover-orange px-0 pb-1 {{ request()->is('season-calender') ? 'active' : '' }}" href="{{ route('web.season.calender')}}">Season Calendar</a>
                          </li>
                     <li class="nav-item mx-lg-3">
                            <a class="nav-link font-15 text-white fw-500 family-open-sans hover-orange px-0 pb-1 {{ request()->is('club-contacts') ? 'active' : '' }}" href="{{ route('web.club.contacts') }}">Club Contacts</a>

                          </li>
                     <li class="nav-item mx-lg-3">
                            <a class="nav-link font-15 text-white fw-500 family-open-sans hover-orange px-0 pb-1 {{ request()->is('resources') ? 'active' : '' }}" href="{{ route('web.resources') }}">Resources</a>

                          </li>

                     <li class="nav-item mx-lg-3">
                            <a class="nav-link font-15 text-white fw-500 family-open-sans hover-orange px-0 pb-1 {{ request()->is('gallery') ? 'active' : '' }}" href="{{ route('web.gallery')}}">Gallery</a>
                          </li>
                     <li class="nav-item mx-lg-3">
                            <a class="nav-link font-15 text-white fw-500 family-open-sans hover-orange px-0 pb-1 {{ request()->is('contact-us') ? 'active' : '' }}" href="{{ route('web.contact_us')}}">Contact Us</a>
                          </li>
                        </ul>
                      </div>

                  </nav>
            </div>
          </div>
      </div>

</div>
