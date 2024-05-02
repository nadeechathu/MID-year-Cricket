<style>
    .card{
        width:unset !important;
    }
</style>
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="{{'#change-permissions-modal-'.$user->id}}">
  <i class="fa fa-user-lock"></i> Change Permissions
</button>


<div class="modal fade" id="{{'change-permissions-modal-'.$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:1000px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$user->first_name}} {{$user->last_name}} User's Permissions</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
      </div>
      <form action="{{route('permissions.edit')}}" method="post">
      <div class="modal-body">


          {{csrf_field()}}
                <input type="text" hidden name="user_id" value="{{$user->id}}"/>

                <div class="row">

                @foreach ($permissions as $type => $permissions)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ucfirst($type)}}</h5><hr/>

                            @foreach ($permissions as $permission)


                                <div class="permission-div">



                                    @if (in_array($permission['id'],$user->assigned_permissions))


                          <input type="checkbox" name="permissions[]" value="{{$permission['id']}}" checked/>

                                        @foreach (explode('_',$permission['name']) as $name)

                                            {{ ucfirst($name).' '}}
                                        @endforeach




                                    @else

                                        <input type="checkbox" name="permissions[]" value="{{$permission['id']}}"/>
                                        @foreach (explode('_',$permission['name']) as $name)
                                        {{ ucfirst($name).' '}}
                                         @endforeach

                                    @endif
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                @endforeach





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
