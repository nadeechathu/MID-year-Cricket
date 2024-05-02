@extends('admin.layouts.app')

@section('content')
<div> 
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
          <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
            <h3 class="m-0">Approve Posts</h3>
             
          </nav>
          <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
          <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="./index.html">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Approve Posts</li>
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
                
                </div>
               <div class="col-md-6" style="float:right;">
                <form action="{{route('posts.approval')}}" method="get">
                        <div class="input-group">
                            <input type="search" class="form-control" name="searchKey" placeholder="Post Title" value="{{$searchKey}}">
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
                      <th>Post Title</th>
                      <th>Approval Status</th>
                      <th>Published Status</th>
                      <th>Type</th>
                      <th>Category</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($posts as $post)
                       <tr>
                           <td>{{$post->title}}</td>                           
                           <td>
                            @if($post->is_approved == 1)
                            <span class="badge bg-success">Approved</span>
                            @else
                            <span class="badge bg-danger">Not Approved</span>
                            @endif
                           </td>
                           <td>
                            @if($post->status == 1)
                            <span class="badge bg-success">Published</span>
                            @else
                            <span class="badge bg-danger">Not Published</span>
                            @endif
                           </td>
                           <td>
                            @if($post->type == 0)
                            <span class="badge bg-success">Blog Content</span>
                            @else
                            <span class="badge bg-danger">News Content</span>
                            @endif
                           </td>
                           <td>
                             @if ($post->category != null)
                              {{$post->category->category_name}}
                             @else
                               Uncategorized
                             @endif
                            
                           </td>                            
                           <td>                               

                                @include('admin.posts.components.preview_modal')
                               
                               @if ($post->is_approved == 1 and Auth::user()->hasPermission('edit_posts'))
                                @include('admin.posts.components.publish_unpublish')
                               @endif

                               @if ($post->is_approved != 1 and Auth::user()->hasPermission('approve_posts'))
                                @include('admin.posts.components.post_approval')
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

             {{$posts->links()}}

              </div>
                  </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </section>
  </div>    

@endsection
