@extends('layouts.user')
@php
    $user = Auth::user();
@endphp
@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">My Account<span>Dashboard</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <aside class="col-md-4 col-lg-3">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="true">Account Details</a>
                            </li>

                            
                            <li class="nav-item">
                                <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
                            </li>

                            {{-- DASHBOARD IS ITEM REQUESTS --}}
                            <li class="nav-item">
                                <a class="nav-link" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="false">Item Requests</a>
                            </li>

                            <li class="nav-item">
                                <form action="/logout" method="POST">
                                @csrf
                                {{-- {{ asdfasdf } --}}
                                <button class="btn" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade  show active" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                <form action="" method="POST">
                                    @csrf
                                    <label>Display Name *</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user["name"] }}" required>
                                    <small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>

                                    <label>Email address *</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user["email"] }}" required>

                                    <label>Current password (leave blank to leave unchanged)</label>
                                    <input type="password" name="oldpassword" class="form-control">

                                    <label>New password (leave blank to leave unchanged)</label>
                                    <input type="password" name="newpassword" class="form-control">

                                    <label>Confirm new password</label>
                                    <input type="password" name="newpassword2" class="form-control mb-2">

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SAVE CHANGES</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div><!-- .End .tab-pane -->

                            {{-- order minipage --}}
                            <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                <p>No order has been made yet.</p>
                                <a href="/catalog" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- .End .tab-pane -->

                            {{-- addresses minipage --}}
                            <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
                                @if (!$status)
                                    <p>No Addresses Registered yet.</p>
                                @else
                                <div class="row">
                                    @foreach ($shipping_addresses as $shipping_address)
                                    
                                        <div class="col-lg-6">
                                            <div class="card card-dashboard">
                                                <div class="card-body">
                                                    <h3 class="card-title">Shipping address</h3><!-- End .card-title -->
                                                    <p>{{ $shipping_address->shipment_address }}<br>
                                                    {{ $shipping_address->city }}<br>
                                                    {{ $shipping_address->postal_code }}<br>
                                                    {{ $shipping_address->contact }}<br>
                                                    {{ $shipping_address->notes }}<br>
                                                    <a href="{{ route("shipping_address.edit", $shipping_address ->id) }}">Edit <i class="icon-edit"></i></a></p>
                                                </div><!-- End .card-body -->
                                                <div class="row mx-auto" >
                                                    <div class="col-lg-6 mb-3">
                                                        <form action="{{ route("shipping_address.destroy", $shipping_address ->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div><!-- End .card-dashboard -->
                                            
                                        </div>
                                        
                                    
                                    @endforeach
                                </div>
                                @endif

                                <a href="{{ route("shipping_address.create")}}" class="btn btn-outline-primary-2"><span>Link an Address</span><i class="icon-long-arrow-right"></i></a>
                                {{-- <p>The following addresses will be used on the checkout page by default.</p>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Billing Address</h3><!-- End .card-title -->

                                                <p>User Name<br>
                                                User Company<br>
                                                John str<br>
                                                New York, NY 10001<br>
                                                1-234-987-6543<br>
                                                yourmail@mail.com<br>
                                                <a href="#">Edit <i class="icon-edit"></i></a></p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->

                                    <div class="col-lg-6">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Shipping Address</h3><!-- End .card-title -->

                                                <p>You have not set up this type of address yet.<br>
                                                <a href="#">Edit <i class="icon-edit"></i></a></p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->
                                </div><!-- End .row --> --}}
                            <!-- .End .tab-pane -->


                            {{-- ITEM REQUEST - DASHBOARD --}}
                            


                           
                        </div>

                        <div class="tab-pane fade" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                            <form action="{{ route('item_requests.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label>Title *</label>
                                <input type="text" name="title" class="form-control" required>
                                @if ($errors->has('title'))
                                    <p class="text-danger">{{ $errors->first('title') }}</p>
                                @endif
                                
                                <label>Description *</label>
                                <input type="text" name="description" class="form-control" required>
                                <small class="form-text">Describe the item that you want</small>
                                @if ($errors->has('description'))
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                @endif

                                <label>Picture *</label>
                                <input type="file" name="picture" class="form-control" id="img">
                                @if ($errors->has('picture'))
                                    <p class="text-danger">{{ $errors->first('picture') }}</p>
                                @endif
                                <div id="selectedBanner"></div>

                                <script
                                src="https://code.jquery.com/jquery-3.6.0.min.js"
                                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                                crossorigin="anonymous"
                                ></script>
                                <script>
                                    var selDiv = "";
                                    var storedFiles = [];
                                    $(document).ready(function () {
                                      $("#img").on("change", handleFileSelect);
                                      selDiv = $("#selectedBanner");
                                    });
                              
                                    function handleFileSelect(e) {
                                      var files = e.target.files;
                                      var filesArr = Array.prototype.slice.call(files);
                                      filesArr.forEach(function (f) {
                                        if (!f.type.match("image.*")) {
                                          return;
                                        }
                                        storedFiles.push(f);
                              
                                        var reader = new FileReader();
                                        reader.onload = function (e) {
                                          var html =
                                            '<img src="' +
                                            e.target.result +
                                            "\" data-file='" +
                                            f.name +
                                            "alt='Category Image' height='200px' width='200px'>";
                                          selDiv.html(html);
                                        };
                                        reader.readAsDataURL(f);
                                      });
                                    }
                                  </script>

                                <button type="submit" class="btn btn-outline-primary-2 mt-3">
                                    <span>Request Item</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>
                            </form>
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->


@endsection