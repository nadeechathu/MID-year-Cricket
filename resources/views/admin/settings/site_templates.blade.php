@extends('admin.layouts.app')

@section('content')



<div>
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
          <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
            <h3 class="m-0">Site Templates</h3>

          </nav>
          <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
          <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="./index.html">Admin</a></li>
                  <li class="breadcrumb-item"><a href="./index.html">Settings</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Site Templates</li>
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
                 @include('admin.settings.components.add_new_template_modal')
                 </div>
               <div class="col-md-6" style="float:right;">
                <form action="{{route('settings.templates')}}" method="get">
                        <div class="input-group">
                            <input type="search" class="form-control" name="searchKey" placeholder="Section" value="{{$searchKey}}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


              </div>
               </div>
              <div class="card-body">
              <div class="row overflow-auto">
                  <div class="col-md-12">
                  <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Template Image</th>
                      <th>Section</th>
                      <th>Template Number</th>
                      <th style="width:20%;">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($templates as $template)
                       <tr>
                           <td>
                            <img style="height: 50px;width: 80px;"  src="{{$template->template_image}}">


                            </td>
                           <td>{{$template->section}}</td>
                           <td>{{$template->template_number}}</td>
                           <td>

                           @include('admin.settings.components.edit_template_modal')

                           @include('admin.settings.components.remove_template')

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

             {{$templates->links()}}

              </div>
                  </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </section>
  </div>

@endsection
