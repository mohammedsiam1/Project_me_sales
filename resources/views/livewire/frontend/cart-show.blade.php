
<div class="py-3 py-md-5 bg-light">
    
        <div class="container">
   
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
                        @forelse($productsCart as $productCart)
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a href="{{url('user/showProduct/'.$productCart->product->category->slug.'/'.$productCart->product->slug)}}">
                                        <label class="product-name">
                                            @if($productCart->product->productImages)
                                            <img src="{{asset('Upload/Products/Images/'.$productCart->product->productImages[0]->image)}}"
                                             style="width: 50px; height: 50px" alt="">
                                             @else 
                                             <img src="" style="width: 50px; height: 50px" alt="">
                                            @endif
                                            {{$productCart->product->name}}
                                            @if($productCart->ColorProduct)
                                           <span class="text-danger"> Colors: {{$productCart->ColorProduct->Color->name}}</span>
                                            @endif
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-1 my-auto">
                                    <label class="price">${{$productCart->product->selling_price}} </label>
                                </div>
                                <div class="col-md-2 col-7 my-auto">
                                    <div class="quantity">
                                        <div class="input-group">
                                            <button type="button" wire:loading.attr="disabled" wire:click="decrement({{$productCart->id}})" class="btn btn1"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="{{$productCart->qyt}}" class="input-quantity" />
                                            <button type="button" wire:loading.attr="disabled" wire:click="increment({{$productCart->id}})" class="btn btn1"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 my-auto">
                                    <label class="price">${{$productCart->product->selling_price * $productCart->qyt}} </label>
                                    @php $totalPrice +=$productCart->product->selling_price * $productCart->qyt @endphp
                                </div>
                                <div class="col-md-2 col-5 my-auto">
                                    <div class="remove">
                                        <button wire:loading.attr="disabled" wire:click="removeProductCart( {{$productCart->id}} )" class="btn btn-danger btn-sm">
                                            <span wire:loading.remove wire:target="removeProductCart( {{$productCart->id}} )"><i class="fa fa-trash"></i> Remove</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty 
                        <h3>No product in your cart</h3>
                        @endforelse
                    </div>
                </div>
            </div>
            @if($productsCart != null)
            <div class="row">
                <div class="col-md-8 my-md-auto- mt-3">
                    Get the best deals & offers <a href="{{url('user/category')}}">shop now</a>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="shadow-sm bg-white p-3">
                        <h4>Total : 
                        <span class="float-end">${{$totalPrice}}</span>
                        </h4>
                        <hr>
                        <a href="{{route('checkout')}}" class="btn btn-warning w-100">Checkout</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>