
<div>
        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="footer-heading">{{$web_sitting->website_name ?? 'Your Website Name'}}</h4>
                        <div class="footer-underline"></div>
                        <p>
                        {{$web_sitting->address ?? 'Your address '}}
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading">Quick Links</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2"><a href="{{route('home')}}" class="text-white">Home</a></div>
                        <div class="mb-2"><a href="{{route('home')}}" class="text-white">About Us</a></div>
                        <div class="mb-2"><a href="{{route('home')}}" class="text-white">Contact Us</a></div>
                        <div class="mb-2"><a href="{{route('home')}}" class="text-white">Blogs</a></div>
                        <div class="mb-2"><a href="{{route('home')}}" class="text-white">Sitemaps</a></div>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading">Shop Now</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2"><a href="{{route('category.index')}}" class="text-white">Collections</a></div>
                        <div class="mb-2"><a href="{{route('new.arrivals')}}" class="text-white">Trending Products</a></div>
                        <div class="mb-2"><a href="{{route('new.arrivals')}}" class="text-white">New Arrivals Products</a></div>
                        <div class="mb-2"><a href="{{route('feature')}}" class="text-white">Featured Products</a></div>
                        <div class="mb-2"><a href="{{route('cart')}}" class="text-white">Cart</a></div>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading">Reach Us</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2">
                            <p>
                                <i class="fa fa-map-marker"></i> {{ $web_sitting->address ?? 'Your address '}}
                            </p>
                        </div>
                        <div class="mb-2">
                            <a href="" class="text-white">
                                <i class="fa fa-phone"></i> {{$web_sitting->phone ?? 'Your Phone '}}
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="" class="text-white">
                                <i class="fa fa-envelope"></i> {{$web_sitting->email ?? 'Your Email '}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <p class=""> &copy; 2022 - Factor of Web IT - Ecommerce. All rights reserved.</p>
                    </div>
                    <div class="col-md-4">
                        <div class="social-media">
                            Get Connected:
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-instagram"></i></a>
                            <a href=""><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>