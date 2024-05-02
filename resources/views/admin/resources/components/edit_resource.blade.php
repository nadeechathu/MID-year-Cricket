<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="{{'#edit-form'.$resource->id}}">
    <i class="fa fa-edit me-2"></i>Edit
</button>

<!-- Modal -->
<div class="modal fade" id="{{'edit-form'.$resource->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit - {{$resource->title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('resources.edit',['id' => $resource->id])}}" method="post" id="{{'form-'.$resource->id}}"
                enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" value="{{$resource->title}}" required>
                            <input type="text" hidden name="resource_id" value="{{$resource->id}}">
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="6">{{$resource->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">File <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="pdf_src" value="">
                            <p style="font-weight:bold;font-size:0.75rem;"><b>Allowed file types - pdf , Maximum upload file size 5MB</b>
                            </p>

                            @if($resource->pdf_src != null)
                            <a href="{{asset($resource->pdf_src)}}" class="btn btn-dark btn-sm" target="_blank">Preview Document</a>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="status">Type</label>
                            <select class="form-select" name="type" required>
                                <option {{$resource->type == 0 ? 'selected' : ''}} value="0">Resource</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-select" name="status" required>
                                <option {{$resource->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                <option {{$resource->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Resource</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
