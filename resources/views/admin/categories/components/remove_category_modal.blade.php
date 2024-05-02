<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="{{'#remove-category-modal-'.$category->id}}">
  <i class="fa fa-trash"></i> Delete
</button>

<!-- Modal -->
<div class="modal fade" id="{{'remove-category-modal-'.$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to remove this category from the system ? 
      </div>
      <div class="modal-footer">
          
        <a href="{{route('categories.remove',$category->id)}}"><button type="button" class="btn btn-primary">Yes</button></a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>