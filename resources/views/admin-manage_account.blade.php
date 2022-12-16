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
                    <button type="button" class="btn btn-light rounded-pill">+ Add New Admin</button>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="card">
                    @php($i = 0)

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
                                        <form action="" method="POST">
                                            <button type="submit" class="btn btn-danger me-5"><i class="bi bi-trash"></i></button>
                                            <label hidden name="idforDelete" value="{{ $user['id'] }}"></label>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- End Card with an image on left -->

                        @endif
                    @endforeach

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
