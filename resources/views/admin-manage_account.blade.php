@extends('layouts.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row justify-content-between">
                <div class="col">
                    <h1>Manage Accounts</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item active">Manage Accounts</li>
                        </ol>
                    </nav>
                </div>

                <div class="col text-end">
                    <button type="button" class="btn btn-light rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#addNewAdmin">+ Add New Admin</button>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="card">
                    @php($i = 0)

                    <form action="/admin-manage_accountDelete" method="POST">
                        @csrf
                        @foreach ($user as $user)
                            @if ($user['status'] == 'admin')
                                @php($i++)


                                <h3 class="m-3 mb-0">Admin {{ $i }}:</h3>
                                <div class="card m-3">
                                    <div class="row flex align-items-center">
                                        <div class="col-md-auto">
                                            <img src="img/{{ $user['profile_picture'] }}.jpg" alt="Picture"
                                                class="rounded-start" height=100vh>
                                        </div>
                                        <div class="col-md-auto">
                                            <h5 class="card-title">{{ $user['name'] }}</h5>
                                            <p class="card-text ">{{ $user['email'] }}</p>
                                        </div>
                                        <div class="col text-end">
                                            <button type="button" class="btn btn-danger me-5" data-bs-toggle="modal"
                                                data-bs-target="#areyouSureDelete"><i class="bi bi-trash"></i></button>
                                            <input type="hidden" name="idforDelete" value="{{ $user['id'] }}">
                                        </div>
                                    </div>
                                </div><!-- End Card with an image on left -->


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
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </form>

                </div>
            </div>
        </section>


        <div class="modal fade" id="addNewAdmin" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="/admin-manage_accountAdd">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">New Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="name" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" required>
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
