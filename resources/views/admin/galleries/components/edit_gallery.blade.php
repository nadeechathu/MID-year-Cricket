<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
    data-bs-target="{{ '#edit-gallery' . $gallery->id }}">
    <i class="fa fa-edit"></i> Edit
</button>

<!-- Modal -->
<div class="modal fade" id="{{ 'edit-gallery' . $gallery->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit gallery </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('gallery.update', ['id' => $gallery->id]) }}" method="post"
                id="{{ 'gallery-form-' . $gallery->id }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">


                    <div class="form-group">
                        <label for="category">Gallery Category</label>
                        <select class="form-select js-example-basic-single" name="category_id" name="category_id" required>
                            @foreach ($gallery_categories as $gallery_category)
                                @if ($gallery->category_id == $gallery_category->id)
                                    <option selected value="{{ $gallery_category->id }}">
                                        {{ $gallery_category->category_name }}</option>
                                @else
                                    <option value="{{ $gallery_category->id }}">{{ $gallery_category->category_name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label for="category">Gallery Category</label>
                        <select class="form-control js-example-basic-single" name="category_id" id="category_id">
                           @foreach ($gallery_categories as $gallery_category)


                           <option value="{{$gallery_category->id}}">{{$gallery_category->category_name}}</option>

                           @endforeach
                        </select>
                     </div> --}}


                    {{-- <div class="form-group" hidden>
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $gallery->alt_text }}"
                            id="title" required>
                    </div>
                    id="title">
                    </div> --}}

                    <div class="form-group">
                        <label for="image">Gallery <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="src" id="{{ 'image-uploader' . $gallery->id }}"
                            onchange="validateImageSizes('{{ $gallery->id }}',event)" />
                        <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types - jpeg,png,jpg,gif
                                ( Maximum upload file size 20MB)</b></p>
                        <div id="{{ 'img-validation-result' . $gallery->id }}" class="text-danger"></div>
                        <div class="row">
                            <div class="col-6">
                                <p id="{{'image-div'.$gallery->id}}"></p>
                                @if ($gallery->src != null)
                                    <img id="{{ 'image' . $gallery->id }}" src="{{ asset($gallery->src) }}" style="width:100%" />
                                @else
                                    No image uploaded
                                @endif
                            </div>


                            <div id="{{'img-validation-result'.$gallery->id}}" class="text-danger"></div>
                        </div>


                    </div>


                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="form-select" id="status">
                            <option {{ $gallery->status == 1 ? 'selected' : '' }} value="1">Published</option>
                            <option {{ $gallery->status == 0 ? 'selected' : '' }} value="0">Unpublished</option>


                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update gallery</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>
