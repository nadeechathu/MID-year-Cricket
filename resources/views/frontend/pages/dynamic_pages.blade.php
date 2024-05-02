@extends('frontend.layouts.app')

@include('frontend.common.seo_fields')

@section('content')


<!-- Breadcrumbs-->
<div class="bg-white border-bottom py-3">


    <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0 px-4">
    <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$page['page_heading']}}</li>
        </ol>

    </div>
  </div>        <!-- / Breadcrumbs-->


  <div>
       @if ($page->page_banner != null)
                                <img class="w-100" src="{{asset($page->page_banner)}}" alt="$page->page_heading">
                            @endif
       </div>

   <!-- Header-->
   <header class="py-3">
       
                <div class="container px-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xxl-6">
                           
                            
                            <div class="text-center my-5">
                                <h1 class="fw-bolder mb-3">{{$page['page_heading']}}</h1>
                                <p class="lead fw-normal text-muted mb-4">{!!$page['pageDescriptions']['content']!!}</p>
                                <!-- <a class="btn btn-primary btn-lg" href="#scroll-target">Read our story</a> -->
                            </div>
                        </div>
                    </div>
                </div>
    </header>




@endsection
