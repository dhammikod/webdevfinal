@extends('layouts.user')


@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('user/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Our Products<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/catalog">Catalog</a></li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="toolbox">
                    <div class="toolbox-left">
                        <a href="#" class="sidebar-toggler"><i class="icon-bars"></i>Filters</a>
                    </div><!-- End .toolbox-left -->

                    <div class="toolbox-center">
                        <div class="toolbox-info">
                            Showing <span>12 of 56</span> Products
                        </div><!-- End .toolbox-info -->
                    </div><!-- End .toolbox-center -->

                    <div class="toolbox-right">
                        <div class="toolbox-sort">
                            <label for="sortby">Sort by:</label>
                            <div class="select-custom">
                                <select name="sortby" id="sortby" class="form-control">
                                    <option value="popularity" selected="selected">Most Popular</option>
                                    <option value="rating">Price Up</option>
                                    <option value="date">Price Down</option>
                                </select>
                            </div>
                        </div><!-- End .toolbox-sort -->
                    </div><!-- End .toolbox-right -->
                </div><!-- End .toolbox -->


                <div class="products">
                    <div class="row">

                        @foreach ($items as $item)
                            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                <div class="product">
                                    <figure class="product-media">
                                        @foreach ($itemPictures as $itemPicture)
                                            @if ($item->id == $itemPicture->id_item)
                                                <a href="/product-details/{{ $recomItem->id }}">
                                                    <img src="{{ asset('img/productImg/' . $itemPicture->picture) }}"
                                                        alt="Product image" class="product-image">
                                                </a>
                                            @break
                                        @endif
                                    @endforeach
                                    
                                    @php
                                        $user = Auth::user();
                                    @endphp

                                    <div class="product-action-vertical">
                                        <form method="POST" action="{{ route('wishlist.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="itemid" value="{{ $item->id }}">
                                            <input type="hidden" name="userid" value="{{ $user['id'] }}">
                                            <button type="submit" class="btn-product-icon btn-wishlist btn-expandable">
                                                <span>add
                                                    to
                                                    wishlist</span>
                                            </button>

                                            </button>
                                        </form>

                                    </div><!-- End .product-action -->

                                    <div class="product-action action-icon-top">
                                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <p>{{ $item['category'] }}</p>
                                    </div><!-- End .product-cat -->
                                    {{-- <h3 class="product-title"><a
                                            href="{{ route('product-details.productDetails', $item->id) }}">{{ $item['nama'] }}</a> --}}
                                    <h3 class="product-title"><a
                                            href=""{{ route('product-details', ['id' => $item['id']]) }}>{{ $item['nama'] }}</a>



                                    </h3>
                                    <!-- End .product-title -->
                                    <div class="product-price">
                                        Rp {{ $item['price'] }}
                                    </div><!-- End .product-price -->

                                    <div class="product-nav product-nav-dots">
                                        <p>Sold: {{ $item['sold'] }}</p>
                                    </div>

                                    <div class="product-nav product-nav-dots">
                                        @php($sizes = '')



                                        @foreach ($itemSizeStocks as $itemSizeStock)
                                            @if ($item['id'] == $itemSizeStock->id_item)
                                                @php($sizes = $sizes . $itemSizeStock->size . ',')
                                            @endif
                                        @endforeach
                                        @php($sizes = rtrim($sizes, ','))

                                        <p>Size: {{ $sizes }}</p>
                                    </div><!-- End .product-nav -->


                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                    @endforeach

                </div><!-- End .row -->



                {{-- GANTI PAGINATION NANTI --}}
                <div class="load-more-container text-center">
                    <a href="#" class="btn btn-outline-darker btn-load-more">More Products <i
                            class="icon-refresh"></i></a>
                </div><!-- End .load-more-container -->
            </div><!-- End .products -->



            {{-- SIDE BAR --}}
            <div class="sidebar-filter-overlay"></div><!-- End .sidebar-filter-overlay -->
            <aside class="sidebar-shop sidebar-filter">
                <div class="sidebar-filter-wrapper">
                    <div class="widget widget-clean">
                        <label><i class="icon-close filterclose"></i>Filters</label>
                        <a href="#" class="sidebar-filter-clear">Clean All</a>
                    </div><!-- End .widget -->
                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                aria-controls="widget-1">
                                Category
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-1">
                            <div class="widget-body">
                                <div class="filter-items filter-items-count">





                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-1">
                                            <label class="custom-control-label" for="cat-1">Dresses</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">3</span>
                                    </div><!-- End .filter-item -->




                                </div><!-- End .filter-items -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true"
                                aria-controls="widget-2">
                                Size
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-2">
                            <div class="widget-body">
                                <div class="filter-items">
                                    <div class="filter-item">



                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="size-1">
                                            <label class="custom-control-label" for="size-1">XS</label>
                                        </div><!-- End .custom-checkbox -->



                                    </div><!-- End .filter-item -->



                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->


                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true"
                                    aria-controls="widget-5">
                                    Price
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-5">
                                <div class="widget-body">
                                    <div class="filter-price">
                                        <div class="filter-price-text">
                                            Price Range:
                                            <span id="filter-price-range"></span>
                                        </div><!-- End .filter-price-text -->

                                        <div id="price-slider"></div><!-- End #price-slider -->
                                    </div><!-- End .filter-price -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->
                    </div><!-- End .sidebar-filter-wrapper -->
            </aside><!-- End .sidebar-filter -->





        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
