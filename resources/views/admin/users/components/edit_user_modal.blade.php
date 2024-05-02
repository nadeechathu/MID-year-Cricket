
<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="{{'#edit-modal-'.$user->id}}">
  <i class="fas fa-edit"></i> Edit
</button>

<!-- Modal -->
<div class="modal fade" id="{{'edit-modal-'.$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:500px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User - {{$user->email}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
      </div>
      <form action="{{route('users.edit')}}" method="post">
        {{csrf_field()}}
      <div class="modal-body">
                <div class="form-group">
                    <label for="{{'edit-user-fname'.$user->id}}">First Name  <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="{{'edit-user-fname'.$user->id}}" name="first_name" value="{{$user->first_name}}" placeholder="First Name" required>
                    <input type="text" hidden name="user_id" value="{{$user->id}}"/>
                </div>
                <div class="form-group">
                    <label for="{{'edit-user-lname'.$user->id}}">Last Name  <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="{{'edit-user-lname'.$user->id}}" name="last_name" value="{{$user->last_name}}" placeholder="Last Name" required>
                </div>
                <div class="form-group">
                    <label for="{{'edit-user-email'.$user->id}}">Email  <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="{{'edit-user-email'.$user->id}}" name="email" value="{{$user->email}}" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="{{'edit-user-phone'.$user->id}}">Phone  <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="{{'edit-user-phone'.$user->id}}" name="phone" value="{{$user->phone}}" placeholder="Phone" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                </div>
                <div class="form-group">
                    <label for="{{'edit-user-dob'.$user->id}}">Date Of Birth  <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="{{'edit-user-dob'.$user->id}}" name="dob" value="{{$user->dob}}" placeholder="Date Of Birth" required>
                </div>
                <div class="form-group">
                    <label for="{{'edit-user-role'.$user->id}}">Role</label>
                    <select name="role" id="{{'edit-user-role'.$user->id}}" class="form-select">
                        @foreach ($roles as $role)
                            @if ($role->id == $user->role_id)
                                <option selected value="{{$role->id}}">{{$role->role_name}}</option>
                            @else
                                <option value="{{$role->id}}">{{$role->role_name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>

    </div>
  </div>
</div>
