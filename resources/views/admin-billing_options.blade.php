@extends('layouts.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row justify-content-between">
                <div class="col">
                    <h1>Payment Options</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item active">Payment Options</li>
                        </ol>
                    </nav>
                </div>

                <div class="col text-end">
                    <button type="button" class="btn btn-light rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#addNewType">+ Add Payment Options</button>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="card">
                    @php($i = 0)

                    <form action="/admin-billing_optionsEditDelete" method="POST">
                        @csrf
                        @foreach ($paymentTypes as $paymentType)
                        @php($i++)
                            <div class="row flex align-items-center p-2">
                                <div class="col-md-auto">
                                    <h5 class="card-title">{{ $paymentType['payment_type'] }}</h5>
                                    <p class="card-text ">{{ $paymentType['acc_name'] }}</p>
                                    <p class="card-text ">{{ $paymentType['store_acc_number'] }}</>
                                </div>
                                <div class="col text-end">
                                    <button type="button" class="btn btn-success me-5" data-bs-toggle="modal"
                                        data-bs-target="#areyouSureEdit{{ $i }}"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger me-5" data-bs-toggle="modal"
                                        data-bs-target="#areyouSureDelete"><i class="bi bi-trash"></i></button>
                                    <input type="hidden" name="idforPaymentType" value="{{ $paymentType['id'] }}">
                                </div>
                            </div>
                            <br><br>


                            <div class="modal fade" id="areyouSureDelete" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Are You Sure?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Once Deleted it can't be restored
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="buttonSUBMIT"
                                                value='delete'>Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="areyouSureEdit{{ $i }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit your Payment Options</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-4 col-form-label">Payment Type</label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="paymentName" class="form-control" required
                                                        value="{{ $paymentType['payment_type'] }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputPassword" class="col-sm-4 col-form-label">Account
                                                    Name</label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="paymentAccName" class="form-control"
                                                        required value="{{ $paymentType['acc_name'] }}">
                                                </div>

                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEmail" class="col-sm-4 col-form-label">Account
                                                    Number</label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="paymentAccNum" class="form-control" required
                                                        value="{{ $paymentType['store_acc_number'] }}">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success" name="buttonSUBMIT"
                                                value='update'>Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </form>

                </div>
            </div>
        </section>


        <div class="modal fade" id="addNewType" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="/admin-billing_optionsAdd">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">New Payment Type</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-4 col-form-label">Payment Type</label>
                                <div class="col-sm-12">
                                    <input type="text" name="paymentName" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Account Name</label>
                                <div class="col-sm-12">
                                    <input type="text" name="paymentAccName" class="form-control" required>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-4 col-form-label">Account Number</label>
                                <div class="col-sm-12">
                                    <input type="text" name="paymentAccNum" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </main><!-- End #main -->
@endsection
