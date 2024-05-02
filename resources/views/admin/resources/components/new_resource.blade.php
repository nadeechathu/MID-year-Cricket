<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addResource">
    <i class="ri-add-circle-line align-bottom"></i> New Resource
</button>

<!-- Modal -->
<div class="modal fade" id="addResource" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Resource</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('resources.create') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" value="" required>

                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="6"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">File <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="pdf_src" value="" required>
                        {{-- <p><small class="text-danger">Allowed file types - pdf </small></p> --}}

                        <p style="font-weight:bold;font-size:0.75rem;"><b>Allowed file types - pdf , Maximum upload file size 5MB</b>
                        </p>

                    </div>
                    <div class="form-group">
                        <label for="status">Type</label>
                        <select class="form-select" name="type" required>
                            <option value="0">Resource</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-select" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create Resource</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
