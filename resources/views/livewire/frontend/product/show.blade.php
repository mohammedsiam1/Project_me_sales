<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border"style=" width:280px;  margin-left:150px">
                        @if($product->productImages)
                        <!--<img src="{{asset('Upload/Products/Images/'.$product->productImages[0]->image)}}" class="w-100" alt="Img">-->
                        <div class="exzoom" id="exzoom" wire:ignore>
                            <!-- Images -->
                            <div class="exzoom_img_box" >
                                <ul class='exzoom_img_ul'>
                                    @foreach($product->productImages as $productImg)
                                    <li><img  src="{{asset('Upload/Products/Images/'.$productImg->image)}}" class="w-100" /></li>
                                    @endforeach
                                    ...
                                </ul>
                            </div>
                            <div class="exzoom_nav"></div>
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn">
                                    < </a>
                                        <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                            </p>
                        </div>
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
                                    <label class="colorSelectedLabel" style="background-color: {{ $colorProduct->color->code }}" wire:click="colorSelected({{ $colorProduct->id }})">
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
                                        <span class="btn btn1" wire:click="decrement"><i class="fa fa-minus"></i></span>
                                        <input type="text" wire:model="quantity" value="{{$this->quantity}}" readonly class="input-quantity" />
                                        <span class="btn btn1" wire:click="increment"><i class="fa fa-plus"></i></span>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button wire:click="addToCart({{$this->product->id}})" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</button>
                                    <butaton wire:click="addToWishList({{$product->id}})" class="btn btn1">
                                        <span wire:loading.remove wire:target="addToWishList">
                                            <i class="fa fa-heart"></i> Add To Wishlist
                                        </span>
                                        <span wire:loading wire:target="addToWishList">Adding..</span>
                                    </butaton>
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
@push('scripts')
<script>
    $(function(){

    $("#exzoom").exzoom({

    // thumbnail nav options
    "navWidth": 60,
    "navHeight": 60,
    "navItemNum": 5,
    "navItemMargin": 7,
    "navBorder": 1,

    // autoplay
    "autoPlay": false,

    // autoplay interval in milliseconds
    "autoPlayTimeout": 2000

    });

    });
    </script>
    @endpush