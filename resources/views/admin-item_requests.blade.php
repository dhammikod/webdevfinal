@extends('layouts.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row justify-content-between">
                <div class="col">
                    <h1>Manage Item Requests</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item active">Manage Item Requests</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="card ">
                    @foreach ($item_requests as $item_request)
                    <div class="card m-3">
                        <div class="row flex align-items-center">
                            <div class="col-md-auto">
                                <img src="{{ asset('storage/'.$item_request->request_picture) }}" alt="Picture"
                                    class="rounded-start" height=100vh>
                            </div>
                            <div class="col-md-auto">
                                <h5 class="card-title">{{ $item_request->title }}</h5>
                                <p class="card-text ">{{ $item_request->description }}</p>
                            </div>
                            <div class="col text-end">
                                @if ($item_request->status)
                                
                                <form action="{{ route('item_requests.update', $item_request->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                    <input type="submit" class="btn btn-danger" value="Reject"></button>
                                </form>    
                                @else
                                <form action="{{ route('item_requests.update', $item_request->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                    <input type="submit" class="btn btn-success" value="Accept"></button>
                                </form>
                                @endif
                                
                                
                            </div>
                        </div>
                        
                    </div><!-- End Card with an image on left -->
                        @endforeach
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
