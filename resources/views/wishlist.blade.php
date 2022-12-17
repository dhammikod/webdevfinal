@extends('layouts.user')


@section('content')
    @php
        $user = Auth::user();
    @endphp
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Wishlist<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <table class="table table-wishlist table-mobile">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Stock Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- for loop here --}}
                        @foreach ($wishlistitems as $item)
                            @foreach ($item as $detil)
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="product-details/{{ $detil->id }}">{{ $detil->nama }}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">{{ $detil->price }}</td>
                                    @if ($detil->stocked)
                                        <td class="stock-col"><span class="in-stock">In stock</span></td>

                                        <td class="action-col">
                                            <a href="product-details/{{ $detil->id }}">
                                                <button class="btn btn-block btn-outline-primary-2"><i
                                                        class="icon-cart-plus"></i>See item</button>
                                            </a>
                                        </td>
                                    @else
                                        <td class="stock-col"><span class="out-of-stock">Out of stock</span></td>
                                        <td class="action-col">
                                            <button class="btn btn-block btn-outline-primary-2 disabled">Out of
                                                Stock</button>">
                                        </td>
                                    @endif

                                    <td>
                                        <form action="{{ route('wishlist.destroy', $detil->id_wishlist) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-remove"><i class="icon-close"></i></button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table><!-- End .table table-wishlist -->

            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
