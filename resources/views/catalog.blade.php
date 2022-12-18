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
                        </div><!-- End .toolbox-info -->
                    </div><!-- End .toolbox-center -->

                    <div class="toolbox-right">
                        <div class="toolbox-sort">
                               <a href="">Clear Filter</a>
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
                                                <a href="/product-details/{{ $item->id }}">

                                                    <img src="{{ asset('storage/' . $itemPicture->picture) }}"
                                                        alt="Product image" class="product-image">
                                                </a>
                                            @break
                                        @endif
                                    @endforeach

                                    @auth
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
                                            </form>
                                        </div><!-- End .product-action -->
                                    @endauth
                                    @guest
                                        <div class="product-action-vertical">
                                            <form method="GET" action="/login" enctype="multipart/form-data">
                                                {{-- @csrf --}}
                                                {{-- <input type="hidden" name="itemid" value="{{ $item->id }}">
                                            <input type="hidden" name="userid" value="{{ 0 }}"> --}}
                                                <button type="submit" class="btn-product-icon btn-wishlist btn-expandable">
                                                    <span>add
                                                        to
                                                        wishlist</span>
                                                </button>

                                                </button>
                                            </form>

                                        </div><!-- End .product-action -->
                                    @endguest
                                    <div class="product-action action-icon-top">
                                        <a href="product-details/{{ $item->id }}"
                                            class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <p>{{ $item->category }}</p>
                                    </div><!-- End .product-cat -->
                                    {{-- <h3 class="product-title"><a
                                            href="{{ route('product-details.productDetails', $item->id) }}">{{ $item['nama'] }}</a> --}}
                                    <h3 class="product-title"><a
                                            href=""{{ route('product-details', ['id' => $item->id]) }}>{{ $item->nama }}</a>



                                    </h3>
                                    <!-- End .product-title -->
                                    <div class="product-price">
                                        Rp {{ number_format($item->price, 2, ',', '.') }}
                                    </div><!-- End .product-price -->

                                    <div class="product-nav product-nav-dots">
                                        <p>Sold: {{ $item->sold }}</p>
                                    </div>

                                    <div class="product-nav product-nav-dots">
                                        @php($sizes = '')



                                        @foreach ($itemSizeStocks as $itemSizeStock)
                                            @if ($item->id == $itemSizeStock->id_item)
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






                {{-- SIDE BAR --}}
                <div class="sidebar-filter-overlay"></div><!-- End .sidebar-filter-overlay -->
                <aside class="sidebar-shop sidebar-filter">
                    {{-- DINSIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII FORM --}}
                    <form action="/catalog" method="get">
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

                                            @foreach ($filterCategory as $FC)
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox"
                                                            class="custom-control-input checkboxFilter"
                                                            name="checkboxFilter[]" id='{{ $FC->category }}'
                                                            value="{{ $FC->category }}">
                                                        <label class="custom-control-label"
                                                            for="{{ $FC->category }}">{{ $FC->category }}</label>
                                                    </div><!-- End .custom-checkbox -->
                                                    <span class="item-count">{{ $FC->jumlah }}</span>
                                                </div><!-- End .filter-item -->
                                            @endforeach

                                        </div><!-- End .filter-items -->
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
                                                Price Min:
                                                <div class="col">
                                                    <input type="number" name="priceMIN" id="priceMIN">
                                                </div>
                                            </div><!-- End .filter-price-text -->

                                            <div>
                                                Price Max:
                                                <div class="col">
                                                    <input type="number" name="priceMAX" id="priceMAX">
                                                </div>
                                            </div>

                                        </div><!-- End .filter-price -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->
                            <button class="btn btn-primary btn-rounded" type="submit" name="filterButton">Apply
                                Filter</button>
                        </div><!-- End .sidebar-filter-wrapper -->
                    </form>
                    {{-- DINSIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII FORM --}}

                </aside><!-- End .sidebar-filter -->




            </div><!-- End .container -->
        </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
