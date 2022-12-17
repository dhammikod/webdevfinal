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
                                            <img id="product-zoom"
                                                src="{{ asset('img/productImg/' . $itemPictures[0]->picture) }}"
                                                data-zoom-image="{{ asset('img/productImg/' . $itemPictures[0]->picture) }}"
                                                alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->


                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            @foreach ($itemPictures as $itemPicture)
                                                <a class="product-gallery-item" href="#"
                                                    data-image="{{ asset('img/productImg/' . $itemPicture->picture) }}"
                                                    data-zoom-image="{{ asset('img/productImg/' . $itemPicture->picture) }}">
                                                    <img src="{{ asset('img/productImg/' . $itemPicture->picture) }}"
                                                        alt="product side">
                                                    {{-- <img src="img/productImg/{{ $itemPicture->picture }}"
                                                        alt="product side"> --}}
                                                </a>
                                            @endforeach

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

                                    <form method="POST" action="{{ route('shoppingcart.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="details-filter-row details-row-size">
                                            <label for="size">Size:</label>
                                            <div class="select-custom">
                                                <select name="size" id="size" class="form-control" required> 
                                                    <option value="#" selected="selected">Select a size</option>
                                                    @foreach ($itemSizeStocks as $itemSizeStock)
                                                        @if ($itemSizeStock->stock == 0)
                                                            <option value="{{ $itemSizeStock->size }}" disabled>
                                                                {{ $itemSizeStock->size }}
                                                                ({{ $itemSizeStock->stock }})
                                                            </option>
                                                        @else
                                                            <option value="{{ $itemSizeStock->id }}">
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
                                                <input type="number" name="qty" id="qty" class="form-control" value="1"
                                                    min="1" max="10" step="1" data-decimals="0" required>
                                            </div><!-- End .product-details-quantity -->
                                        </div><!-- End .details-filter-row -->
                                        @php
                                            $user = Auth::user();
                                            $id = $user['id'];
                                        @endphp
                                        <input type="hidden" value="{{ $id }}" name="userid">
                                        <input type="hidden" value="{{ $item->id }}" name="itemid">
                                        <div class="product-details-action">
                                            <button type="submit" class="btn-product btn-cart"><span>add
                                                    to cart</span></a>
                                            </button>
                                    </form>
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
                @foreach ($recomItems as $recomItem)
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            @foreach ($itemPicturesAlls as $itemPicturesAll)
                                @if ($recomItem->id == $itemPicturesAll->id_item)
                                    <a href="/product-details/{{ $recomItem->id }}">
                                        <img src="{{ asset('img/productImg/' . $itemPicturesAll->picture) }}"
                                            alt="Product image" class="product-image">
                                    </a>
                                @break
                            @endif
                        @endforeach

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add
                                    to
                                    wishlist</span></a>
                        </div><!-- End .product-action -->

                        <div class="product-action action-icon-top">
                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <p>{{ $recomItem->category }}</p>
                        </div><!-- End .product-cat -->
                        {{-- <h3 class="product-title"><a
                                            href="{{ route('product-details.productDetails', $item->id) }}">{{ $item['nama'] }}</a> --}}
                        <h3 class="product-title"><a
                                href=""{{ route('product-details', ['id' => $recomItem->id]) }}>{{ $recomItem->nama }}</a>
                        </h3>
                        <!-- End .product-title -->
                        <div class="product-price">
                            Rp {{ $recomItem->price }}
                        </div><!-- End .product-price -->

                        <div class="product-nav product-nav-dots">
                            <p>Sold: {{ $recomItem->sold }}</p>
                        </div>

                        <div class="product-nav product-nav-dots">
                            @php($sizes = '')



                            @foreach ($itemSizeStocksAlls as $itemSizeStocksAll)
                                @if ($recomItem->id == $itemSizeStocksAll->id_item)
                                    @php($sizes = $sizes . $itemSizeStocksAll->size . ',')
                                @endif
                            @endforeach
                            @php($sizes = rtrim($sizes, ','))

                            <p>Size: {{ $sizes }}</p>
                        </div><!-- End .product-nav -->


                    </div><!-- End .product-body -->
                </div><!-- End .product -->
            @endforeach
        </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->

        {{-- for loop end sampe 5 kali --}}


    </div><!-- End .owl-carousel -->


    </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
