<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addForm">
    <i class="ri-add-circle-line align-bottom"></i> New Gallery
</button>

<!-- Modal -->
<div class="modal fade" id="addForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Gallery</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="add-gallery-close" aria-label="Close"></button>
            </div>
            <form action="{{ route('gallery.create') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="y-5" id="progress-div"></div>

                    <div id="add-gallery-body">
                    <div class="form-group">
                        <label for="category">Gallery Category </label>
                        <select class="form-select js-example-basic-single" name="category_id" id="category_id" required>
                           @foreach ($gallery_categories as $gallery_category)


                           <option value="{{$gallery_category->id}}">{{$gallery_category->category_name}}</option>

                           @endforeach
                        </select>
                     </div>


                    {{-- <div class="form-group" hidden>
                        <label for="">Title Name</label>
                        <input type="text" class="form-control" name="title" value="" id="title" required>

                    </div> --}}

                    <div class="form-group">
                        <label for="src">Image <span class="text-danger">*</span></label>
                        <input type="file" multiple accept="image/x-png,image/gif,image/jpeg" id="image-uploader0" type="file"  name="images[]"  class="form-control"
                            required>
                        <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types - jpeg,png,jpg,gif ( Maximum upload file size 20MB)</b>
                        </p>
                        {{-- <img src="" id="img-result-output" class="w-100 d-none" class="w-100" alt="alt" style="display:none"> --}}
                        <div id="img-validation-result0" class="text-danger"></div>
                    </div>

                    <div class="form-group">
                        <label for="status">Published Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="0">Unpublished</option>
                            <option value="1">Published</option>
                        </select>
                    </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onClick="uploadMultipleFiles(0)" id="add-gallery-create">Create Gallery</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
