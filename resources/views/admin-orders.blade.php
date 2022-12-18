@extends('layouts.admin')


@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <div class="col">
                <h1>Manage Orders</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <div class="card">
            <div class="card-body">

                <ul class="nav nav-tabs nav-tabs-bordered pt-3" id="borderedTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="Pending-tab" data-bs-toggle="tab"
                            data-bs-target="#bordered-Pending" type="button" role="tab" aria-controls="home"
                            aria-selected="true">Pending</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="OnGoing-tab" data-bs-toggle="tab" data-bs-target="#bordered-OnGoing"
                            type="button" role="tab" aria-controls="OnGoing" aria-selected="false">OnGoing</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="Completed-tab" data-bs-toggle="tab"
                            data-bs-target="#bordered-Completed" type="button" role="tab" aria-controls="Completed"
                            aria-selected="false">Completed</button>
                    </li>
                </ul>
                <div class="tab-content pt-2" id="borderedTabContent">

                    <div class="tab-pane fade show active" id="bordered-Pending" role="tabpanel"
                        aria-labelledby="Pending-tab">

                        <div class="row p-2">
                            <div class="card">
                                @foreach ($orders as $order)
                                    @if ($order['status'] == 'pending')
                                        {{-- items --}}
                                        @php
                                            include resource_path('views/controlleradminorders.php');
                                        @endphp
                                        <div class="row mt-3">
                                            <h5 class="m-3 mb-0">Order #{{ $order['id'] }}:</h5>

                                            <div class="row flex align-items-center col-sm-8">
                                                <div class="col-md-auto">
                                                    <h5 class="card-title">Location : {{ $order['shipment_address'] }}</h5>
                                                    <p class="card-text ">Notes :{{ $order['notes'] }}</p>

                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Size</th>
                                                                <th scope="col">Items</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $i = 1;
                                                            @endphp
                                                            @foreach ($results as $item)
                                                                <tr>
                                                                    <th scope="row">{{ $i }}</th>
                                                                    <td>{{ $item->nama }}</td>
                                                                    <td>{{ $item->size }}</td>
                                                                    <td>{{ $item->total_items }}</td>
                                                                </tr>
                                                                @php
                                                                    $i++;
                                                                @endphp
                                                            @endforeach


                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                            <div class="row col text-end">
                                                <div class="col">
                                                    <form action="/admin-orders-update" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="tickpending" value="yes">
                                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                                        <button type="submit" class="btn btn-success me-5"
                                                            data-bs-toggle="modal"><i
                                                                class="bi bi-pencil-square"></i></button>
                                                    </form>
                                                </div>
                                                <div class="col">

                                                    <form action="/admin-orders-reject" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="delpending" value="yes">
                                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                                        <button type="submit" class="btn btn-danger me-5"
                                                            data-bs-toggle="modal" data-bs-target="#areyouSureDelete"><i
                                                                class="bi bi-trash"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>



                    </div>

                    <div class="tab-pane fade" id="bordered-OnGoing" role="tabpanel" aria-labelledby="OnGoing-tab">
                        <div class="row p-2">
                            <div class="card">
                                @foreach ($orders as $order)
                                    @if ($order['status'] == 'ongoing')
                                        {{-- items --}}
                                        @php
                                            include resource_path('views/controlleradminorders.php');
                                        @endphp
                                        <div class="row mt-3">
                                            <h5 class="m-3 mb-0">Order #{{ $order['id'] }}:</h5>

                                            <div class="row flex align-items-center col-sm-8">
                                                <div class="col-md-auto">
                                                    <h5 class="card-title">Location : {{ $order['shipment_address'] }}
                                                    </h5>
                                                    <p class="card-text ">Notes :{{ $order['notes'] }}</p>

                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Size</th>
                                                                <th scope="col">Items</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $i = 1;
                                                            @endphp
                                                            @foreach ($results as $item)
                                                                <tr>
                                                                    <th scope="row">{{ $i }}</th>
                                                                    <td>{{ $item->nama }}</td>
                                                                    <td>{{ $item->size }}</td>
                                                                    <td>{{ $item->total_items }}</td>
                                                                </tr>
                                                                @php
                                                                    $i++;
                                                                @endphp
                                                            @endforeach


                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                            <div class="col text-end">


                                                @if (!$order->admincompleted)
                                                    <form action="/admin-orders-update" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="tickongoing" value="yes">
                                                        <input type="hidden" name="id"
                                                            value="{{ $order->id }}">
                                                        <button type="submit" class="btn btn-success me-5"
                                                            data-bs-toggle="modal"><i
                                                                class="bi bi-pencil-square"></i></button>
                                                    </form>
                                                    <p>Waiting for admin completed</p>
                                                @else
                                                    <form action="/admin-orders-update" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="delongoing" value="yes">
                                                        <input type="hidden" name="id"
                                                            value="{{ $order->id }}">
                                                            <button type="submit" class="btn btn-danger me-5"
                                                            data-bs-toggle="modal" data-bs-target="#areyouSureDelete"><i
                                                                class="bi bi-trash">cancel confirmation</i></button>
                                                    </form>
                                                @endif

                                                @if (!$order->usercompleted)
                                                    <p>Waiting for user completed</p>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="bordered-Completed" role="tabpanel" aria-labelledby="Completed-tab">
                        <div class="row p-2">
                            <div class="card">
                                @foreach ($orders as $order)
                                    @if ($order['status'] == 'completed')
                                        {{-- items --}}
                                        @php
                                            include resource_path('views/controlleradminorders.php');
                                        @endphp
                                        <div class="row mt-3">
                                            <h5 class="m-3 mb-0">Order #{{ $order['id'] }}:</h5>

                                            <div class="row flex align-items-center col-sm-8">
                                                <div class="col-md-auto">
                                                    <h5 class="card-title">Location : {{ $order['shipment_address'] }}
                                                    </h5>
                                                    <p class="card-text ">Notes :{{ $order['notes'] }}</p>

                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Size</th>
                                                                <th scope="col">Items</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $i = 1;
                                                            @endphp
                                                            @foreach ($results as $item)
                                                                <tr>
                                                                    <th scope="row">{{ $i }}</th>
                                                                    <td>{{ $item->nama }}</td>
                                                                    <td>{{ $item->size }}</td>
                                                                    <td>{{ $item->total_items }}</td>
                                                                </tr>
                                                                @php
                                                                    $i++;
                                                                @endphp
                                                            @endforeach


                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>


                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div><!-- End Bordered Tabs -->

            </div>
        </div>

    </main>
@endsection
