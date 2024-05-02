@extends('admin.layouts.app')

@section('content')
<div>
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
          <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
            <h3 class="m-0">Manage Categories</h3>

          </nav>
          <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
          <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="./index.html">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Manage Categories</li>
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
                  @if (Auth::user()->hasPermission('add_categories'))

                   @include('admin.categories.components.new_category_modal')

                   @endif
                 </div>
               <div class="col-md-6" style="float:right;">
                <form action="{{route('categories.all')}}" method="get">
                        <div class="input-group">
                            <input type="search" class="form-control" name="searchKey" placeholder="Category Name" value="{{$searchKey}}">
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
                      <th>Image</th>
                      <th>Category Name</th>
                      <th>Category Description</th>
                      <th>Slug</th>
                      <th>Status</th>
                      <th>Type</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($categories as $category)
                       <tr>
                          <td>
                               <img style="width:150px;" src="{{asset($category->category_image)}}" alt="{{$category->category_name}}">
                           </td>
                           <td>{{$category->category_name}}</td>
                           <td>{{$category->category_description}}</td>
                           <td>{{$category->slug}}</td>
                           <td>
                            @if($category->status == 1)
                            <span class="badge bg-success">Active</span>
                            @else
                            <span class="badge bg-danger">Inactive</span>
                            @endif
                           </td>
                           <td>
                            @if($category->type == 0)
                            Product
                            @elseif ($category->type == 1)
                            Post
                            @else
                            Gallery
                            @endif
                           </td>
                           <td>

                                @if (Auth::user()->hasPermission('edit_categories'))

                                @include('admin.categories.components.edit_category_modal')

                                @endif

                                @if (Auth::user()->hasPermission('delete_categories'))

                                @include('admin.categories.components.remove_category_modal')

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

             {{$categories->links()}}

              </div>
                  </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </section>
  </div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    document.getElementById('image').addEventListener('change', function() {
      var imageInput = this;
      var file = imageInput.files[0];
      var errorMessage = document.getElementById('errorMessage');

      if (file && file.size > 1024 * 1024) {
        errorMessage.innerText = 'Image size exceeds the maximum allowed size of 1024KB (1MB).';
        errorMessage.style.display = 'block';
        imageInput.value = ''; // Clear the file input value to allow reselection
      } else {
        errorMessage.style.display = 'none';
      }
    });
    </script>
