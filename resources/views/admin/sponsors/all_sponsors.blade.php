@extends('admin.layouts.app')

@section('content')
<div>
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
          <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
            <h3 class="m-0">All Sponsors</h3>

          </nav>
          <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
          <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="./index.html">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">All Sponsors</li>
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
                @if (Auth::user()->hasPermission('add_sponsors'))
                 <a href="{{route('sponsors.new')}}"><button type="button" class="btn btn-primary btn-sm"><i class="ri-add-circle-line align-bottom"></i> New Sponsor</button></a>

                 @endif
                </div>
               <div class="col-md-6" style="float:right;">
                <form action="{{route('sponsors.all')}}" method="get">
                        <div class="input-group">
                            <input type="search" class="form-control" name="searchKey" placeholder="Sponsors Title" value="{{$searchKey}}">
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
                      <th style="width:15%;">Logo</th>
                      <th>Sponsor Title</th>

                      <th>Published Status</th>

                      <th style="width:45%;">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($sponsors as $sponsor)
                       <tr>

                        <td>  <img src="{{asset($sponsor->src)}}"  class="w-100" alt="{{$sponsor->title}}" /></td>
                        <td>{{$sponsor->title}}</td>


                           <td>
                            @if($sponsor->status == 1)
                            <span class="badge bg-success">Published</span>
                            @else
                            <span class="badge bg-danger">Not Published</span>
                            @endif
                           </td>

                           <td>

                            @if (Auth::user()->hasPermission('edit_sponsors'))

                            @include('admin.sponsors.components.edit_sponsors')

                          @endif
                                @if (Auth::user()->hasPermission('remove_sponsors'))

                                  @include('admin.sponsors.components.sponsor_delete')

                                @endif





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

             {{$sponsors->links()}}

              </div>
                  </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </section>
  </div>

@endsection
