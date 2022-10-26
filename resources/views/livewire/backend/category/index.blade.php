<div>
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<form wire:submit.prevent="deleteCategory">
      <div class="modal-body">
        Are you sure to delete this category?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Delete Category</button>
      </div>
</form>
    </div>
  </div>
</div>  

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                    <h2>Categories</h2>
                </div>
              
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{url('admin/categories/create')}}" class="btn btn-primary col-sm">Add Category</a>
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="card">
<div class="card-body">
    
 

 <table class="table">
  <thead>
    <tr>
      <th class="text-primary">#</th>
      <th class="text-primary">Name</th>
      <th class="text-primary">Slug</th>
      <th class="text-primary">Status</th>
      <th class="text-primary">Who added</th>
      <th class="text-primary">Action</th>
    </tr>
  </thead>
  @foreach($categories as $category)
  <tbody>
    <tr>
      <th scope="row">{{ $loop->index+1}}</th>
      <td>{{$category->name}}</td>
      <td>{{$category->slug}}</td>
      <td>{{$category->status?'visible':'disabled'}}</td>
      <td>{{$category->user_id}}</td>
      <td>
        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning btn-lg"><i class="fa fa-edit"></i></a>
        <a type="button" wire:click="destroyCategory({{$category->id}})" class="btn btn-danger btn-lg"data-bs-toggle="modal" data-bs-target="#deleteModal" ><i class="fa fa-trash"></i></a>
      </td>
      
    </tr>
  </tbody>
  @endforeach
</table>
{!!$categories->links()!!}

</div>
</div>
</div>
@section('script')
<script>
window.addEventListener('close-modal',event =>{
  $('#deleteModal').modal('hide');
});  
</script>
@endsection