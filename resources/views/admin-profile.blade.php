@extends('layouts.admin')
@php
    $user = Auth::user();
@endphp

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="img/{{ $user["profile_picture"] }}.jpg" alt="Profile" class="rounded-circle">
                            <h2>{{  $user["name"] }}</h2>
                            <h3>{{  $user["status"] }}</h3>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <div class="tab-content pt-2">

                                <div class="profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form action="/admin-profile" method="POST">
                                        @csrf
                                        
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                                Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img src="img/{{ $user["profile_picture"] }}.jpg" alt="Profile">
                                                <div class="pt-2">
                                                    <a href="#" class="btn btn-primary btn-sm"
                                                        title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm"
                                                        title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="adminName" type="text" class="form-control"
                                                    value="{{  $user["name"] }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="adminEmail" type="email" class="form-control"
                                                    value="{{  $user["email"] }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="adminOldPass" class="col-md-4 col-lg-3 col-form-label">Old Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="adminOldPass" type="password" class="form-control" id="Job"
                                                    value="">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="adminNewPass" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="adminNewPass" type="password" class="form-control" id="Job"
                                                    value="">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>



                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
