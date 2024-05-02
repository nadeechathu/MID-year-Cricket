<!-- Button trigger modal -->
<button type="button" class="btn btn-warning  btn-sm text-white " data-bs-toggle="modal"
    data-bs-target="{{ '#edit-resource' . $club_contact->id }}">
    <i class="fa fa-eye"></i> View
</button>

<!-- Modal -->
<div class="modal fade" id="{{ 'edit-resource' . $club_contact->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom">
                <h5 class="modal-title pe-3" id="exampleModalLabel">Edit Resource - {{ $club_contact->title }}</h5>
                @if ($club_contact->status == 1)
                    <span class="badge bg-success">Published</span>
                @else
                    <span class="badge bg-danger">Not Published</span>
                @endif
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           
          
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <label for="" class=" fw-bolder">Club Name :-</label>
                                </div>
                                <div class="col-8">
                                    <p>{{ $club_contact->club_name }}</p>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-4">
                                    <label for="" class=" fw-bolder">Competition Type :-</label>
                                </div>
                                <div class="col-8">
                                    <p>{{ $club_contact->competition_type }}</p>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-4">
                                    <label for="" class=" fw-bolder">Number of teams :-</label>
                                </div>
                                <div class="col-8">
                                    <p>{{ $club_contact->number_of_teams }}</p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="" class=" fw-bolder">Contact Person :-</label>
                                </div>
                                <div class="col-8">
                                    <p>{{ $club_contact->contact_person }}</p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="" class=" fw-bolder">Contact Phone :-</label>
                                </div>
                                <div class="col-8">
                                    <p>{{ $club_contact->contact_phone }}</p>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-4">
                                    <label for="" class=" fw-bolder">Executive Name :-</label>
                                </div>
                                <div class="col-8">
                                    <p>{{ $club_contact->executive_name }}</p>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-4">
                                    <label for="" class=" fw-bolder">Designation :-</label>
                                </div>
                                <div class="col-8">
                                    <p>{{ $club_contact->designation }}</p>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label for="" class=" fw-bolder">Executive phone :-</label>
                                </div>
                                <div class="col-8">
                                    <p>{{ $club_contact->executive_phone }}</p>
                                </div>

                            </div>















                        </div>

                    </div>






                </div>

        </div>
    </div>
</div>
