@extends('frontend.layouts.app')
@include('frontend.common.seo_fields')
@section('content')
   
@include('frontend.layouts.sliders.slider')

@include('frontend.layouts.components.client_logo')

@include('frontend.layouts.components.events')

@include('frontend.layouts.components.news')

@include('frontend.layouts.components.gallery')

@include('frontend.layouts.components.community')

@include('frontend.layouts.components.subscribe')

@endsection
