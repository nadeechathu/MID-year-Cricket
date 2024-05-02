<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="{{'#add-slider-modal'}}">
<i class="ri-add-circle-line align-bottom"></i> Add New
</button>

<!-- Modal -->
<div class="modal fade" id="{{'add-slider-modal'}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Slider Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
      </div>
      <form action="{{route('settings.headerCreate')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
      <div class="modal-body">
        <div class="form-group">
            <label for="tag_name">Slider Image Name</label>

            <input type="file" class="form-control" name="image" id="image" onchange="loadFile(event)"/>
            <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types - jpeg,png,jpg,gif,svg</b></p>
            <img src="" id="imgshow" class="auto mt-3" alt="alt" style="display:none" >

        </div>

        <div class="form-group">
            <label for="alt_text">Alt Text</label>
            <input type="text" class="form-control" name="alt_text" id="alt_text" required>
        </div>
        <div class="form-group">
            <label for="heading">Heading (Optional)</label>
            <input type="text" class="form-control" name="heading" id="heading">
        </div>
        <div class="form-group">
            <label for="caption">Caption (Optional)</label>
            <input type="text" class="form-control" name="caption" id="caption">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-select" name="status" id="status">
                <option value="0">No Show</option>
                <option value="1">Show</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Create New Slider Image</button>
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
