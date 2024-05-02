<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="{{'#edit-sponsor'.$sponsor->id}}">
    <i class="fa fa-edit"></i> Edit
</button>

<!-- Modal -->
<div class="modal fade" id="{{'edit-sponsor'.$sponsor->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Sponsor - {{$sponsor->title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('sponsors.update',['id' => $sponsor->id])}}" method="post" id="{{'sponsor-form-'.$sponsor->id}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">


                    <div class="form-group">
                        <label for="">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" value="{{$sponsor->title}}" id="title" required>
                    </div>
                    {{-- <div class="form-group">


                        <div class="row">
                            <div class="col-6">
                                <label for="">Sponsor Logo image</label>
                                <input type="file" class="form-control" name="src" id="{{'badge-image-'.$sponsor->src}}" >
                                <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types -
                                    jpeg,png,jpg,gif,svg / Image size - width 375 pixels and height 235 pixels  , Maximum upload file size 2MB</b></p>
                            </div>
                            <div class="col-6">
                                <h6>Current Sponsor Logo</h6><br>
                                <img src="{{asset($sponsor->src)}}"  alt="">
                            </div>
                        </div>
                    </div> --}}


                    <div class="form-group">
                        <label for="image">Sponsor Logo image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="src" id="{{ 'image-uploader' . $sponsor->id }}"
                        onchange="validateImageSizes('{{$sponsor->id}}',event)" />
                            <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types -
                                jpeg,png,jpg,gif,svg / Maximum upload file size 2MB</b></p>
                        <div id="{{ 'img-validation-result' . $sponsor->id }}" class="text-danger"></div>
                        <div class="row">
                            <div class="col-6">
                                <p id="{{'image-div'.$sponsor->id}}"></p>
                                @if ($sponsor->src != null)
                                    <img id="{{ 'image' . $sponsor->id }}" src="{{ asset($sponsor->src) }}" style="width:100%" />
                                @else
                                    No image uploaded
                                @endif
                            </div>


                            <div id="errorMessage" class="text-danger"></div>
                        </div>


                    </div>



                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="form-select" id="status">
                            <option {{$sponsor->status == 1 ? 'selected' : ''}} value="1">Published</option>
                            <option {{$sponsor->status == 0 ? 'selected' : ''}} value="0">Unpublished</option>


                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Sponsor</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>
