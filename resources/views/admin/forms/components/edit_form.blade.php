<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="{{'#edit-form'.$form->id}}">
    <i class="fa fa-edit me-2"></i>Edit
</button>

<!-- Modal -->
<div class="modal fade" id="{{'edit-form'.$form->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit - {{$form->display_name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('forms.edit',['id' => $form->id])}}" method="post" id="{{'form-'.$form->id}}"
                enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Dispaly Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="display_name" value="{{$form->display_name}}"
                                id="display_name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Link (URL) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="link" value="{{$form->link}}" id="link"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" class="form-select" id="status">
                                <option {{$form->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                <option {{$form->status == 0 ? 'selected' : ''}} value="0">In Active</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Form</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
