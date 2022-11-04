<div>
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
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>

                                <div class="col-md-4">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
                        @if($whishlist)
                        @forelse($whishlist as $item)
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a href="{{url('user/showProduct/'.$item->product->category->slug.'/'.$item->product->slug)}}">
                                        <label class="product-name">
                                            <img src="{{asset('Upload/Products/Images/'.$item->product->productImages[0]->image)}}" style="width: 50px; height: 50px" alt="{{$item->product->name}}">
                                            {{$item->product->name}}
                                        </label>
                                    </a>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price">${{$item->product->selling_price}} </label>
                                </div>

                                <div class="col-md-4 col-12 my-auto">
                                    <div class="remove">
                                        <button wire:click="removeProductWishlist({{$item->id}})"  class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        @empty
                        <h3>No Products in your wish list</h3>
                        @endforelse
                        @else
                        <h6>No Products in your wish list</h6>
                        
                        @endif

                    </div>

                </div>
            </div>


        </div>
    </div>
</div>