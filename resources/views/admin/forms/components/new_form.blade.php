<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addForm">
    <i class="ri-add-circle-line align-bottom"></i> New Form
</button>

<!-- Modal -->
<div class="modal fade" id="addForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('forms.create') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Display Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="display_name" value="" id="display_name" required>

                    </div>

                    <div class="form-group">
                        <label for="">Link (URL) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="link" value="" id="link" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Published Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="0">Unpublished</option>
                            <option value="1">Published</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create Form</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
