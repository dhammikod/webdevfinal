@extends('layouts.user')


@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">Products</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="product-details-top">
                    @foreach ($items as $item)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img id="product-zoom" src="assets/images/products/single/1.jpg"
                                                data-zoom-image="assets/images/products/single/1-big.jpg"
                                                alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            <a class="product-gallery-item active" href="#"
                                                data-image="assets/images/products/single/1.jpg"
                                                data-zoom-image="assets/images/products/single/1-big.jpg">
                                                <img src="assets/images/products/single/1-small.jpg" alt="product side">
                                            </a>

                                            <a class="product-gallery-item" href="#"
                                                data-image="assets/images/products/single/2.jpg"
                                                data-zoom-image="assets/images/products/single/2-big.jpg">
                                                <img src="assets/images/products/single/2-small.jpg" alt="product cross">
                                            </a>

                                            <a class="product-gallery-item" href="#"
                                                data-image="assets/images/products/single/3.jpg"
                                                data-zoom-image="assets/images/products/single/3-big.jpg">
                                                <img src="assets/images/products/single/3-small.jpg"
                                                    alt="product with model">
                                            </a>

                                            <a class="product-gallery-item" href="#"
                                                data-image="assets/images/products/single/4.jpg"
                                                data-zoom-image="assets/images/products/single/4-big.jpg">
                                                <img src="assets/images/products/single/4-small.jpg" alt="product back">
                                            </a>
                                        </div><!-- End .product-image-gallery -->
                                    </div><!-- End .row -->

                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title">{{ $item->nama }}</h1>
                                    <!-- End .product-title -->

                                    <div class="ratings-container">
                                        <p>Sold {{ $item->sold }}</p>
                                    </div><!-- End .rating-container -->

                                    <div class="product-price">
                                        Rp {{ $item->price }}
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        <p>{{ $item->description }}</p>
                                    </div><!-- End .product-content -->


                                    <div class="details-filter-row details-row-size">
                                        <label for="size">Size:</label>
                                        <div class="select-custom">
                                            <select name="size" id="size" class="form-control">
                                                <option value="#" selected="selected">Select a size</option>
                                                @foreach ($itemSizeStocks as $itemSizeStock)
                                                    @if ($itemSizeStock->stock == 0)
                                                        <option value="{{ $itemSizeStock->size }}" disabled>
                                                            {{ $itemSizeStock->size }}
                                                            ({{ $itemSizeStock->stock }})
                                                        </option>
                                                    @else
                                                        <option value="{{ $itemSizeStock->size }}">
                                                            {{ $itemSizeStock->size }}
                                                            ({{ $itemSizeStock->stock }}) </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" id="qty" class="form-control" value="1"
                                                min="1" max="10" step="1" data-decimals="0" required>
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="product-details-action">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>

                                        <div class="details-action-wrapper">
                                            <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to
                                                    Wishlist</span></a>
                                        </div><!-- End .details-action-wrapper -->
                                    </div><!-- End .product-details-action -->

                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    @endforeach

                </div><!-- End .product-details-top -->


                <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>

                    {{-- start of for loop --}}
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            <span class="product-label label-new">New</span>
                            <a href="product.html">
                                <img src="assets/images/products/product-4.jpg" alt="Product image" class="product-image">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                        wishlist</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                    title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare"
                                    title="Compare"><span>Compare</span></a>
                            </div><!-- End .product-action-vertical -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Women</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">Brown paperbag waist <br>pencil skirt</a>
                            </h3><!-- End .product-title -->
                            <div class="product-price">
                                $60.00
                            </div><!-- End .product-price -->
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 2 Reviews )</span>
                            </div><!-- End .rating-container -->

                            <div class="product-nav product-nav-thumbs">
                                <a href="#" class="active">
                                    <img src="assets/images/products/product-4-thumb.jpg" alt="product desc">
                                </a>
                                <a href="#">
                                    <img src="assets/images/products/product-4-2-thumb.jpg" alt="product desc">
                                </a>

                                <a href="#">
                                    <img src="assets/images/products/product-4-3-thumb.jpg" alt="product desc">
                                </a>
                            </div><!-- End .product-nav -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->

                    {{-- for loop end sampe 5 kali --}}


                </div><!-- End .owl-carousel -->


            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
