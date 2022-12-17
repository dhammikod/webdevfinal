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
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-9">
                                @foreach ($userBililngDetails as $userBililngDetail)
                                    <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->

                                    <label>Full Name *</label>
                                    <input type="text" class="form-control" required
                                        value="{{ $userBililngDetail->name }}">



                                    <label>Street address *</label>
                                    <input type="text" class="form-control" placeholder="House number and Street name"
                                        required value="{{ $userBililngDetail->shipment_address }}">
                                    <label>Specific Address Notes *</label>
                                    <input type="text" class="form-control"
                                        placeholder="Appartments, suite, unit etc ..." required
                                        value="{{ $userBililngDetail->notes }}">

                                    <label>City *</label>
                                    <input type="text" class="form-control" required
                                        value="{{ $userBililngDetail->city }}">


                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Postal Code *</label>
                                            <input type="text" class="form-control" required
                                                value="{{ $userBililngDetail->postal_code }}">
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Phone Number *</label>
                                            <input type="text" class="form-control" required
                                                value="{{ $userBililngDetail->contact }}">
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->


                                    <label>Email address *</label>
                                    <input type="email" class="form-control" required
                                        value="{{ $userBililngDetail->email }}">

                                    <label>Proof Of Payment *</label>
                                    <img src="/img/noimgeplaceholder.jpg" alt="">
                                    <input type="file" id="myFile" name="filename" class="form-control">

                                    <label>Order notes (optional)</label>
                                    <textarea class="form-control" cols="30" rows="4"
                                        placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                                @endforeach
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
                                            @foreach ($ShoppingCartLists as $ShoppingCartList)
                                                <tr>
                                                    <td><a
                                                            href="#">{{ $ShoppingCartList->nama . ' (x' . $ShoppingCartList->jumlah . ')' . '(' . $ShoppingCartList->size . ')' }}</a>
                                                    </td>
                                                    <td><a href="#">{{ $ShoppingCartList->price }}</a></td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td>Shipping:</td>
                                                <td>Payment on COD</td>
                                            </tr>
                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>{{ $TotalPrice }}</td>
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
                                                            id="{{ $paymentType->payment_type }}"
                                                            class="collapsed" >
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

                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Place Order</span>
                                        <span class="btn-hover-text">Proceed to Checkout</span>
                                    </button>
                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>

                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
