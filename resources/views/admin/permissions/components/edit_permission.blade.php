<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="{{'#edit-permission-modal'.$permission->id}}">
<i class="fa fa-edit"></i> Edit
</button>

<!-- Modal -->
<div class="modal fade" id="{{'edit-permission-modal'.$permission->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Permission</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
      </div>
      <form action="{{route('permissions.update')}}" method="post">
          {{csrf_field()}}
      <div class="modal-body">
        <div class="form-group">
            <label for="tag_name">Permission Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$permission->name}}" required/>
            <input type="text" name="permission_id" id="permission_id" value="{{$permission->id}}" hidden/>
        </div>

        <div class="form-group">
            <label for="type">Permission Type</label>
            <select class="form-select" name="type" id="type">

                @foreach ($types as $type)

                    @if ($permission->type == $type )
                    <option selected value="{{$type}}">{{ucfirst($type)}}</option>
                    @else
                    <option value="{{$type}}">{{ucfirst($type)}}</option>
                    @endif

                @endforeach

            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update Permission</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
