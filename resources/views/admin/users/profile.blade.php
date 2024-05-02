@extends('admin.layouts.app')

@section('content')    


<div> 
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
          <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
            <h3 class="m-0">Update Profile</h3>
             
          </nav>
          <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
          <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="./index.html">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Profile</li>
              </ol>
          </div>
          </div>
        </div>        <!-- / Breadcrumbs-->

        
        <section class="container-fluid">
          
        <div class="card">
              <div class="card-header">
                @include('admin.common.alerts')
               </div>
               <form action="{{route('users.edit')}}" method="post" enctype="multipart/form-data">
                   {{@csrf_field()}}
              <div class="card-body">
              <!-- profile content -->
              <div class="row">
                  <div class="col-md-4 text-center">
                    <img class="rounded-circle" style="width:8.5rem;margin-bottom:20px;" src="{{$user->user_image != null ? asset($user->user_image) : asset('images/no_user_image.png')}}" alt="Dev">

                    <div class="mb-3">
                        <label for="image">User Image</label><br/><br/>
                        <input type="file" class="form-control" name="image" id="image"/>
                        <p style="font-weight:bold;font-size:0.75rem;"><b>Supported image types - jpeg,png,jpg,gif,svg</b></p>
                    </div>
                  </div>
                  <div class="col-md-8">
                      <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="{{'edit-user-fname'.$user->id}}">First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="{{'edit-user-fname'.$user->id}}" name="first_name" value="{{$user->first_name}}" placeholder="First Name" required>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <input type="text" hidden name="user_id" value="{{$user->id}}"/>
                                <input type="text" hidden name="role" value="{{$user->role_id}}"/>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="{{'edit-user-lname'.$user->id}}">Last Name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="{{'edit-user-lname'.$user->id}}" name="last_name" value="{{$user->last_name}}" placeholder="Last Name" required>
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                          </div>
                      </div>
                   
                    
                    <div class="form-group">
                        <label for="{{'edit-user-email'.$user->id}}">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="{{'edit-user-email'.$user->id}}" name="email" value="{{$user->email}}" placeholder="Email" required>
                        @error('email')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="{{'edit-user-phone'.$user->id}}">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="{{'edit-user-phone'.$user->id}}" name="phone" value="{{$user->phone}}" placeholder="Phone" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="{{'edit-user-dob'.$user->id}}">Date Of Birth</label>
                                <input type="date" class="form-control @error('dob') is-invalid @enderror" id="{{'edit-user-dob'.$user->id}}" name="dob" value="{{$user->dob}}" placeholder="Date Of Birth" required>
                                @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                   
                   
                  </div>
              </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-dark">Update Profile</button>
              </div>
                </form>
              <!-- /.card-footer-->

                    <div class="card-body">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            <i class="fas fa-lock"></i> &nbsp;Change Account Password
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">

                                        <form action="{{route('users.changePassword')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="password">Password</label>
                                                    <input type="password"
                                                                name="password"
                                                                id="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                placeholder="Password">

                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                                                    <input type="password"
                                                                name="password_confirmation"
                                                                id="password_confirmation"
                                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                                placeholder="Confirm Password">

                                                                @error('password_confirmation')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-right">
                                            <button class="btn btn-danger btn-sm text-white" style="margin-top:25%;" type="submit">Change Password</button>
                                            <input type="text" hidden name="user_id" value="{{$user->id}}"/>
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
