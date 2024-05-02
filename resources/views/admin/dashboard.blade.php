@extends('admin.layouts.app')

@section('content')

  <div>
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
          <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
            <h3 class="m-0">Dashboard</h3>

          </nav>
          <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
          <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
              </ol>
          </div>
          </div>
        </div>        <!-- / Breadcrumbs-->


        <section class="container-fluid">

         <!-- Page Title-->
         <h5 class="fs-5 fw-bold mb-2">Welcome back, {{Auth::user()->first_name}} {{Auth::user()->last_name}}</h5>
            <p class="text-muted mb-5">Get a quick overview of your company's current status below, or click into one of the sections for a more detailed breakdown.</p>
            <!-- / Page Title-->

            <!-- Top Row Widgets-->
            <div class="row g-4">


                    <!-- Registered users Widget -->
                    {{-- <div class="col-12 col-sm-3 col-xxl-3">
                        <div class="card h-100">
                            <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                                <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Registered Users</h6>
                            </div>
                            <div class="card-body">
                                <div class="row gx-4 mb-3 mb-md-1">
                                    <div class="col-12 col-md-6">
                                        <p class="fs-3 fw-bold d-flex align-items-center">{{$totalUsers}}</p>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="chart chart-sm">

                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">

                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- / Registered users Widget-->

                    <!-- Total Posts count Widget-->
                    {{-- <div class="col-12 col-sm-3 col-xxl-3">
                        <div class="card h-100">
                            <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                                <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Total Posts</h6>
                            </div>
                            <div class="card-body">
                                <div class="row gx-4 mb-3 mb-md-1">
                                    <div class="col-12 col-md-6">
                                        <p class="fs-3 fw-bold d-flex align-items-center">{{$totalPosts}}</p>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="chart chart-sm">

                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">


                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- / Total Posts count Widget-->

                    <!-- Total Not Approved Posts count Widget-->
                    {{-- <div class="col-12 col-sm-3 col-xxl-3">
                        <div class="card h-100">
                            <div class="card-header justify-content-between align-items-center d-flex border-0 pb-0">
                                <h6 class="card-title m-0 text-muted fs-xs text-uppercase fw-bolder tracking-wide">Not Approved Posts</h6>
                            </div>
                            <div class="card-body">
                                <div class="row gx-4 mb-3 mb-md-1">
                                    <div class="col-12 col-md-6">
                                        <p class="fs-3 fw-bold d-flex align-items-center">{{$totalPostsToApprove}}</p>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="chart chart-sm">

                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">


                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- / Total Not Approved Posts count Widget-->





        </section>
  </div>

@endsection
