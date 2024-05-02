<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="{{'#edit-rule'.$rule->id}}">
    <i class="fa fa-edit"></i> Edit
</button>

<!-- Modal -->
<div class="modal fade" id="{{'edit-rule'.$rule->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit rule - {{$rule->title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('rules.update',['id' => $rule->id])}}" method="post" id="{{'rule-form-'.$rule->id}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">


                    <div class="form-group">
                        <label for="">Title <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" name="title" value="{{$rule->title}}" id="title" required>
                    </div>

                    <div class="form-group">
                        <label for="">Description </label>
                        <textarea class="form-control ckeditor" name="description" id="{{'rule-desc-'.$rule->id}}">{{$rule->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="rules_document">Document</label>
                        <input type="file" name="pdf_src" class="form-control" >

                        @if($rule->pdf_src != null)
                        <a href="{{asset($rule->pdf_src)}}" target="_blank"><button class="btn btn-dark btn-sm mt-3" type="button">Preview Document</button></a>
                        @else
                        <p class="text-danger">No docucment uploaded</p>
                        @endif
                        <p style="font-weight:bold;font-size:0.75rem;"><b>Allowed file types - pdf , Maximum upload file size 5MB</b>
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="form-control" id="status">
                            <option {{$rule->status == 1 ? 'selected' : ''}} value="1">Active</option>
                            <option {{$rule->status == 0 ? 'selected' : ''}} value="0">In Active</option>


                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update rule</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>
