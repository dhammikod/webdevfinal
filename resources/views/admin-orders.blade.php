@extends('layouts.admin')


@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <div class="col">
                <h1>Manage Accounts</h1>
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
                <h5 class="card-title">Bordered Tabs</h5>

                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
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

                                <form action="/admin-items" method="POST">
                                    @csrf
                                    @foreach ($order as $order)
                                        @if ($order['status'] == 'pending')
                                            <div>
                                                <h5 class="m-3 mb-0">Order #{{ $order['id'] }}:</h5>

                                                <div class="row flex align-items-center">
                                                    <div class="col-md-auto">
                                                        {{-- <h5 class="card-title">{{ $order['name'] }}</h5> --}}
                                                        {{-- <p class="card-text ">{{ $order['email'] }}</p> --}}

                                                        <input type="hidden" name="idforAccept"
                                                            value="{{ $order['id'] }}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </form>

                            </div>
                        </div>



                    </div>

                    <div class="tab-pane fade" id="bordered-OnGoing" role="tabpanel" aria-labelledby="OnGoing-tab">
                        Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio
                        omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate
                        nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
                    </div>

                    <div class="tab-pane fade" id="bordered-Completed" role="tabpanel" aria-labelledby="Completed-tab">
                        Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium
                        quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam.
                        Qui amet ipsum iure. Dignissimos fuga tempore dolor.
                    </div>

                </div><!-- End Bordered Tabs -->

            </div>
        </div>

    </main>
@endsection
