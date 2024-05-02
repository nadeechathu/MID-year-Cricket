@extends('frontend.layouts.app')
@include('frontend.common.seo_fields')
@section('content')

    <div class="container-fluid mt-lg-5 py-5 family-open-sans">
        <!-- row -->
        <div class="row mt-lg-5 pt-lg-5">
            <div class="col-12">
                <h1 class="contacts-heading">Club Contacts</h1>
            </div>
            <div class="col-12 mt-lg-0 mt-4">
                <form class="form-inline">
                    <div class="row d-flex justify-content-end">
                        <div class="col-lg-3 col-md-4">
                            <form action="{{ route('web.club.contacts') }}" method="get" id="filter-form">

                                <select
                                    class="form-select club-contact-select border-primary border-1 rounded-0 font-14  family-open-sans  fw-500"
                                    aria-label="Default select example" name="selected_title"
                                    onChange="document.getElementById('search-trigger').click()">
                                    <option value="">--- Competition Type ---</option>
                                    @foreach ($resourceTitles as $resourcesTitle)
                                        <option {{ $resourcesTitle == $selectedTitle ? 'selected' : '' }}
                                            value="{{ $resourcesTitle }}">
                                            {{ $resourcesTitle }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="col-lg-3 col-md-4 col-8 pe-0 mt-md-0 mt-3">
                            <input
                                class="form-control mr-sm-2 club-contact-search border-primary border-1 rounded-0 font-14  family-open-sans  fw-500"
                                type="search" name="searchKey" placeholder="Club Name" value="{{ $searchKey }}"
                                aria-label="Search">
                        </div>
                        <div class="col-lg-1 col-md-3 col-4 p-0 mt-md-0 mt-3">
                            <button class="btn btn-outline-success font-14 club-contact-btn" type="submit"
                                id="search-trigger">Search</button>
                        </div>
                        <div class="col-lg-2 col-md-3 col-12 p-0 mt-md-0 mt-3">
                            <a href="{{ route('web.club.contacts') }}"><button
                                    class="btn font-14 px-4 text-white family-open-sans  bg-orange border-rounded-left"
                                    type="button"> Reset Filters</button></a>

                        </div>

                    </div>
                </form>
            </div>
        </div>

        <!-- row -->
        <div class="row mt-5">

                    <div class="col-12 px-lg-5">

                        <div class="">
                            @if (sizeof($resources) > 0)

                                <div class="table-responsive ">

                                <table class="table table-striped table-hover ">

                                    <thead>
                                        <tr class="table-dark align-middle">

                                          <th class="fw-500 family-open-sans">Club Name </th>
                                          <th class="fw-500 family-open-sans">Competition Type</th>
                                          <th class="fw-500 family-open-sans">Number of Teams</th>
                                          <th class="fw-500 family-open-sans">Contact Person</th>
                                          <th class=" fw-500 family-open-sans">Contact No</th>
                                          <th class=" fw-500 family-open-sans">Email</th>
                                          <th class="fw-500 family-open-sans">Executive Name</th>
                                          <th class="fw-500 family-open-sans">Designation</th>
                                          <th class="fw-500 family-open-sans">Executive Contact No</th>


                                        </tr>
                                      </thead>
                                      <tbody>

                                        @foreach ($resources as $resource)
                                        <tr>

                                          <td>{{ $resource->club_name }}</td>
                                          <td>{{ $resource->competition_type }}</td>
                                          <td>{{ $resource->number_of_teams }}</td>
                                          <td>{{ $resource->contact_person }}</td>
                                          <td> {{ substr($resource->contact_phone,0,1) != 0 ? '0'.$resource->contact_phone : $resource->contact_phone}}</td>
                                          <td> {{ $resource->email }}</td>
                                          <td>{{ $resource->executive_name }}</td>
                                          <td>{{ $resource->designation }}</td>
                                          <td>{{ substr($resource->executive_phone,0,1) != 0 ? '0'.$resource->executive_phone : $resource->executive_phone}}</td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>

                            <div class="row">
                                <div class="col-12">
                                  {{ $resources->links() }}
                                </div>
                             </div>
                            @else
                        </div>

                    </div>

                <div class="text-center">
                    <h2 class="color-orange font-36 family-open-sans fw-bolder pb-2 text-cover"> No records found</h2>
                </div>
            @endif
        </div>
    </div>
    </div>

@endsection
