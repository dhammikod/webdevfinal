@extends('layouts.admin')


@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row justify-content-between">
                <div class="col">
                    <h1>Items</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item active">Items</li>
                        </ol>
                    </nav>
                </div>

                <div class="col text-end">
                    <button type="button" class="btn btn-light rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#addNewAdmin">+ Add New Item</button>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="card">
                    @foreach ($items as $item)
                        @if ($item->statusDelete == false)
                            <form action="/admin-items_Deletes" method="POST">
                                @csrf
                                <h3 class="m-3 mb-0">item # {{ $item->id }}:</h3>
                                <div class="card m-3">
                                    <div class="row flex align-items-center">
                                        <div class="col-md-auto">
                                            @foreach ($itemPictures as $itemPicture)
                                                @if ($item->id == $itemPicture->id_item)
                                                    <img src="{{ asset('storage/'.$itemPicture->picture) }}"
                                                        alt="Picture" class="" height=100vh>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-md-auto">
                                            <h5 class="card-title">{{ $item->nama }}</h5>
                                            <p class="card-text ">{{ $item->description }}</p>
                                            <a href="{{ route('items.edit', $item->id) }}">Edit <i
                                                    class="icon-edit"></i></a></p>
                                        </div>
                                        <div class="col text-end">

                                            <div class="modal fade" id="areyouSureDelete" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Are You Sure?</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> Once Deleted it can't be restored</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="idforDelete" value="{{ $item->id }}">
                                            <button type="button" class="btn btn-danger me-5" data-bs-toggle="modal"
                                                data-bs-target="#areyouSureDelete"><i class="bi bi-trash"></i></button>
                                        </div>
                                        {{-- <button type="button" class="btn btn-danger me-5" data-bs-toggle="modal"
                                        data-bs-target="#areyouSureDelete"><i class="bi bi-trash"></i></button> --}}

                                    </div>
                                </div><!-- End Card with an image on left -->
                        @endif
                    @endforeach
                    </form>
                </div>
        </section>



        <div class="modal fade" id="addNewAdmin" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">New Item</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="name" name="nama" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="Description" name="description" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <input type="Category" name="category" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" name="price" class="form-control" required>
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
    </main>
@endsection
