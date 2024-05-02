<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="{{'#add-category-modal'}}">
    <i class="ri-add-circle-line align-bottom"></i> Add New
    </button>
    <!-- Modal -->
    <div class="modal fade" id="{{'add-category-modal'}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" style="max-width:1000px;" role="document">
          <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{route('categories.create')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">
                   <div class="row">
                      <div class="col-md-6">
                         <input type="text" name="cat_type" hidden value="0">

                         <div class="mb-3">
                            <label for="category_name">Category Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category Name" required/>
                         </div>
                         <div class="mb-3">
                            <label for="category_description">Category Description <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="category_description" id="category_description" placeholder="Category Description" required/>
                         </div>
                         <div class="mb-3">
                            <label for="slug">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" required/>
                         </div>
                         <div class="mb-3">
                            <label for="image">Category Image <span class="text-danger">*</span></label>
                            <input type="file"  name="image" class="form-control"  id="image-uploader1" name="src[]" id="src"  onchange="validateImageSizes('1',event)">
                            <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types - jpeg,png,jpg,gif
                                 (Maximum upload file size 2MB )</b>
                            </p>
                            <div id="img-validation-result1" class="text-danger"></div>
                            <div id="errorMessage" class="text-danger"></div>
                         </div>
                         <div class="mb-3">
                            <label for="type">Type</label>
                            <select class="form-select" name="type" id="type">
                               {{--<option value="0">Post</option>--}}
                               <option value="2">Gallery</option>
                            </select>
                         </div>


                         <div class="form-group">
                            <label for="status">Published Status</label>
                            <select class="form-select" id="status" name="status">

                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                      </div>
                      <div class="col-md-6">
                         <div class="mb-3">
                            <label for="page_title">Page Title</label>
                            <input type="text" class="form-control" name="page_title" id="page_title" placeholder="Page Title"/>
                         </div>
                         <div class="mb-3">
                            <label for="meta_tag_description">Meta Tag Description</label>
                            <input type="text" class="form-control" name="meta_tag_description" id="meta_tag_description" placeholder="Meta Tag Description"/>
                         </div>
                         <div class="mb-3">
                            <label for="meta_keywords">Meta Keywords</label>
                            <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" placeholder="Meta Keywords" />
                         </div>
                         <div class="mb-3">
                            <label for="canonical_url">Canonical URL</label>
                            <input type="text" class="form-control" name="canonical_url" id="canonical_url" placeholder="Canonical URL" />
                         </div>
                      </div>
                   </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-primary" onclick="return Upload()">Create Category</button>
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
             </form>
          </div>
       </div>
    </div>
