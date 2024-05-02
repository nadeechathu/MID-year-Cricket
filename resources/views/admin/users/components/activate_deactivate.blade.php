@if ($user->status == 1)
    
    <button type="button" class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="{{'#deactivate-modal-'.$user->id}}">
    <i class="fa fa-power-off"></i> Deactivate
    </button>

    
    <div class="modal fade" id="{{'deactivate-modal-'.$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirm User Deactivation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure you want to deactivate this user ?
        </div>
        <div class="modal-footer">
        <a href="{{url('admin/users/status/'.$user->id)}}"><button type="button" class="btn btn-primary">Yes</button></a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>            
        </div>
        </div>
    </div>
    </div>
@else

    <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="{{'#activate-modal-'.$user->id}}">
    <i class="fa fa-power-off"></i> Activate
    </button>

    
    <div class="modal fade" id="{{'activate-modal-'.$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirm User Activation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure you want to activate this user ?
        </div>
        <div class="modal-footer">
            <a href="{{url('admin/users/status/'.$user->id)}}"><button type="button" class="btn btn-primary">Yes</button></a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>            
        </div>
        </div>
    </div>
    </div>
    
@endif