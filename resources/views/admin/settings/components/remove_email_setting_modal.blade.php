<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="{{'#remove-email'.$emailSetting->id}}">
<i class="fa fa-trash"></i> Delete
</button>

<!-- Modal -->
<div class="modal fade" id="{{'remove-email'.$emailSetting->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove Configuration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        
      </div>
      <form action="{{route('settings.removeEmail')}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="modal-body">
       Are you sure you want to remove this email configuration from the system ? <br/>
       <p class="text-danger">This action cannot be undone.</p>
      <input type="text" hidden name="email_id" value="{{$emailSetting->id}}"/>
       
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Yes</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>