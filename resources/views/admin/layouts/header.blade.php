 <!-- Navbar-->
 <nav class="navbar navbar-expand-lg navbar-light border-bottom py-0 fixed-top bg-white">
      <div class="container-fluid">
        <a class="navbar-brand d-flex justify-content-center align-items-center border-end"
          href="{{ route('web.home') }}">
          <img class="w-25" src="{{ asset('/images/myca.png') }}" alt="Mid Year Cricket Association">
        </a>
        <div class="d-flex justify-content-between align-items-center flex-grow-1 navbar-actions">

          <!-- Search Bar and Menu Toggle-->
          <div class="d-flex align-items-center">

            <!-- Menu Toggle-->
            <div class="menu-toggle cursor-pointer me-4 text-primary-hover transition-color disable-child-pointer">
              <i class="ri-skip-back-mini-line ri-lg fold align-middle" data-bs-toggle="tooltip" data-bs-placement="right"
                title="Close menu"></i>
              <i class="ri-skip-forward-mini-line ri-lg unfold align-middle" data-bs-toggle="tooltip" data-bs-placement="right"
                title="Open Menu"></i>
            </div>
            <!-- / Menu Toggle-->



          </div>
          <!-- / Search Bar and Menu Toggle-->

          <!-- Right Side Widgets-->
          <div class="d-flex align-items-center">
          <div class=""><a class="dropdown-item d-flex align-items-center" href="{{url('/')}}">Visit Site</a></div>
            <!-- Notifications-->
            <div class="d-none d-sm-flex dropdown mx-1">
              <button class="btn-action text-muted" type="button" id="notificationsDropdown" data-bs-toggle="dropdown"
                aria-expanded="false">
                <span class="f-w-4">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="w-100">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                  </svg>
                </span>
                <span
                class="position-absolute top-0 start-50 p-1  border border-3 border-white rounded-circle mt-n1 available-circle">
                <span class="visually-hidden">New alerts</span>
              </span>
              </button>
              <div class="dropdown-menu dropdown-menu-end dropdown-lg" aria-labelledby="notificationsDropdown">
                <div class="dropdown-header d-flex justify-content-between align-items-center">
                  <p class="fw-bolder m-0 text-body">Notifications</p>
                  <span class="badge bg-success-faded text-success rounded-pill">0 new</span>
                </div>
                <div class="simplebar-wrapper">
                  <div data-pixr-simplebar>
                    <ul class="list-unstyled m-0 pb-4">
                     {{-- @foreach ($notifications as $notification)
                        <a href="{{route($notification['route'])}}">
                          <li class="d-flex py-2 align-items-start">
                            <button class="btn-icon bg-primary-faded text-primary fw-bolder me-3">O</button>
                            <div class="d-flex align-items-start justify-content-between flex-grow-1">
                              <div>
                                <p class="lh-1 mb-2 fw-semibold text-body">{{$notification['title']}}</p>
                                <p class="text-muted lh-1 mb-2 small">{{$notification['message']}}</p>
                              </div>
                              <small class="text-muted text-uppercase tracking-wide fw-bold fs-xs"></small>
                            </div>
                          </li>
                        </a>
                      @endforeach --}}


                    </ul>
                  </div>
                </div>
                <div><a class="dropdown-item text-primary fw-bolder text-center border-top pt-3" href="#">See more &rarr;</a></div>
              </div>
            </div>        <!-- / Notifications-->



            <!-- Apps-->
            <div class="d-none d-sm-flex dropdown mx-1">
              <button class="btn-action mx-1" type="button" id="appsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="f-w-4 text-muted">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                  </svg>
                </span>
              </button>
              <div class="dropdown-menu dropdown-menu-end dropdown-lg" aria-labelledby="appsDropdown">
                <div class="dropdown-header d-flex justify-content-between align-items-center">
                  <p class="fw-bolder m-0 text-body">Quick Menu</p>
                </div>
                <div class="simplebar-wrapper">
                  <div data-pixr-simplebar>

                  </div>
                </div>
                <div></div>
              </div>
            </div>        <!-- / Apps-->

            <!-- Profile Menu-->
            <div class="dropdown ms-1">
                <button class="btn btn-link p-0 position-relative" type="button" id="profileDropdown"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <picture>
                    <img class="f-w-10 rounded-circle" src="{{Auth::user()->user_image != null ? asset(Auth::user()->user_image) : asset('images/no_user_image.png')}}" alt="{{Auth::user()->first_name}}">
                  </picture>
                  <span
                    class="position-absolute bottom-0 start-75 p-1  border border-3 border-white rounded-circle available-circle">
                    <span class="visually-hidden">New alerts</span>
                  </span>
                </button>
                <ul class="dropdown-menu dropdown-md dropdown-menu-end" aria-labelledby="profileDropdown">

                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li class="d-flex py-2 align-items-start">
                    <button class="btn-icon bg-primary-faded text-primary fw-bolder me-3">J</button>
                    <div class="d-flex align-items-start justify-content-between flex-grow-1">
                      <div>
                        <p class="lh-1 mb-2 fw-semibold text-body">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
                        <p class="text-muted lh-1 mb-2 small">{{Auth::user()->email}}</p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item d-flex align-items-center" href="{{route('profile')}}">Update Profile</a></li>
                  <li><a class="dropdown-item d-flex align-items-center" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                </ul>
              </div>        <!-- / Profile Menu-->
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
          </div>
          <!-- / Notifications & Profile-->
        </div>
      </div>
    </nav>    <!-- / Navbar-->
