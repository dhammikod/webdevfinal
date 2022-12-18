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
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label for="nama">Name</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama }}"
                        required>
                    @if ($errors->has('nama'))
                        <p class="text-danger">{{ $errors->first('nama') }}</p>
                    @endif
                </div><!-- End .form-group -->

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" value="{{ $item->description }}"
                        name="description" required>
                    @if ($errors->has('description'))
                        <p class="text-danger">{{ $errors->first('description') }}</p>
                    @endif
                </div><!-- End .form-group -->

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" value="{{ $item->price }}" name="price"
                        required>
                    @if ($errors->has('price'))
                        <p class="text-danger">{{ $errors->first('price') }}</p>
                    @endif
                </div><!-- End .form-group -->



                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" id="category" value="{{ $item->category }}" name="category"
                        required>
                    @if ($errors->has('category'))
                        <p class="text-danger">{{ $errors->first('contcategoryact') }}</p>
                    @endif
                </div><!-- End .form-group -->

                <div class="form-footer">
                    <button type="submit" class="btn btn-outline-primary mt-2">
                        <span>Save Changes</span>
                        <i class="icon-long-arrow-right"></i>
                    </button>

                </div><!-- End .form-footer -->


            </form>

            {{-- SECTION FOR IMAGE UPDATE --}}

            @if ($itemPictures == null)
                <p class="mt-5">No pictures Available.</p>
                <div class="col text-end">
                    <button type="button" class="btn btn-light rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#addNewAdmin">+
                        Add New Item</button>
                </div>
            @else
                @php
                    $i = 0;
                @endphp

                @if (count($itemPictures) < 4)
                    <div class="col text-end">
                        <button type="button" class="btn btn-light rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#addNewAdmin">+ Add New Picture</button>
                    </div>
                @endif
                <h4>Pictures:</h4>
                <div class="card p-2">
                    @foreach ($itemPictures as $picture)
                    <hr class="solid">

                        <div class="row align-items-center">
                            <div class="col">
                                <img src="{{ asset('storage/'.$picture->picture) }}" alt="Picture" class="rounded-start"
                                    height=100vh>
                            </div>
                            {{-- edit this picture --}}
                            <div class="col text-end">
                                <button type="button" class="btn btn-light rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#editpicture{{ $i }}">Edit this picture</button>
                            </div>
                        </div>
                        <hr class="solid">
                        {{-- FORM FOR EDIT PICTURE --}}
                        <div class="modal fade" id="editpicture{{ $i }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" action="{{ route('item_pictures.update', $picture->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="_method" value="PATCH">
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Picture Number {{ $i + 1 }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <label>Picture *</label>
                                            <input type="file" name="picture" class="form-control"
                                                id="img{{ $i }}" required>
                                            @if ($errors->has('picture'))
                                                <p class="text-danger">{{ $errors->first('picture') }}</p>
                                            @endif
                                            <div id="selectedBanner{{ $i }}"></div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-success">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </div>
            @endif


            {{-- FORM FOR CREATE PICTURE --}}
            <div class="modal fade" id="addNewAdmin" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <form method="POST" action="{{ route('item_pictures.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <div class="modal-header">
                                <h5 class="modal-title">New Picture</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <label>Picture *</label>
                                <input type="file" name="picture" class="form-control" id="img">
                                @if ($errors->has('picture'))
                                    <p class="text-danger">{{ $errors->first('picture') }}</p>
                                @endif
                                <div id="selectedBanner"></div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- PART FOR ITEM SIZE AND STOCKS --}}
            @if ($item_size_stocks->toArray() == null)
                <p class="mt-5">No item_size_stocks Available.</p>
                <div class="row p-2">
                    <div class="col">
                        <h4> Sizes</h4>
                    </div>
                    <div class="col text-end mt-5">
                        <button type="button" class="btn btn-light rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#item_size_stock">+
                            Add New Size and stocks</button>
                    </div>
                </div>
            @else
                @php
                    $i = 0;
                @endphp

                @if (count($item_size_stocks->toArray()) < 4)
                    <div class="row flex p-2">
                        <div class="col">
                            <h4> Sizes</h4>
                        </div>
                        <div class="col text-end">
                            <button type="button" class="btn btn-light rounded-pill" data-bs-toggle="modal"
                                data-bs-target="#item_size_stock">+
                                Add New Size and stocks</button>
                        </div>
                    </div>
                @endif
                @foreach ($item_size_stocks as $item_size_stock)
                    <div class="card p-2">
                        <hr class="solid">

                        <div class="row mt-2 align-items-center">
                            <div class="col-6">
                                <p>Size : {{ $item_size_stock->size }}</p>
                                <p>Stock : {{ $item_size_stock->stock }}</p>
                            </div>
                            {{-- edit this item_size_stocks --}}
                            <div class="col text-end">
                                <button type="button" class="btn btn-light rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#edititem_size_stock{{ $i }}">Edit size & stock</button>
                            </div>
                        </div>
                        <hr class="solid">



                        {{-- FORM FOR EDIT item_size_stocks --}}
                        <div class="modal fade" id="edititem_size_stock{{ $i }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST"
                                        action="{{ route('item_size_stocks.update', $item_size_stock->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="_method" value="PATCH">
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Size and Stock</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="SIZE">Size</label>
                                                <input type="text" class="form-control" id="SIZE"
                                                    value="{{ $item_size_stock->size }}" name="SIZE" required>
                                                @if ($errors->has('SIZE'))
                                                    <p class="text-danger">{{ $errors->first('SIZE') }}</p>
                                                @endif
                                            </div><!-- End .form-group -->

                                            <div class="form-group">
                                                <label for="stock">stock</label>
                                                <input type="number" class="form-control" id="stock"
                                                    value="{{ $item_size_stock->stock }}" name="stock" required>
                                                @if ($errors->has('stock'))
                                                    <p class="text-danger">{{ $errors->first('stock') }}</p>
                                                @endif
                                            </div><!-- End .form-group -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-success">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @php
                            $i++;
                        @endphp
                @endforeach
                </div>
            @endif

            {{-- FORM FOR CREATE item_size_stock --}}
            <div class="modal fade" id="item_size_stock" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <form method="POST" action="{{ route('item_size_stocks.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <div class="modal-header">
                                <h5 class="modal-title">New item_size_stocks</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="SIZE">SIZE</label>
                                    <input type="text" class="form-control" id="SIZE" name="SIZE" required>
                                    @if ($errors->has('SIZE'))
                                        <p class="text-danger">{{ $errors->first('SIZE') }}</p>
                                    @endif
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="stock">stock</label>
                                    <input type="number" class="form-control" id="stock" name="stock" required>
                                    @if ($errors->has('stock'))
                                        <p class="text-danger">{{ $errors->first('stock') }}</p>
                                    @endif
                                </div><!-- End .form-group -->


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


    </main>

@endsection
