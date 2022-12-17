@extends('layouts.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row justify-content-between">
                <div class="col">
                    <h1>Website Feedbacks</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item active">Website Feedbacks</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="card ">
                    @foreach ($feedbacks as $feedback)
                    <hr>
                        <div class="row flex align-items-center">
                            <div class="col-md-auto">
                                <h5 class="card-title">{{ $feedback->title }}</h5>
                                <p class="card-text ">{{ $feedback->feedback }}</p>
                            </div>
                            <div class="col text-end">
                                @if ($feedback->status)
                                
                                <form action="{{ route('admin-website_feedbacks.update', $feedback->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                    <input type="submit" class="btn btn-danger" value="Reject"></button>
                                </form>    
                                @else
                                <form action="{{ route('admin-website_feedbacks.update', $feedback->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                    <input type="submit" class="btn btn-success" value="Accept"></button>
                                </form>
                                @endif
                                
                                
                            </div>
                        
                    </div><!-- End Card with an image on left -->
                    <hr>
                        @endforeach
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
