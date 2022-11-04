<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        @if($product->productImages)
                        <img src="{{asset('Upload/Products/Images/'.$product->productImages[0]->image)}}" class="w-100" alt="Img">
                        @else
                        <h3>No image For this product</h3>
                        @endif
                    </div>
                </div>

                <div class="col-md-7 mt-3">
                    <div class="row">
                        <div class="card">
                            <br>
                            <div class="product-view">

                                <h4 class="product-name">
                                    {{$product->name }}
                                </h4>
                                <hr>

                                <p class="product-path">
                                    Home / {{$product->category->name}} / {{$product->name}}
                                </p>
                                <div>
                                    <span class="selling-price">${{$product->selling_price}}</span>
                                    <span class="original-price">${{$product->original_price}}</span>
                                </div> <br>

                                <div>
                                    @if($product->ColorProduct->count() > 0 )
                                       @if($product->ColorProduct)
                                      @foreach($product->ColorProduct as $colorProduct)
                                    <label class="colorSelectedLabel" style="background-color: {{ $colorProduct->color->code }}"
                                        wire:click="colorSelected({{ $colorProduct->id }})"
                                    >
                                    {{$colorProduct->color->name}}
                                    </label>                                  
                                      @endforeach
                                       @endif
                                       <div>
                                       @if($this->productColorQty == 'outOfStock')
                                       <label class="btn btn-sm py-1 mt-2 text-white bg-danger"> Out Of Stock</label>

                                       @elseif ($this->productColorQty > 0)
                                       <label class="btn btn-sm py-1 mt-2 text-white bg-success"> In Stock</label>

                                       @endif
                                       </div>
                                    @else
                                    @if($product->quantity)
                                    <label class=" btn btn-sm py-1 mt-2 text-white bg-success"> In Stock</label>
                                    @else 
                                    <label class=" btn btn-sm py-1 mt-2 text-white bg-danger"> Out Of Stock</label>
                                    @endif

                                    @endif
                                </div>
                                <div class="mt-2">
                                    <div class="input-group">
                                        <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                        <input type="text" value="1" class="input-quantity" />
                                        <span class="btn btn1"><i class="fa fa-plus"></i></span>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <a href="" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                                    <a href="" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="mb-0">Small Description</h5>
                                    <p>
                                        {!!$product->short_description!!}
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h4>Description</h4>
                            </div>
                            <div class="card-body">
                                <p>
                                    {!!$product->description!!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>