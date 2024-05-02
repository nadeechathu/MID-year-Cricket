<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#new-mail-config">
<i class="ri-add-circle-line align-bottom"></i> Add New
</button>

<!-- Modal -->
<div class="modal fade" id="new-mail-config" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:700px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Email Configuration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        
      </div>
      <form action="{{route('settings.addEmailConfig')}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="modal-body">
          <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="mailer">Mailer</label>
                    <input type="text" class="form-control" name="mailer" id="mailer" required/>

                </div>
                <div class="form-group">
                    <label for="host">Host</label>
                    <input type="text" class="form-control" name="host" id="host" required/>

                </div>
                <div class="form-group">
                    <label for="port">Port</label>
                    <input type="text" class="form-control" name="port" id="port" required/>

                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" required/>

                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" id="password" required/>

                </div>
                <div class="form-group">
                    <label for="encryption">Encryption</label>
                    <input type="text" class="form-control" name="encryption" id="encryption" required/>

                </div>
                <div class="form-group">
                    <label for="from_address">From Address</label>
                    <input type="text" class="form-control" name="from_address" id="from_address" required/>

                </div>
                <div class="form-group">
                    <label for="from_name">From Name</label>
                    <input type="text" class="form-control" name="from_name" id="from_name" required/>

                </div>
                
              </div>
          </div>
       
       
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add Configuration</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>