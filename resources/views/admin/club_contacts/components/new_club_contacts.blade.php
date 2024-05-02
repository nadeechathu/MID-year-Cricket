@extends('admin.layouts.app')


@section('content')
    <div>
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
            <div
                class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
                <nav class="mb-0" aria-label="breadcrumb">
                    <h3 class="m-0">New Club Contact</h3>

                </nav>
                <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="./index.html">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">New Club Contact</li>
                    </ol>
                </div>
            </div>
        </div> <!-- / Breadcrumbs-->


        <section class="container-fluid">

            <div class="card">
                <div class="row">
                    <div class="mb-12">
                        @include('admin.common.alerts')
                    </div>

                </div>
                <div class="card-body">
                <form action="{{ route('club_contacts.create') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="club_name">Club Name <span class="text-danger">*</span></label>
                        <input type="text" name="club_name" class="form-control @error('club_name') is-invalid @enderror"
                            value="{{ old('club_name') }}" placeholder="Club Name" id="club_name" required />


                        @error('club_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span> </label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" placeholder="Email" id="email" required />


                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="competition_type">Competition Type <span class="text-danger">*</span> </label>
                        <input type="text" name="competition_type" class="form-control @error('competition_type') is-invalid @enderror"
                            value="{{ old('competition_type') }}" placeholder="Competition Type" id="competition_type" required />


                        @error('competition_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="number_of_teams">Number of teams <span class="text-danger">*</span> </label>
                        <input type="text" name="number_of_teams" class="form-control @error('number_of_teams') is-invalid @enderror"
                            value="{{ old('number_of_teams') }}" placeholder="Number of teams" id="number_of_teams"     oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required />


                        @error('number_of_teams')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="contact_person">Contact Person <span class="text-danger">*</span> </label>
                        <input type="text" name="contact_person" class="form-control @error('contact_person') is-invalid @enderror"
                            value="{{ old('contact_person') }}" placeholder="Contact Person" id="contact_person" required />


                        @error('contact_person')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

              
                    <div class="form-group">
                        <label for="contact_phone">Contact Phone <span class="text-danger">*</span> </label>
                        <input type="text" name="contact_phone" class="form-control @error('contact_phone') is-invalid @enderror"
                            value="{{ old('contact_phone') }}" placeholder="Contact Phone" id="contact_phone"     oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required />


                        @error('contact_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>


                    <div class="form-group">
                        <label for="executive_name">Executive Name <span class="text-danger">*</span> </label>
                        <input type="text" name="executive_name" class="form-control @error('executive_name') is-invalid @enderror"
                            value="{{ old('executive_name') }}" placeholder="Executive Name" id="executive_name" required />


                        @error('executive_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="designation">Designation <span class="text-danger">*</span> </label>
                        <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror"
                            value="{{ old('designation') }}" placeholder="Designation" id="designation" required />


                        @error('designation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="executive_phone">Executive phone <span class="text-danger">*</span> </label>
                        <input type="text" name="executive_phone" class="form-control @error('executive_phone') is-invalid @enderror"
                            value="{{ old('executive_phone') }}" placeholder="Executive phone" id="executive_phone"     oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required />


                        @error('executive_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>


                    <div class="form-group">
                        <label for="status">Published Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="0">Unpublished</option>
                            <option value="1">Published</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create Club Contact</button>
                </div>
            </div>
            <!-- /.card-body -->

            </form>
            <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    </section>
    </div>
@endsection
