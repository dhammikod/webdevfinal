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
                    <label for="nama">nama</label>
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
                    <label for="category">category</label>
                    <input type="text" class="form-control" id="category" value="{{ $item->category }}" name="category"
                        required>
                    @if ($errors->has('category'))
                        <p class="text-danger">{{ $errors->first('contcategoryact') }}</p>
                    @endif
                </div><!-- End .form-group -->

                <div class="form-footer">
                    <button type="submit" class="btn btn-outline-primary mt-2">
                        <span>Edit Item information</span>
                        <i class="icon-long-arrow-right"></i>
                    </button>

                </div><!-- End .form-footer -->


            </form>

            {{-- SECTION FOR IMAGE UPDATE --}}
            @php
                $itempictures = DB::table('item_pictures')
                    ->where('id_item', '=', $item->id)
                    ->get();
            @endphp
            @if (!DB::table('item_pictures')->where('id_item', '=', $item->id)->exists())
                <p class="mt-5">No pictures Available.</p>
                <div class="col text-end">
                    <button type="button" class="btn btn-light rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#addNewAdmin">+
                        Add New Item</button>
                </div>
            @else
                @php
                    $count = DB::table('item_pictures')
                        ->where('id_item', '=', $item->id)
                        ->count();
                    $i = 0;
                @endphp
                @if ($count < 4)
                    <div class="col text-end">
                        <button type="button" class="btn btn-light rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#addNewAdmin">+ Add New Item</button>
                    </div>
                @endif
                @foreach ($itempictures as $picture)
                    <img src="{{ asset('storage/' . $picture->picture) }}" alt="Picture" class="rounded-start"
                        height=100vh>

                    {{-- edit this picture --}}
                    <div class="col text-end">
                        <button type="button" class="btn btn-light rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#editpicture{{ $i }}">Edit this picture</button>
                    </div>
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
                                        <h5 class="modal-title">Edit Picture no {{ $i + 1 }}</h5>
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
            @php
                $item_size_stocks = DB::table('item_size_stocks')
                    ->where('id_item', '=', $item->id)
                    ->get();
            @endphp
            @if (!DB::table('item_size_stocks')->where('id_item', '=', $item->id)->exists())
                <p class="mt-5">No item_size_stocks Available.</p>
                <div class="col text-end mt-5">
                    <button type="button" class="btn btn-light rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#addNewAdmin">+
                        Add New Size and stocks</button>
                </div>
            @else
                @php
                    $count = DB::table('item_size_stocks')
                        ->where('id_item', '=', $item->id)
                        ->count();
                    $i = 0;
                @endphp
                @if ($count < 4)
                    <div class="col text-end mt-5">
                        <button type="button" class="btn btn-light rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#item_size_stock">+ Add New Size and stocks</button>
                    </div>
                @endif
                @foreach ($item_size_stocks as $item_size_stock)
                <div class="row mt-2">
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
                    
                    {{-- FORM FOR EDIT item_size_stocks --}}
                    <div class="modal fade" id="edititem_size_stock{{ $i }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('item_size_stocks.update', $item_size_stock->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit item_size_stock no {{ $i + 1 }}</h5>
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
                                    <div class="modal-footer">item_size_stock
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        var selDiv = "";
        var storedFiles = [];
        $(document).ready(function() {
            $("#img").on("change", handleFileSelect);
            selDiv = $("#selectedBanner");
        });

        function handleFileSelect(e) {
            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            filesArr.forEach(function(f) {
                if (!f.type.match("image.*")) {
                    return;
                }
                storedFiles.push(f);

                var reader = new FileReader();
                reader.onload = function(e) {
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
@endsection
