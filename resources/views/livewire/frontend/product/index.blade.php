<div>
    <div class="row">
        <div class="col-md-3">
            @if($category->brands)
            <div class="card">
                <div class="card-header">
                    <h4>Brands</h4>
                </div>
                <div class="card-body">
                    @foreach($category->brands as $brand)
                    <label class="d-block">
                        <input type="checkbox" wire:model="brandInputs" value="{{$brand->name}}" />{{$brand->name}}
                    </label>
                    @endforeach
                </div>
            </div>
            @endif
            <div class="card mt-3">
                <div class="card-header">
                    <h4>Price</h4>
                </div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="radio"  wire:model="priceInput" value="high-to-low" />  high-to-low
                    </label>
                    <label class="d-block">
                        <input type="radio" wire:model="priceInput" value="low-to-high" />  low-to-high
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse($products as $product)
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-card-img">
                            @if($product->quantity > 0)
                            <label class="stock bg-success">In Stock</label>
                            @else
                            <label class="stock bg-danger">Out Of Stock</label>
                            @endif
                            @if($product->productImages->count() >0)
                            <a href="{{url('user/showProduct/'.$product->category->slug.'/'.$product->slug)}}">
                                <img style=" height :200px" src="{{asset('Upload/Products/Images/'.$product->productImages[0]->image)}}" alt="{{$product->name}}">
                            </a>
                            @endif
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{$product->brand}}</p>
                            <h5 class="product-name">
                                <a href="{{url('user/showProduct/'.$product->category->slug.'/'.$product->slug)}}">
                                    {{$product->name}}
                                </a>
                            </h5>
                            <div>
                                <span class="selling-price">${{$product->selling_price}}</span>
                                <span class="original-price">${{$product->original_price}}</span>
                            </div>
                            <!--  <div class="mt-2">
                                <a href="" class="btn btn1">Add To Cart</a>
                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="" class="btn btn1"> View </a>
                            </div> -->
                        </div>
                    </div>

                </div>
                @empty
                <h3>No Products Available for {{$category->name}}</h3>
                @endforelse
            </div>
        </div>
    </div>