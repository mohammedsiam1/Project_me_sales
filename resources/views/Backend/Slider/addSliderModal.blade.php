<!-- Modal -->
<div  class="modal fade" id="addSliderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New Slider</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<form method="post" action="{{route('sliders.store')}}" enctype="multipart/form-data">
  @csrf
      <div class="modal-body">
        Add New Slider?
      </div>
      <div class="modal-body">
        <label>Title</label>
        <input class="form-control" type="text" name="title" Value="{{old('title')}}">
        @error('title')<small class="text-danger">{{$message}}</small>@enderror
      </div>
      <div class="modal-body">
        <label>Image</label>
        <input class="form-control" type="file" name="image" >
        @error('image')<small class="text-danger">{{$message}}</small>@enderror
      </div>
      <div class="modal-body">
      <label>Description</label>
        <textarea class="form-control"  name="description" >{{old('description')}}</textarea>
        @error('description')<small class="text-danger">{{$message}}</small>@enderror

      </div>
      <div class="modal-body">
      <label>Status</label>
        <input  type="checkbox" name="status" @if(old('status')) {{'checked'}}  @endif> <small class="text-danger">Checked: Visible | Unchecked: disable</small>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Slider</button>
      </div>
</form>
    </div>
  </div>
</div>  