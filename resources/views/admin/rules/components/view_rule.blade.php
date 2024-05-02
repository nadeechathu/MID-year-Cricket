<!-- Button trigger modal -->
<button type="button" class="btn btn-warning  btn-sm text-white" data-bs-toggle="modal"
    data-bs-target="{{ '#view-rule' . $rule->id }}">
    <i class="fa fa-eye"></i> View
</button>

<!-- Modal -->
<div class="modal fade" id="{{ 'view-rule' . $rule->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom">
                <h5 class="modal-title pe-3" id="exampleModalLabel">Edit rule - {{ $rule->title }}</h5>
                @if ($rule->status == 1)
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
                            <div class="col-3">
                                <label for="" class=" fw-bolder">Title :-</label>
                            </div>
                            <div class="col-9">
                                <p>{{ $rule->title }}</p>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-3">
                                <label for="" class=" fw-bolder">Description :-</label>
                            </div>
                            <div class="col-9">
                               {!! $rule->description !!}
                            </div>

                        </div>

                    </div>

                </div>


            </div>
            <div class="modal-footer">

            </div>


        </div>
    </div>
</div>
