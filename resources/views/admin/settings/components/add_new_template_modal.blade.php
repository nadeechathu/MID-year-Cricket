<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#new-template">
<i class="ri-add-circle-line align-bottom"></i> Add New
</button>

<!-- Modal -->
<div class="modal fade" id="new-template" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">


        <h5 class="modal-title" id="exampleModalLabel">New Template</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      <form action="{{route('settings.addTemplate')}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="modal-body">
        <div class="form-group">
            <label for="section">Template Section</label>
            <select class="form-select" name="section" id="section">
                      @foreach ($siteSettings as $setting)
                          <option value="{{$setting->section}}">{{$setting->section}}</option>
                      @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="template_number">Template Number</label>
            <input type="number" class="form-control" name="template_number" id="template_number"/>
        </div>
        <div class="form-group">
{{--
            <label class="form-label" for="customFile">Banner Image Upload</label>
            <input type="file" class="form-control" id="banner" name="image" /> --}}
            <label class="form-label" for="customFile">Banner Image Upload</label>
            <input type="file" id="image" name="image" class="form-control" onchange="validateImage(event)">
            <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types - jpeg,png,jpg,gif,svg</b></p>
            <img src="" id="img-result-output" class="w-50 mt-3"  alt="alt" style="display:none" >
            <div id="img-validation-result" class="text-danger"></div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add Template</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>


</script>
