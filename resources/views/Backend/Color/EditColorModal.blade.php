<!-- Modal -->
<div  class="modal fade" id="EditColorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Color</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<form method="post" action="{{route('colors.store')}}">
  @csrf
      <div class="modal-body">
       Edit Color?
      </div>
      <div class="modal-body">
        <label>Name</label>
        <input class="form-control" type="text" name="name" Value="{{old('name')}}">
        @error('name')<small class="text-danger">{{$message}}</small>@enderror
      </div>  
      <div class="modal-body">
      <label>Code</label>
        <input class="form-control" type="text" name="code" Value="{{old('code')}}">
        @error('code')<small class="text-danger">{{$message}}</small>@enderror

      </div>
      <div class="modal-body">
      <label>Status</label>
        <input  type="checkbox" name="status" @if(old('status')) {{'checked'}}  @endif> <small class="text-danger">Checked: Visible | Unchecked: disable</small>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit Color</button>
      </div>
</form>
    </div>
  </div>
</div>  