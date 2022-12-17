<header class="header">
    @php
        $user = Auth::user();
    @endphp
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <div class="header-dropdown">
                    <a href="#">Usd</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">Eur</a></li>
                            <li><a href="#">Usd</a></li>
                        </ul>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropdown -->

                <div class="header-dropdown">
                    <a href="#">Eng</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">English</a></li>
                            <li><a href="#">French</a></li>
                            <li><a href="#">Spanish</a></li>
                        </ul>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropdown -->
            </div><!-- End .header-left -->
            {{-- <a href="/signin" data-toggle="modal"><i class="icon-user"></i>Login</a> --}}
            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li><a href="tel:#"><i class="icon-phone"></i>Call: +62 813 3663 8906</a></li>
                            @auth

                                <li><a href="/dashboard" class="sf-with-ul"><i class="icon-user"></i>dashboard</a></li>
                            @endauth
                            @guest
                                <li><a href="/login"><i class="icon-user"></i>Login</a></li>
                            @endguest

                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="index.html" class="logo">
                    <img src="{{ asset('img/logo.jpg') }}" alt="Logo" width="105" height="25">
                </a>

                <nav class="main-nav">
                    <ul class="menu">
                        {{-- jangan lupa ganti active di web tertentu --}}
                        <li class="active">
                            <a href="/" class="sf-with-ul">Home</a>
                        </li>

                        <li>
                            <a href="/catalog" class="sf-with-ul">Catalog</a>
                        </li>

                        <li>
                            <a href="/aboutus" class="sf-with-ul">About Us</a>
                        </li>

                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <div class="header-search">
                    <a href="#" class="search-toggle" role="button" title="Search"><i
                            class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="q" id="q"
                                placeholder="Search in..." required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->

                {{-- comapre product diganti jadi wishlist --}}
                <div class="dropdown compare-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" data-display="static" title="Compare Products"
                        aria-label="Compare Products">
                        <i class="icon-heart-o"></i>
                        @auth
                            @php
                                $count = DB::table('wishlists')
                                    ->where('user_id', '=', $user->id)
                                    ->count();
                            @endphp
                            <span class="compare-count">{{ $count }}</span>
                        @endauth
                        @guest
                            <span class="compare-count">0</span>
                        @endguest

                    </a>


                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="compare-products">
                            @auth
                                @php
                                    $count = DB::table('wishlists')
                                        ->where('user_id', '=', $user->id)
                                        ->count();
                                @endphp
                                @if ($count == 0)
                                    <li>You havent liked any products yet</li>
                                @endif
                                @php
                                    $wishlistsid = DB::table('wishlists')
                                        ->where('user_id', '=', $user->id)
                                        ->get();
                                @endphp
                                @foreach ($wishlistsid as $items)
                                    @php
                                        $item = DB::table('items')
                                            ->where('id', '=', $items->item_id)
                                            ->get();
                                    @endphp

                                    @foreach ($item as $ite)
                                        <li class="compare-product">
                                            <form action="{{ route('wishlist.destroy', $items->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-remove"><i
                                                        class="icon-close"></i></button>
                                            </form>
                                            <h4 class="compare-product-title"><a href="product.html">{{ $ite->nama }}</a>
                                            </h4>
                                        </li>
                                    @endforeach
                                @endforeach
                            @endauth
                            @guest
                            <li>You must sign in first</li>
                                <div class="compare-actions">
                                    
                                    <a href="/login" class="btn btn-outline-primary-2"><span>View
                                            Wishlist</span><i class="icon-long-arrow-right"></i></a>
                                </div>
                            @endguest

                        </ul>

                        @auth
                            <div class="compare-actions">
                                <a href="/wishlist" class="btn btn-outline-primary-2"><span>View Wishlist</span><i
                                        class="icon-long-arrow-right"></i></a>
                            </div>
                        @endauth
                        @guest
                            <form action="" method="POST">
                                @csrf
                                <button type="submit" class="btn-remove"><i class="icon-close"></i></button>
                            </form>
                        @endguest
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .Wishlist-dropdown -->

                {{-- shopping carttt --}}
                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count">2</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-cart-products">
                            <div class="product">
                                <div class="product-cart-details">
                                    <h4 class="product-title">
                                        <a href="product.html">Beige knitted elastic runner shoes</a>
                                    </h4>

                                    <span class="cart-product-info">
                                        <span class="cart-product-qty">1</span>
                                        x $84.00
                                    </span>
                                </div><!-- End .product-cart-details -->

                                <figure class="product-image-container">
                                    <a href="product.html" class="product-image">
                                        <img src="assets/images/products/cart/product-1.jpg" alt="logo">
                                    </a>
                                </figure>
                                <a href="#" class="btn-remove" title="Remove Product"><i
                                        class="icon-close"></i></a>
                            </div><!-- End .product -->

                            <div class="product">
                                <div class="product-cart-details">
                                    <h4 class="product-title">
                                        <a href="product.html">Blue utility pinafore denim dress</a>
                                    </h4>

                                    <span class="cart-product-info">
                                        <span class="cart-product-qty">1</span>
                                        x $76.00
                                    </span>
                                </div><!-- End .product-cart-details -->

                                <figure class="product-image-container">
                                    <a href="product.html" class="product-image">
                                        <img src="assets/images/products/cart/product-2.jpg" alt="logo">
                                    </a>
                                </figure>
                                <a href="#" class="btn-remove" title="Remove Product"><i
                                        class="icon-close"></i></a>
                            </div><!-- End .product -->
                        </div><!-- End .cart-product -->

                        <div class="dropdown-cart-total">
                            <span>Total</span>

                            <span class="cart-total-price">$160.00</span>
                        </div><!-- End .dropdown-cart-total -->

                        <div class="dropdown-cart-action">
                            <a href="/cart" class="btn btn-primary">View Cart</a>
                            <a href="/checkout" class="btn btn-outline-primary-2"><span>Checkout</span><i
                                    class="icon-long-arrow-right"></i></a>
                        </div><!-- End .dropdown-cart-total -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .cart-dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->
</header><!-- End .header -->



<!-- Mobile Menu -->
<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Search</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search"
                placeholder="Search in..." required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>

        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li class="active">
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/catalog">Catalog</a>
                </li>
                <li>
                    <a href="/aboutus" class="sf-with-ul">About Us</a>
                </li>
            </ul>
        </nav><!-- End .mobile-nav -->

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank" title="Instagram"><i
                    class="icon-instagram"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-phone"></i></a>
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->
