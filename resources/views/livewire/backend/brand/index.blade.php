<div>   

@include('livewire.backend.brand.Addmodal')
@include('livewire.backend.brand.deletemodel')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                    <h2>Brands</h2>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a data-bs-toggle="modal"  data-bs-target="#AddBrandModal" class="btn btn-primary col-sm">Add brand</a>
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
      <th class="text-primary">Action</th>
    </tr>
  </thead>
  @forelse($brands as $brand)
  <tbody>
    <tr>
      <th scope="row">{{ $loop->index+1}}</th>
      <td>{{$brand->name}}</td>
      <td>{{$brand->slug}}</td>
      <td>{{$brand->status?'visible':'disabled'}}</td>
      <td>
        <a href="{{route('categories.edit',$brand->id)}}" class="btn btn-warning btn-lg"><i class="fa fa-edit"></i></a>
        <a type="button" wire:click="deleteBrand({{$brand->id}})" class="btn btn-danger btn-lg"data-bs-toggle="modal" data-bs-target="#deleteModal" ><i class="fa fa-trash"></i></a>
      </td>
    </tr>
  </tbody>
  @empty
  <h3>ther's no Brand</h3>
  @endforelse
</table>
{!!$brands->links()!!}

</div>
</div>
@section('script')
<script>
window.addEventListener('close-modal',event =>{
  $('#AddBrandModal').modal('hide');
});  
</script>
@endsection

</div>
