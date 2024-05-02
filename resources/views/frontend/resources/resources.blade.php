@extends('frontend.layouts.app')
@include('frontend.common.seo_fields')
@section('content')

<div class="container-fluid mt-lg-5 py-5 family-open-sans rules-regulations-section">
    <!-- row -->
    <div class="row mt-lg-5 pt-lg-5">
        <div class="col-12">
            <h1 class="contacts-heading">Resources</h1>
        </div>
        <div class="col-12 mt-5">
            <div class="accordion" id="accordionExample">
            @foreach ($resources as $resource)

             
            <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                    <h5>{{$resource->title}}</h5>
                    <p>{{$resource->description}}</p>
                    </div>
                    <div class="col-md-4">
                        @if($resource->pdf_src != null)
                        <a href="{{asset($resource->pdf_src)}}" target="_blank" class="hvr-sink">
                                        <img src="{{ asset('/images/download-pdf.png') }}"/>
                                    </a>
                        @endif
                    </div>
                </div>
            </div>
            </div>

            @endforeach
        </div>



        </div>
    </div>
</div>

@endsection
