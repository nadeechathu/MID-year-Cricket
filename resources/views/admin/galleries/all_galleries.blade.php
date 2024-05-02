@extends('admin.layouts.app')

@section('content')
<div>
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-5">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <h3 class="m-0">Gallery Images</h3>

            </nav>
            <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="./index.html">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gallery Images</li>
                </ol>
            </div>
        </div>
    </div> <!-- / Breadcrumbs-->


    <section class="container-fluid">

        <div class="card">
            <div class="card-header">
                @include('admin.common.alerts')
                <div class="row">                   
                    <div class="col-md-2">
                        <!-- Add form modal -->
                        @if (Auth::user()->hasPermission('add_forms'))

                        @include('admin.galleries.components.new_gallery')

                        @endif
                        <form action="{{route('gallery.bulk.delete')}}" method="post" id="bulk-delete-form">
                        @csrf
                        <input type="text" name="bulk_delete_items" id="bulk_delete_items" value hidden>

                        </form>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger btn-sm text-white" type="button" id="bulk-delete-button" onClick="submitBulkDeletion()"><i class="fa fa-trash"></i> Delete Selected</button>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" id="category-selector" onChange="setSelectedCategory()">
                            <option value="">---select category---</option>
                            @foreach($gallery_categories as $galleryCategory)
                            <option value="{{$galleryCategory->id}}">{{$galleryCategory->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4" style="float:right;">
                        <form action="{{route('gallery.all')}}" method="get">
                            <div class="input-group">
                                <input type="search" class="form-control" name="searchKey" placeholder="Gallery Title"
                                    value="{{$searchKey}}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>

                                    <input type="text" name="selected_category" value="" hidden id="selected_category">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row overflow-auto">
                    <div class="col-md-12">
                        <!-- table -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th style="width:15%;">Image</th>
                                    {{-- <th>Title</th> --}}
                                    <th>Gallery Category</th>
                                    <th>Published Status</th>

                                    <th style="width:25%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($galleries as $gallery)
                                <tr>
                                    <th>
                                        <input type="checkbox" id="{{'bulk-checkbox'.$gallery->id}}" onChange="setBulkDeletion({{$gallery->id}})">
                                    </th>
                                    <td>  <img src="{{asset($gallery->src)}}"  class="w-100" alt="{{$gallery->title}}" /></td>
                                    {{-- <td>{{$gallery->alt_text}}</td> --}}
                                    <td>


                                        @if($gallery->category)
                                        {{$gallery->category->category_name}}
                                       @else
                                       -
                                       @endif
                                    </td>
                                    <td>
                                        @if($gallery->status == 1)
                                        <span class="badge bg-success">Published</span>
                                        @else
                                        <span class="badge bg-danger">Not Published</span>
                                        @endif
                                    </td>

                                    <td style="width:25%;">
                                        @include('admin.galleries.components.edit_gallery')
                                        @include('admin.galleries.components.delete_gallery')

                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="d-felx justify-content-center">

                    <div class="d-felx justify-content-center">

                        {{$galleries->links()}}

                         </div>

                </div>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->


@endsection



@section('scripts')
<script>
    let progressCount = 0;
    let totalProgressCount = 0;
    $("#addForm").on("hidden.bs.modal", function () {
        location.reload();
    });

    setImageschecked();

    function uploadMultipleFiles(id){

        let images = document.getElementById('image-uploader'+id).files;
        let categoryId = document.getElementById('category_id').value;
        let status = document.getElementById('status').value;
        document.getElementById('add-gallery-body').innerHTML = '';
        // document.getElementById('progress-div').innerHTML = '<progress class="w-100" id="upload-progress-bar" value="0" max="'+images.length+'"></progress>';
        document.getElementById('add-gallery-create').style.display = 'none';

        for(let i=0; i < images.length ; i++){

            uploadSingleFile(images[i],categoryId,status,i,images.length);
        }
        

    }

    function setSelectedCategory(){

        let categorySelectorVal = document.getElementById('category-selector').value;

        if(categorySelectorVal !== null){
            document.getElementById('selected_category').value = categorySelectorVal;
        }
    }

    function setBulkDeletion(id){

        let items = localStorage.getItem('items');

        let checkboxElm = document.getElementById('bulk-checkbox'+id);

        if(items === null){

            items = [];
        }else{
            items = items.split(',');
        }

        if(checkboxElm.checked){

            //add the item id to array if the checkbox is checked            
            if(!items.includes(''+id)){

                items.push(id);
            }

        }else{

            //remove item from the array if the checkbox is not checked

            const index = items.indexOf(''+id);
            
            items.splice(index,1);
        }

        localStorage.setItem('items',items);       

    }

    function submitBulkDeletion(){

        let bulkElm = document.getElementById('bulk_delete_items');
        let items = localStorage.getItem('items');
        
        if(items !== null){

            if(bulkElm !== null){

                bulkElm.value = items;
            }

            document.getElementById('bulk-delete-form').submit();

        }else{

            alert("please select items");
        }

      

    }

    function setImageschecked(){

        let items = localStorage.getItem('items');

        if(items === null){

            items = [];
            document.getElementById('bulk-delete-button').setAttribute('disabled','disabled');

        }else{

            items = items.split(',');
            document.getElementById('bulk-delete-button').removeAttribute('disabled');
        }

        console.log(items);

        for(let i=0;i<items.length;i++){
                
            if(items[i] !== ''){

                let checkboxElm = document.getElementById('bulk-checkbox'+items[i]);

                if(checkboxElm !== null){
                    
                    checkboxElm.checked = true;
                }
                
            }
        }
    }

    function uploadSingleFile(image, categoryId, status, count, total){
        progressCount = progressCount + 1;
        let htmlDiv = document.getElementById('add-gallery-body');

        htmlDiv.innerHTML = htmlDiv.innerHTML + '<h5 class="success-text" id="upload-img'+count+'">'+image.name+' - uploading in progress <img class="progress-image-width" src="{{asset("images/processing.gif")}}" class="w-25"></h5>'

        let formData = new FormData();

        formData.append('image',image);
        formData.append('status',status);
        formData.append('category_id',categoryId);


        if(image){

                var file_size = image.size;
                let uploadDiv = document.getElementById('upload-img'+count);

                if(file_size > 11000000){
                    uploadDiv.classList.add('text-danger');
                    uploadDiv.innerHTML = image.name + ' - Maximum allowed image size is 10MB - '+file_size;

                }else{

                        $.ajax({
                        url: "{{ route('gallery.create') }}",
                        method: "POST",
                        processData: false,
                        contentType: false,
                        // async: false,
                        headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                        data: formData,
                        success: function(response) {
                            // Handle the data received in the response
                           

                            // document.getElementById('progress-div').innerHTML = '<progress class="w-100" id="upload-progress-bar" value="'+progressCount+'" max="'+total+'"></progress>';
                            let uploadDiv = document.getElementById('upload-img'+count);
                            
                            if(response.status){
                                
                                uploadDiv.classList.add('text-success');
                                uploadDiv.innerHTML = image.name + ' - uploaded successfully';

                            }else{

                                uploadDiv.classList.add('text-danger');
                                uploadDiv.innerHTML = image.name + ' - uploading failed';

                            }
                            
                            
                        },
                        error: function(xhr, status, error) {
                            // Handle errors, if any
                        
                        }

                    });


                            
                }

         }


       


    }
</script>
@endsection
