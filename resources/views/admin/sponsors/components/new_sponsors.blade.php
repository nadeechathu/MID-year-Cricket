@extends('admin.layouts.app')


@section('content')
<div>
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-5">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <h3 class="m-0">New Sponsor</h3>

            </nav>
            <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="./index.html">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">New Sponsor</li>
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
                <form action="{{ route('sponsors.create') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title">Sponsor Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title') }}" placeholder="Title" id="title" required />


                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="src">Sponsor Logo <span class="text-danger">*</span></label>
                        <input type="file" id="image-uploader1" type="file" name="src" class="form-control"
                        onchange="validateImageSizes('1',event)">
                            <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types -
                                jpeg,png,jpg,gif,svg /  Maximum upload file size 2MB</b></p>
                        </p>
                        <img src="" id="img-result-output" class="w-100" alt="alt" style="display:none">
                        <div id="img-validation-result1" class="text-danger"></div>
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
                <button type="submit" class="btn btn-primary">Create Sponsor</button>
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
