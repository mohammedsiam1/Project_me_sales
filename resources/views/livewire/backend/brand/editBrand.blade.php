<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit your Brand</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<form wire:submit.prevent="UpdateBrand">
      <div class="modal-body">
      are you edit Brand?
      </div>
      <div class="modal-body">
        <label>Name</label>
        <input class="form-control" type="text" wire:model="name">
        @error('name')<small class="text-danger">{{$message}}</small>@enderror
      </div>
      <div class="modal-body">
      <label>Slug</label>
        <input class="form-control" type="text" wire:model="slug">
        @error('slug')<small class="text-danger">{{$message}}</small>@enderror

      </div>
      <div class="modal-body">
      <label>Status</label>
        <input  type="checkbox" wire:model="status" > <small class="text-danger">Checked: Visible | Unchecked: disable</small>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning">edit Brand </button>
      </div>
</form>
    </div>
  </div>
</div>  