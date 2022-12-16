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
                    @php($i = 0)

                    <form action="/admin-" method="POST">
                        @csrf
                        @foreach ($item as $item)
                            @if ($item['status'] == 'admin')
                                @php($i++)


                                
                            @endif
                        @endforeach
                    </form>

                </div>
            </div>
        </section>
    </main>
@endsection
