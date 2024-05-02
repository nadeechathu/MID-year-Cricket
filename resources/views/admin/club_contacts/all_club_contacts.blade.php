@extends('admin.layouts.app')

@section('content')
<div>
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
          <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
            <h3 class="m-0">All Club Contacts</h3>

          </nav>
          <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
          <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="./index.html">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">All Club Contacts</li>
              </ol>
          </div>
          </div>
        </div>        <!-- / Breadcrumbs-->


        <section class="container-fluid">

        <div class="card">
              <div class="card-header">
                @include('admin.common.alerts')
               <div class="row">
               <div class="col-md-3">
                @if (Auth::user()->hasPermission('add_contacts'))
                 <a href="{{route('club_contacts.new')}}"><button type="button" class="btn btn-primary btn-sm"><i class="ri-add-circle-line align-bottom"></i> New</button></a>

                 @endif
                 <a href="{{route('club_contacts.export')}}"><button type="button" class="btn btn-danger text-white btn-sm"><i class="fa fa-download"></i> Export Sample</button></a>
                 
                </div>
                @if (Auth::user()->hasPermission('add_contacts'))
                <div class="col-md-4">
                  <form action="{{route('club_contacts.import')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="form-control input-sm" name="file" required>
                    <button type="submit" hidden id="contact-submit"></button>
                  </form>
                </div>
                <div class="col-md-1">
                <button class="btn btn-success btn-sm text-white my-1" onClick="document.getElementById('contact-submit').click();" type="button">Import</button>
                </div>
                @endif
               <div class="col-md-4" style="float:right;">
                <form action="{{route('club_contacts.all')}}" method="get">
                        <div class="input-group">
                            <input type="search" class="form-control" name="searchKey" placeholder="Club Contacts Title" value="{{$searchKey}}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


              </div>
               </div>
              <div class="card-body">
              <div class="row overflow-auto">
                  <div class="col-md-12">
                  <table class="table table-bordered">
                  <thead>
                    <tr>
                        {{-- `address`, `phone`, `club_name`, `email`, `website_url`, --}}
                      <th>Club Name</th>
                      <th>Competition Type</th>
                      <th>Number of teams</th>
                      <th>Contact person</th>
                      <th>Designation</th>
                      <th>Published Status</th>
                      <th style="width:25%;">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($club_contacts as $club_contact)
                       <tr>
                        <td>{{$club_contact->club_name}}</td>
                        <td>{{$club_contact->competition_type}}</td>
                        <td>{{$club_contact->number_of_teams}}</td>
                        <td>{{$club_contact->contact_person}}</td>
                        <td>{{$club_contact->designation}}</td>
                           <td>
                            @if($club_contact->status == 1)
                            <span class="badge bg-success">Published</span>
                            @else
                            <span class="badge bg-danger">Not Published</span>
                            @endif
                           </td>

                           <td>
                            @if (Auth::user()->hasPermission('view_contacts'))

                            @include('admin.club_contacts.components.view_club_contacts')

                          @endif
                            @if (Auth::user()->hasPermission('edit_contacts'))


                           
                            <a  href="{{ route('club_contacts.updateUI',$club_contact->id) }}"> <button class="btn btn-primary btn-sm" type="button"> <i class="fa fa-edit"></i> Edit</button></a>

                          @endif

                                @if (Auth::user()->hasPermission('remove_contacts'))

                                  @include('admin.club_contacts.components.club_contacts_delete')

                                @endif



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

             {{$club_contacts->links()}}

              </div>
                  </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </section>
  </div>

@endsection
