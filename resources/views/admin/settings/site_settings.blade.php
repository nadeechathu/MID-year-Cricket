@extends('admin.layouts.app')
@section('content')
<div>
   <!-- Breadcrumbs-->
   <div class="bg-white border-bottom py-3 mb-5">
      <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
         <nav class="mb-0" aria-label="breadcrumb">
            <h3 class="m-0">Site Settings</h3>
         </nav>
         <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
            <ol class="breadcrumb m-0">
               <li class="breadcrumb-item"><a href="./index.html">Admin</a></li>
               <li class="breadcrumb-item"><a href="./index.html">Settings</a></li>
               <li class="breadcrumb-item active" aria-current="page">Site Settings</li>
            </ol>
         </div>
      </div>
   </div>
   <!-- / Breadcrumbs-->
   <section class="container-fluid">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="mb-12">
                  @include('admin.common.alerts')
               </div>
            </div>
         </div>
         <!-- /.card-footer-->
         <div class="card-body">
            <div class="accordion" id="accordionExample">

            <div class="accordion-item">
               <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                     data-bs-target="#collapseTwo" aria-expanded="false"
                     aria-controls="collapseTwo">
                  <i class="fas fa-lock"></i> &nbsp;Basic Site Parameters
                  </button>
               </h2>
               <div id="collapseTwo" class="accordion-collapse collapse show"
                  aria-labelledby="headingTwo" data-bs-parent="#accordionExample1">
                  <div class="accordion-body">
                     <form action="{{route('settings.updateSiteParams')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="form-label" for="site_name">Site Name</label>
                                 <input type="text"
                                    name="site_name"
                                    id="site_name"
                                    class="form-control"
                                    value="{{$siteName->description}}"
                                    placeholder="Site Name" required>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="form-label" for="site_description">Site Name</label>
                                 <input type="text"
                                    name="site_description"
                                    id="site_description"
                                    class="form-control"
                                    value="{{$siteDescription->description}}"
                                    placeholder="Site Description" required>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-10">
                              <div class="form-group">
                                 <label class="form-label" for="site_logo">Site Logo</label>
                                 <input type="file"
                                    name="site_logo"
                                    id="site_logo"
                                    class="form-control">
                              </div>
                           </div>
                           <div class="col-md-2">
                              Current Logo<br/>
                              @if($siteLogo->description != null)
                              <img src="{{asset($siteLogo->description)}}" style="width:100px;" alt="Site Logo"/>
                              @else
                              No logo uploaded
                              @endif
                           </div>
                        </div>
                        <div class="row">
                           <div >
                              <button class="btn btn-danger text-white" type="submit">Save Changes</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <br/>
            <div class="accordion-item">
               <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                     data-bs-target="#collapseThree" aria-expanded="false"
                     aria-controls="collapseThree">
                  <i class="fas fa-users"></i> &nbsp;Social Links
                  </button>
               </h2>
               <div id="collapseThree" class="accordion-collapse collapse show"
                  aria-labelledby="headingThree" data-bs-parent="#accordionExample1">
                  <div class="accordion-body">
                     <form action="{{route('settings.updateSocialLinks')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="form-label" for="facebook_link">Facebook Link</label>
                                 <input type="text"
                                    name="facebook_link"
                                    id="facebook_link"
                                    class="form-control"
                                    value="{{$facebook_link->description}}"
                                    placeholder="Facebook Link">
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="form-label" for="instagram_link">Pay HQ Link</label>
                                 <input type="text"
                                    name="instagram_link"
                                    id="instagram_link"
                                    class="form-control"
                                    value="{{$instagram_link->description}}"
                                    placeholder="Pay HQ Link">
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="form-label" for="twitter_link">Twitter Link</label>
                                 <input type="text"
                                    name="twitter_link"
                                    id="twitter_link"
                                    class="form-control"
                                    value="{{$twitter_link->description}}"
                                    placeholder="Twitter Link">
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="form-label" for="youtube_link">Youtube Link</label>
                                 <input type="text"
                                    name="youtube_link"
                                    id="youtube_link"
                                    class="form-control"
                                    value="{{$youtube_link->description}}"
                                    placeholder="Youtube Link">
                              </div>
                           </div>
                        </div>


                        <div>
                           <div>
                              <button class="btn btn-danger text-white" type="submit">Save Changes</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
</div>
<!-- /.card -->
</section>
</div>
@endsection
<!-- jQuery -->
<script src="{{url('/plugins/jquery/jquery.min.js')}}"></script>
<script>
   $( document ).ready(function() {


   $.ajax({
   method : "get",
   url: "/admin/settings/site-settings/active",

   success: function(result){


   console.log('active data ===> ',result.templates);
    $.each(result.templates, (index, value) => {
       $('#preview_'+value.section).html('');
       $('#preview_'+value.section).append('<img src="'+value.template_image+'" alt="alt" class="w-100">');
    });


   }});
   });

   function getTemplateImage(Id){

       let templateNumber = document.getElementById(Id).value;

       $.ajax({
           method : "post",
           url: "/admin/settings/site-settings/get-template",
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data : {
               'section' : Id,
               'templateNumber' : templateNumber
           },
           success: function(result){

           console.log('data ===> ',result.template);
           $(result.template).each(function(index, value) {
               // alert(value.id);
               $('#preview_'+Id).html('');
                $('#preview_'+Id).append('<img src="'+value.template_image+'" alt="alt" class="w-100">');
           });

       }});
   }

   function getAllActiveTemplates(){

   }
</script>
