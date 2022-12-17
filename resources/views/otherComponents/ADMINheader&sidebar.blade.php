<!-- ======= Header ======= -->

<div class="headerrrrrr">

    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="#" class="logo d-flex align-items-center">
                <img src="{{asset('img/logo.jpg')}}" alt="product">
                <span class="d-none d-lg-block">Admin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{asset('img/noimgeplaceholder.jpg')}}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">H&D Webmaker</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>H&D Webmaker</h6>
                            <span>Admin</span>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button class="dropdown-item d-flex align-items-center" type="submit"><i
                                        class="bi bi-box-arrow-right"></i><span>Sign Out</span></button>
                            </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin-dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin-profile">
                    <i class="bi bi-person"></i>
                    <span>My Profile</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin-manage_account">
                    <i class="bi bi-people"></i>
                    <span>Manage Accounts</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin-orders">
                    <i class="bi bi-cart2"></i>
                    <span>Orders</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin-items">
                    <i class="bi bi-box"></i>
                    <span>Items</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin-billing_options">
                    <i class="bi bi-credit-card"></i>
                    <span>Billing Options</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin-item_requests">
                    <i class="bi bi-inboxes"></i>
                    <span>Item Requests</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin-website_feedbacks.index') }}">
                    <i class="bi bi-mailbox"></i>
                    <span>Website Feedbacks</span>
                </a>
            </li>
        </ul>

    </aside><!-- End Sidebar-->


</div>
