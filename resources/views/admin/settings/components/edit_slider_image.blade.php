<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="{{'#add-slider-modal'.$sliderImage->id}}">
<i class="fa fa-edit"></i> Edit
</button>

<!-- Modal -->
<div class="modal fade" id="{{'add-slider-modal'.$sliderImage->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Slider Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
      </div>
      <form action="{{route('settings.headerUpdate')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
      <div class="modal-body">
          <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                    <label for="tag_name">Slider Image Name</label>
                    {{-- <input type="file" class="form-control" name="image" id="image"/> --}}

                    <input type="file" class="form-control" name="image" id="image" onchange="loadFile(event)"/>
                    <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types - jpeg,png,jpg,gif,svg</b></p>
                    <img src="" id="imgshow" class="auto mt-3" alt="alt" style="display:none" >

                    {{-- <input type="text" hidden name="image_id" id="image_id" value="{{$sliderImage->id}}"/> --}}

                </div>
              </div>
              <div class="col-md-4">
                    Current Image <br/>
                    <img src="{{$sliderImage->src}}" style="width:100%; margin-bottom:20px;" alt="{{$sliderImage->alt_text}}">
              </div>
          </div>


        <div class="form-group">
            <label for="alt_text">Alt Text</label>
            <input type="text" class="form-control" name="alt_text" id="alt_text" value="{{$sliderImage->alt_text}}" required>
        </div>
        <div class="form-group">
            <label for="heading">Heading (Optional)</label>
            <input type="text" class="form-control" name="heading" id="heading" value="{{$sliderImage->heading}}">
        </div>
        <div class="form-group">
            <label for="caption">Caption (Optional)</label>
            <input type="text" class="form-control" name="caption" id="caption" value="{{$sliderImage->caption}}">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-select" name="status" id="status">
                @if ($sliderImage->status == 0)
                    <option selected value="0">No Show</option>
                    <option value="1">Show</option>
                @else
                    <option value="0">No Show</option>
                    <option selected value="1">Show</option>
                @endif

            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update Slider Image</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
