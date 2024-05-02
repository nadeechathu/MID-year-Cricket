@extends('admin.layouts.app')

@section('content')
<div>
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-5">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <h3 class="m-0">All Resources</h3>

            </nav>
            <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="./index.html">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Resources</li>
                </ol>
            </div>
        </div>
    </div> <!-- / Breadcrumbs-->


    <section class="container-fluid">

        <div class="card">
            <div class="card-header">
                @include('admin.common.alerts')
                <div class="row">
                    <div class="col-md-6">
                        <!-- Add form modal -->
                        @if (Auth::user()->hasPermission('add_resources'))

                        @include('admin.resources.components.new_resource')

                        @endif
                    </div>
                    <div class="col-md-6" style="float:right;">
                        <form action="{{route('resources.all')}}" method="get">
                            <div class="input-group">
                                <input type="search" class="form-control" name="searchKey" placeholder="Resource Title"
                                    value="{{$searchKey}}">
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
                        <!-- table -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>File Preview</th>
                                    <th style="width:20%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($resources as $resource)
                                <tr>
                                    <td>{{$resource->title}}</td>
                                    <td>{{$resource->description}}</td>
                                    <td>
                                        @if($resource->status == 1)
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($resource->pdf_src != null)
                                        <a href="{{asset($resource->pdf_src)}}" class="btn btn-dark btn-sm" target="_blank">Preview File</a>
                                        @else
                                        N/A
                                        @endif
                                    </td>

                                    <td>

                                    @if (Auth::user()->hasPermission('edit_resources'))

                                        @include('admin.resources.components.edit_resource')
                                        
                                    @endif
                                    @if (Auth::user()->hasPermission('delete_resources'))

                                        @include('admin.resources.components.delete_resource')

                                        
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

                    {{$resources->links()}}

                </div>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
</div>

@endsection
