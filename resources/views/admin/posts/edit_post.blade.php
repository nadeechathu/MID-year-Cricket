@extends('admin.layouts.app')
@section('content')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-5">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <h3 class="m-0">Edit Post</h3>
            </nav>
            <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="./index.html">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- / Breadcrumbs-->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            @include('admin.common.alerts')
                        </div>
                        <form action="{{ route('posts.update') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <input type="text" hidden name="post_id" value="{{ $post->id }}" />

                                <div class="form-group">
                                    <label for="type">Post Type</label>
                                    <select class="form-select" id="type" name="type">
                                        @if ($post->type == 0)
                                            <option selected value="0">Event Content</option>
                                            <option value="1">News Content</option>
                                        @else
                                            <option value="0">Event Content</option>
                                            <option selected value="1">News Content</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="title">Post Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" placeholder="Title"
                                        value="{{ $post->title }}" id="title" required />
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">

                        <label for="image">Post Image</label>
                        <input type="file" id="image" name="image" class="form-control" onchange="validateImage('{{$post->id}}',event)">
                        <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types - jpeg,png,jpg,gif</b></p>
                        <div id="{{'img-validation-result'.$post->id}}" class="text-danger"></div>
                        <div class="row">
                           <div class="col-6">
                              @if ($post->image != null)
                              Current image<br/>
                              <img src="{{asset($post->image->src)}}" alt="{{$post->title}}" style="width:100%;"/>
                              @endif
                           </div>
                           <div class="col-6">
                              New Image preview
                              <br/>
                              <img src="" id="{{'image'.$post->id}}" class="w-50 mt-3"  alt="alt" style="display:none;">
                           </div>
                        </div>
                     </div> --}}

                                <div class="form-group">
                                    <label for="image">Featured Image </label>
                                    <input type="file" id="{{'image-uploader'.$post->id}}"  onchange="validateImageSizes('{{$post->id}}',event)" accept="image/x-png,image/gif,image/jpeg" class="form-control"
                                        name="image" id="image" />
                                    <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types -
                                            jpeg,png,jpg,gif,svg /
                                            Maximum upload file size 3MB</b></p>

                                            <div id="{{'img-validation-result'.$post->id}}" class="text-danger"></div>

                                </div>


                                <div class="form-group">
                                    <label for="src">Gallery images <span class="text-danger">*</span></label>
                                    <input type="file" id="image-uploaderdd" onchange="validateImageSizes('dd',event)" multiple accept="image/x-png,image/gif,image/jpeg"
                                        class="form-control" name="src[]" id="src" />
                                    <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types -
                                            jpeg,png,jpg,gif,svg /
                                            Maximum upload file size 3MB</b></p>
                                            <div id="img-validation-resultdd" class="text-danger"></div>
                                </div>





                                <div>
                                    <table class="table table-striped">
                                        <thead>
                                            <th>Image</th>
                                            <th>Change Image</th>
                                            <th>Actions</th>
                                        </thead>
                                        @if ($post->featuredImage != null)
                                            <tr id="{{ 'image_row' . $post->featuredImage->id }}">
                                                <td>
                                                    {{-- <img class="AdminImgPre" src="{{asset($image->src)}}" style="width:20%;" alt="" /> --}}

                                                    <div class="row">
                                                        <div class="col-3">
                                                            <img class="AdminImgPre w-100 d-block"
                                                                src="{{ asset($post->featuredImage->src) }}"
                                                                alt="" />
                                                        </div>



                                                        <div class="col-4 d-flex align-items-center">



                                                            <span class="badge bg-success">Featured Image</span>


                                                        </div>
                                                    </div>





                                                </td>
                                                <td>
                                                    <input type="file"
                                                        name="{{ 'image_upload_' . $post->featuredImage->id }}"
                                                        onchange="validateImageSizes('-upload{{$post->featuredImage->id}}',event)"
                                                        id = "image-uploader-upload{{$post->featuredImage->id}}"
                                                        class="form-control" />
                                                        <div id="img-validation-result-upload{{$post->featuredImage->id}}" class="text-danger"></div>
                                                    <input type="text" hidden name="image_ids[]"
                                                        value="{{ $post->featuredImage->id }}" class="form-control" />
                                                </td>
                                                <td><button type="button"
                                                        onClick="deleteProductImage({{ $post->featuredImage->id }},{{ $post->id }});"
                                                        class="btn btn-danger btn-sm text-white">Remove</button></td>
                                            </tr>
                                        @endif
                                        @foreach ($post->images as $image)
                                            <tr id="{{ 'image_row' . $image->id }}">
                                                <td>
                                                    {{-- <img class="AdminImgPre" src="{{asset($image->src)}}" style="width:20%;" alt="" /> --}}

                                                    <div class="row">
                                                        <div class="col-3">
                                                            <img class="AdminImgPre w-100 d-block"
                                                                src="{{ asset($image->src) }}" alt="" />
                                                        </div>



                                                        <div class="col-4 d-flex align-items-center">



                                                            @if ($image->featuredImage == 1)
                                                                <span class="badge bg-success">Featured Image</span>
                                                            @endif


                                                        </div>
                                                    </div>





                                                </td>
                                                <td>
                                                    <input type="file" name="{{ 'image_upload_' . $image->id }}"
                                                        class="form-control" />
                                                    <input type="text" hidden name="image_ids[]"
                                                        value="{{ $image->id }}" class="form-control" />
                                                </td>
                                                <td><button type="button"
                                                        onClick="deleteProductImage({{ $image->id }},{{ $post->id }});"
                                                        class="btn btn-danger btn-sm text-white">Remove</button></td>
                                            </tr>
                                        @endforeach

                                    </table>
                                    <input type="text" hidden name="removed_images"
                                        id="{{ 'removed_images' . $post->id }}" />
                                </div>



                                <div class="form-group">
                                    <label for="slug">Slug <span class="text-danger">*</span></label>
                                    <input type="text" name="slug"
                                        class="form-control @error('slug') is-invalid @enderror"
                                        value="{{ $post->slug }}" placeholder="Slug" id="slug" required />
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" name="location"
                                        class="form-control @error('location') is-invalid @enderror"
                                        value="{{ $post->location }}" placeholder="Location" id="location" />
                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>




                                <div class="form-group">
                                    <label for="event_date_time">Event Date & Time</label>
                                    <input type="datetime-local" name="event_date_time"
                                        class="form-control @error('event_date_time') is-invalid @enderror"
                                        value="{{ $post->event_date_time }}" placeholder="Event Date & Time"
                                        id="event_date_time" />
                                    @error('event_date_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="body">Post Content</label>
                                    <textarea class="ckeditor form-control" name="body" value="{{ old('body') }}">{{ $post->body }}</textarea>
                                    @error('body')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- <div class="form-group">
                        <label for="category">Post Category</label>
                        <select class="form-control js-example-basic-single" name="category">
                           @foreach ($post_categories as $category)
                           @if ($post->category_id == $category->id)
                           <option selected value="{{$category->id}}">{{$category->category_name}}</option>
                           @else
                           <option value="{{$category->id}}">{{$category->category_name}}</option>
                           @endif
                           @endforeach
                        </select>
                     </div> --}}
                                <div class="form-group">
                                    <label for="status">Published Status</label>
                                    <select class="form-select" id="status" name="status">
                                        @if ($post->status == 1)
                                            <option value="0">Unpublished</option>
                                            <option selected value="1">Published</option>
                                        @else
                                            <option selected value="0">Unpublished</option>
                                            <option value="1">Published</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="featured">Featured Post</label>
                                    <select class="form-select" id="featured" name="featured">
                                        @if ($post->featured == 0)
                                            <option selected value="0">No</option>
                                            <option value="1">Yes</option>
                                        @else
                                            <option value="0">No</option>
                                            <option selected value="1">Yes</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-dark text-white">Update Post</button>
                            </div>
                        </form>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
<script type="text/javascript">
    import Tags from "https://cdn.jsdelivr.net/npm/bootstrap5-tags@1.3.1/tags.min.js";
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
        // $('.js-example-basic-single').select2();
    });
</script>


@section('scripts')
@endsection

<script>
    function deleteProductImage(imageId, productId) {

        let removedImagesElm = document.getElementById('removed_images' + productId);

        if (removedImagesElm !== undefined) {

            var removedImages = removedImagesElm.value.split(',');

            if (!removedImages.includes('' + imageId)) {
                removedImages.push(imageId);
            }


            removedImagesElm.value = removedImages;

            document.getElementById('image_row' + imageId).remove();
        }

    }
</script>
