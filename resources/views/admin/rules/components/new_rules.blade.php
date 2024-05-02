@extends('admin.layouts.app')


@section('content')
    <div>
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
            <div
                class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
                <nav class="mb-0" aria-label="breadcrumb">
                    <h3 class="m-0">New Rule</h3>

                </nav>
                <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="./index.html">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">New Rule</li>
                    </ol>
                </div>
            </div>
        </div> <!-- / Breadcrumbs-->


        <section class="container-fluid">

            <div class="card">
                <div class="row">
                    <div class="mb-12">
                        @include('admin.common.alerts')
                    </div>

                </div>
                <div class="card-body">
                <form action="{{ route('rules.create') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title">Rule Title <span class="text-danger">*</span> </label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title') }}" placeholder="Title" id="title" required />


                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>


                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control ckeditor @error('description') is-invalid @enderror" name="description" id="magazine-desc-create">{{old('description')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="rules_document">Document</label>
                        <input type="file" name="pdf_src" class="form-control" >
                        <p style="font-weight:bold;font-size:0.75rem;"><b>Allowed file types - pdf , Maximum upload file size 5MB</b>
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="status">Published Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="0">Unpublished</option>
                            <option value="1">Published</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create Rule</button>
                </div>
            </div>
            <!-- /.card-body -->

            </form>
            <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    </section>
    </div>
@endsection
