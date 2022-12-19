@extends('layouts.user')


@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Checkout<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    @if ($shippingAddressesEXIST)
                        <form action="/checkout" method="GET">
                            <input type="hidden" name="a" value="asdfa" id="a">
                            
                                <select name="chooseLocation" id="chooseLocation"
                                    class="btn btn-outline-primary btn-rounded">
                                    @foreach ($shippingaddresses as $shippingaddress)
                                        <option name="shipmentChosen" value=" {{ $shippingaddress->id }}">
                                            {{ $shippingaddress->shipment_address }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type='submit'>
                            </button>
                        </form>
                    @endif

                    <form action="/checkoutProceed" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-9">
                                @if (!$shippingAddressesSELECTED)
                                    <div>
                                        <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                    </div>
                                    <input type="hidden" value="{{ Auth::user()->id }}" name="Id">


                                    <label>Full Name *</label>
                                    <input type="text" class="form-control" required name="FullName">



                                    <label>Street address *</label>
                                    <input type="text" class="form-control" placeholder="House number and Street name"
                                        required name="StreetAddress">


                                    <label>Specific Address Notes (optional)</label>
                                    <input type="text" class="form-control"
                                        placeholder="Appartments, suite, unit etc ..." name="StreetAddressNotes">

                                    <label>City *</label>
                                    <input type="text" class="form-control" required name="City">


                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Postal Code *</label>
                                            <input type="text" class="form-control" required name="PostalCode">
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Phone Number *</label>
                                            <input type="text" class="form-control" required name="Phone">
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->


                                    <label>Email address *</label>
                                    <input type="email" class="form-control" required name="Email">

                                    <label>Proof Of Payment *</label>
                                    <div id="selectedBanner"></div>
                                    <input type="file" name="picture" class="form-control" id="img" required>

                                    <label>Order notes (optional)</label>
                                    <textarea class="form-control" cols="30" rows="4"
                                        placeholder="Notes about your order, e.g. special notes for delivery" name="OrderNotes"></textarea>
                                @else
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h1 class="checkout-title">Billing Details</h1><!-- End .checkout-title -->
                                        </div>
                                    </div>


                                    <input type="hidden" value="{{ Auth::user()->id }}" name="Id">

                                    @foreach ($selectedforms as $selectedform)
                                        <label>Full Name *</label>
                                    <input type="text" class="form-control" required value="{{ $selectedform->name }}"
                                        name="FullName">



                                    <label>Street address *</label>
                                    <input type="text" class="form-control" placeholder="House number and Street name"
                                        required value="{{ $selectedform->shipment_address }}" name="StreetAddress">


                                    <label>Specific Address Notes *</label>
                                    <input type="text" class="form-control"
                                        placeholder="Appartments, suite, unit etc ..." required
                                        value="{{ $selectedform->notes }}" name="StreetAddressNotes">

                                    <label>City *</label>
                                    <input type="text" class="form-control" required value="{{ $selectedform->city }}"
                                        name="City">


                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Postal Code *</label>
                                            <input type="text" class="form-control" required
                                                value="{{ $selectedform->postal_code }}" name="PostalCode">
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Phone Number *</label>
                                            <input type="text" class="form-control" required
                                                value="{{ $selectedform->contact }}" name="Phone">
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <label>Email address *</label>
                                    <input type="email" class="form-control" required
                                        value="{{ $selectedform->email }}" name="Email">
                                    @endforeach
                                    

                                    <label>Proof Of Payment *</label>
                                    <img src="/img/noimgeplaceholder.jpg" alt="">
                                    <input type="file" id="myFile" name="picture" class="form-control">

                                    <label>Order notes (optional)</label>
                                    <textarea class="form-control" cols="30" rows="4"
                                        placeholder="Notes about your order, e.g. special notes for delivery" name="OrderNotes"></textarea>
                                @endif
                            </div><!-- End .col-lg-9 -->

                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <input type="hidden" name="ShoppingCartLists"
                                                value="{{ $ShoppingCartLists }}">
                                            @foreach ($ShoppingCartLists as $ShoppingCartList)
                                                <tr>
                                                    <td><a
                                                            href="#">{{ $ShoppingCartList->nama . ' (x' . $ShoppingCartList->jumlah . ')' . '(' . $ShoppingCartList->size . ')' }}</a>
                                                    </td>
                                                    <td>{{ number_format($ShoppingCartList->price,2,",",".") }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td>Shipping:</td>
                                                <td>Payment on COD</td>
                                            </tr>
                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td name="totalPrice">{{ number_format($TotalPrice,2,",",".") }}</td>
                                            </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    <div class="accordion-summary" id="accordion-payment">
                                        @php($x = 0)
                                        @foreach ($paymentTypes as $paymentType)
                                            <div class="card">
                                                <div class="card-header" id="heading{{ $x }}">
                                                    <h2 class="card-title">
                                                        <a role="radio" value="{{ $paymentType->payment_type }}"
                                                            name="radioGroupPayment" data-toggle="collapse"
                                                            href="#collapse{{ $x }}" aria-expanded="false"
                                                            aria-controls="collapse{{ $x }}"
                                                            id="{{ $paymentType->payment_type }}" class="collapsed">
                                                            {{ $paymentType->payment_type }}
                                                        </a>
                                                    </h2>
                                                </div><!-- End .card-header -->
                                                <div id="collapse{{ $x }}" class="collapse"
                                                    aria-labelledby="heading{{ $x }}"
                                                    data-parent="#accordion-payment">
                                                    <div class="card-body">
                                                        <p>{{ $paymentType->store_acc_number }}</p>
                                                        <p>A.N. {{ $paymentType->acc_name }}</p>
                                                    </div><!-- End .card-body -->
                                                </div><!-- End .collapse -->
                                            </div><!-- End .card -->
                                            @php($x++)
                                        @endforeach

                                    </div><!-- End .accordion -->

                                    @if ($exists)
                                        <button type="submit" name="submit" value='placeOrder'
                                            class="btn btn-outline-primary-2 btn-order btn-block">
                                            <span class="btn-text">Place Order</span>
                                            <span class="btn-hover-text">Proceed to Checkout</span>
                                        </button>
                                    @else
                                        {{-- <button
                                            class="btn btn-outline-primary-2 btn-order btn-block disabled">
                                            <span class="btn-text">Place Order</span>
                                            
                                        </button> --}}
                                        <span class="btn-text">Your cart is empty</span>
                                    @endif

                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>

                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
