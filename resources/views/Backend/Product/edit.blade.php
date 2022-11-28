@extends('layouts.admin')

@section('title')
Add Product
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                    <h2>Edit Product</h2>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
                <a href="{{route('products.index')}}" class="btn btn-danger col-sm">View Product</a>
            </div>
        </div>
        <hr>
        @if(session('message'))
        <div class="text-success">
            {{session('message')}}
        </div>
        @endif
    </div>
</div>


<div class="card">
    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-warning">
            @foreach($errors->all() as $error)
            <div>{{$error}}</div>
            @endforeach
        </div>
        @endif
        <form method="POST" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                        Home</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="SEO-tab" data-bs-toggle="tab" data-bs-target="#SEO-tab-pane" type="button" role="tab" aria-controls="SEO-tab-pane" aria-selected="false">
                        SEO Tags</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                        Details</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                        Images</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="colors-tab" data-bs-toggle="tab" data-bs-target="#colors-tab-pane" type="button" role="tab" aria-controls="colors-tab-pane" aria-selected="false">
                        Colors</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <br>
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" @if ('category_id') {{ 'selected' }} @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <br>
                            <label>Brand</label>
                            <select name="brand" class="form-control">
                                @foreach($brands as $brand)
                                <option value="{{$brand->name}}" @if ('brand') {{ 'selected' }} @endif>{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Name</label>
                            <input type="text" name="name" value="{{$product->name}}" class="form-control">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Slug</label>
                            <input type="text" name="slug" value="{{ $product->slug }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Short Description</label>
                            <textarea name="short_description" class="form-control">{{ $product->short_description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="SEO-tab-pane" role="tabpanel" aria-labelledby="SEO-tab" tabindex="0">
                    <div class="mb-3 ">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" value="{{ $product->meta_title }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Meta Description</label>
                        <textarea name="meta_description" class="form-control">{{ $product->meta_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control">{{ $product->meta_keyword }}</textarea>
                    </div>
                </div>
                <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="md-3">
                                <label>Origin Price</label>
                                <input type="number" value="{{ $product->original_price }}" name="original_price" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-3">
                                <label>Selling Price</label>
                                <input type="number" value="{{ $product->selling_price}}" name="selling_price" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-3">
                                <label>Quantity</label>
                                <input type="number" value="{{ $product->quantity }}" name="quantity" class="form-control">
                            </div>
                        </div>
                        <br><br> <br>
                        <div class="col-md-4">
                            <div class="md-3">
                                <label>Trending</label>
                                <input type="checkbox" name="trending" @if ($product->trending) {{ 'checked' }} @endif style="width: 16px; height: 16px;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-3">
                                <label>Featuring</label>
                                <input type="checkbox" name="featuring" @if ($product->featuring) {{ 'checked' }} @endif style="width: 16px; height: 16px;">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="md-3">
                                <label>Status</label>
                                <input type="checkbox" name="status" @if ($product->status) {{ 'checked' }} @endif style="width: 16px; height: 16px;">
                            </div>
                        </div>
                    </div>


                </div>
                <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                    <br>
                    <div class="md-3 col">
                        <label>Image <small class="text-danger"> ( You can add more than one picture )</small></label>
                        <input type="file" multiple name="image[]" class="form-control"><br>
                    </div>
                    <div>
                        @if($product->productImages)
                        @foreach($product->productImages as $image)
                        <img src="{{asset('Upload/Products/Images/'.$image->image)}}" class="me-4 border" style="width:80px;height:80px;">
                        <a class="" href="{{route('deleteImage',$image->id)}}">Remove</a>
                        @endforeach
                        @else
                        <h4>No Image For This Product</h4>
                        @endif
                    </div>

                    <br><button type="submit" class="btn btn-primary">Update</button>

                </div>
                <div class="tab-pane fade" id="colors-tab-pane" role="tabpanel" aria-labelledby="colors-tab" tabindex="0">
                    <br>
                    <div class="md-3 ">
                        <label class="text-danger">Select Colors </label><br>
                        <div class="row">
                            @forelse($colors as $coloritem)
                            <div class="col-md-3">
                                <div class="p-2 border mb-3">
                                    color: <input type="checkbox" name="colors[]" value="{{$coloritem->id}}" />
                                    {{$coloritem->name}}
                                    <br />
                                    Quantity: <input type="number" name="colorQuantity[]"   style="width:70px; border:1px solid" />
                                </div>
                            </div>
                            @empty
                            <h5>No colors</h5>
                            @endforelse

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>Color Name</th>
                                    <th>Quantity</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($product->ColorProduct as $productColor)

                                <tr class="prod_color-tr">
                                    <td>{{$productColor->color->name}}</td>
                                    <td>
                                        <div class="input-group mb-3" style="width:150px">
                                            <input type="number" name="productColorQuantity[]" value="{{$productColor->quantity}}" class="ProductColorQuantity form-control form-control-sm" />
                                            <button type="button" value="{{$productColor->id}}" class="updateProductColorBtn btn btn-primary btn-sm text-white">Update</button>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" value="{{$productColor->id}}" class="deleteProductColorBtn btn btn-danger btn-sm text-white">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                    <br><button type="submit" class="btn btn-primary">Update</button>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $(document).on('click', '.updateProductColorBtn', function() {
            var product_id = "{{$product->id}}";
            var prod_color_id = $(this).val();
            var qut = $(this).closest('.prod_color-tr').find('.ProductColorQuantity').val();
            
            if (qut <= 0) {
                alert('Quantity is Required');
                return false;
            }
            var data = {
                'product_id': product_id,
                'prod_color_id': prod_color_id,
                'qut': qut,
            };
            $.ajax({
                type: 'POST',
                url: "/admin/product-color/" + prod_color_id,
                data: data,
                success: function(response) {
                    alert(response.message);
                }
            });

        });
    });
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $(document).on('click', '.deleteProductColorBtn', function() {
            var thisClick =$(this);
            var prod_color_id = $(this).val();
             $.ajax({
                type: 'POST',
                url: "/admin/delete-product-color/" + prod_color_id,
                success: function(response) {
                    thisClick.closest('.prod_color-tr').remove();
                }
            });    

        });
    });
</script>

@endsection