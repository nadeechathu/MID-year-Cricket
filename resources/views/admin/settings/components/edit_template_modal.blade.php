<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="{{'#edit-template'.$template->id}}">
<i class="fa fa-edit"></i> Edit
</button>

<!-- Modal -->
<div class="modal fade" id="{{'edit-template'.$template->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Template</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      <form action="{{route('settings.updateTemplate')}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="modal-body">
        <div class="form-group">
            <label for="section">Template Section</label>
            <select class="form-select" name="section" id="section">
                      @foreach ($siteSettings as $setting)
                          @if ($template->section == $setting->section)
                            <option selected value="{{$setting->section}}">{{$setting->section}}</option>
                          @else
                            <option value="{{$setting->section}}">{{$setting->section}}</option>
                          @endif

                      @endforeach
            </select>
            <input type="text" hidden name="template_id" value="{{$template->id}}"/>
        </div>
        <div class="form-group">
            <label for="template_number">Template Number</label>
            <input type="number" class="form-control" value="{{$template->template_number}}" name="template_number" id="template_number"/>
        </div>
        <div class="form-group">
{{--

            <input type="file" class="form-control" id="banner" name="image" /> --}}
            <label class="form-label" for="customFile">Banner Image Upload</label>
            <input type="file" class="form-control" name="image" id="image" onchange="loadFile(event)"/>
            <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types - jpeg,png,jpg,gif,svg</b></p>
            <img src="" id="imgshow" class="auto mt-3" alt="alt" style="display:none" >
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update Template</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script>
    var loadFile = function (event){
        var imgshow = document.getElementById('imgshow');
        imgshow.src =URL.createObjectURL(event.target.files[0]);
        imgshow.style= 'block';
    };
   </script>
