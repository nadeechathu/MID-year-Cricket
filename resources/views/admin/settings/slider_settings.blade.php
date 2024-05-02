@extends('admin.layouts.app')

@section('content')
    


<div> 
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
          <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
            <h3 class="m-0">Slider Settings</h3>
             
          </nav>
          <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
          <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="./index.html">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Slider Settings</li>
              </ol>
          </div>
          </div>
        </div>        <!-- / Breadcrumbs-->

        
        <section class="container-fluid">
          
        <div class="card">
              <div class="card-header">
                @include('admin.common.alerts')
               <div class="row">
                 <div class="col-md-6">
                 @if (Auth::user()->hasPermission('site_settings'))

                    @include('admin.settings.components.add_new_slider_image')

                   @endif
                 </div>
               <div class="col-md-6" style="float:right;">
                
                </div>

                
              </div>
               </div>
              <div class="card-body">
              <div class="row overflow-auto">
                  <div class="col-md-12">
                  <table class="table table-bordered">
                  <thead>
                    <tr>                     
                      <th style="width:200px;">Image</th>
                      <th>Alt Text</th>
                      <th>Heading</th>
                      <th>Caption</th>
                      <th>Status</th>
                      <th style="width:20%;">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($sliderImages as $sliderImage)
                       <tr>
                           <td><img src="{{asset($sliderImage->src)}}" style="width:75%; margin-bottom:20px;" alt="{{$sliderImage->alt_text}}"></td>
                           <td>{{$sliderImage->alt_text}}</td>
                           <td>{{$sliderImage->heading}}</td>
                           <td>{{$sliderImage->caption}}</td>
                           <td>
                             @if ($sliderImage->status == 1)
                             <span class="badge bg-success">Show</span>
                             @else
                             <span class="badge bg-danger">No Show</span>
                             @endif
                           </td>                           
                           <td>
                             @include('admin.settings.components.edit_slider_image')
                             @include('admin.settings.components.delete_slider_image')
                           </td>
                       </tr>
                   @endforeach
                  </tbody>
                </table>
                
                  </div>
              </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              <div class="d-felx justify-content-center">


              </div>
                  </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </section>
  </div>

@endsection
