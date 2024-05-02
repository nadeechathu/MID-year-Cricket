@extends('admin.layouts.app')

@section('content')
    


<div> 
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
          <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
            <h3 class="m-0">Email Settings</h3>
             
          </nav>
          <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
          <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="./index.html">Admin</a></li>
                  <li class="breadcrumb-item"><a href="./index.html">Settings</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Email Settings</li>
              </ol>
          </div>
          </div>
        </div>        <!-- / Breadcrumbs-->

        
        <section class="container-fluid">
          
        <div class="card">
              <div class="card-header">
                @include('admin.common.alerts')
               <div class="row">
                 <div class="col-md-6">
                 @include('admin.settings.components.add_new_email_setting_modal')
                 </div>
              
                
              </div>
               </div>
              <div class="card-body">
              <div class="row overflow-auto">
                  <div class="col-md-12">
                  <table class="table table-bordered">
                  <thead>
                    <tr>                     
                      <th>Mailer</th>
                      <th>Host</th>
                      <th>Port</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Encryption</th>
                      <th>From Address</th>
                      <th>From Name</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($emailSettings as $emailSetting)
                       <tr>
                           <td>{{$emailSetting->mailer}}</td>
                           <td>{{$emailSetting->host}}</td> 
                           <td>{{$emailSetting->port}}</td>
                           <td>{{$emailSetting->username}}</td>
                           <td>{{$emailSetting->password}}</td>
                           <td>{{$emailSetting->encryption}}</td>
                           <td>{{$emailSetting->from_address}}</td>
                           <td>{{$emailSetting->from_name}}</td>
                           <td>
                               
                               @if ($emailSetting->status == 0)
                                <span class="badge bg-danger">Inactive</span>
                               @else
                                <span class="badge bg-success">Active</span>
                               @endif
                            </td>                          
                           <td>
                            
                           @include('admin.settings.components.edit_email_setting_modal')

                           @include('admin.settings.components.remove_email_setting_modal')
                               
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

             {{$emailSettings->links()}}

              </div>
                  </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </section>
  </div>

@endsection
