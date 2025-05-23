<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title Meta -->
    <meta charset="utf-8" />
    <title>Home | BrandUI - Modern UI Kit with Layout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="A fully responsive premium admin dashboard template, Real Estate Management Admin Template" />
    <meta name="author" content="Techzaa" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <link href="{{ asset('/assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('/assets/js/config.min.js') }}"></script>

</head>

<body>

    <!-- START Wrapper -->
    <div class="wrapper">

        <!-- ========== Topbar Start ========== -->
        <header class="">
            <div class="topbar">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <div class="d-flex align-items-center gap-2">
                            <!-- Menu Toggle Button -->
                            <div class="topbar-item">
                                <button type="button" class="button-toggle-menu topbar-button">
                                    <i class="ri-menu-2-line fs-24"></i>
                                </button>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-1">
                            <!-- Theme Color (Light/Dark) -->
                            <div class="topbar-item">
                                <button type="button" class="topbar-button" id="light-dark-mode">
                                    <i class="ri-moon-line fs-24 light-mode"></i>
                                    <i class="ri-sun-line fs-24 dark-mode"></i>
                                </button>
                            </div>

                            <!-- Category -->
                            <div class="dropdown topbar-item d-none d-lg-flex">
                                <button type="button" class="topbar-button" data-toggle="fullscreen">
                                    <i class="ri-fullscreen-line fs-24 fullscreen"></i>
                                    <i class="ri-fullscreen-exit-line fs-24 quit-fullscreen"></i>
                                </button>
                            </div>

                            <!-- Theme Setting -->
                            <div class="topbar-item d-none d-md-flex">
                                <button type="button" class="topbar-button" id="theme-settings-btn"
                                    data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas"
                                    aria-controls="theme-settings-offcanvas">
                                    <i class="ri-settings-4-line fs-24"></i>
                                </button>
                            </div>

                            <!-- User -->
                            <div class="dropdown topbar-item">
                                <a type="button" class="topbar-button" id="page-header-user-dropdown"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="d-flex align-items-center">
                                        <img class="rounded-circle" width="32" src="{{ asset('/assets/images/users/avatar-1.jpg') }}"
                                            alt="avatar-3">
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <h6 class="dropdown-header">Welcome Admin!</h6>

                                    <a class="dropdown-item" href="/auth/edit-password">
                                        <iconify-icon icon="solar:lock-keyhole-broken"
                                            class="align-middle me-2 fs-18"></iconify-icon><span
                                            class="align-middle">Change Password</span>
                                    </a>

                                    <div class="dropdown-divider my-1"></div>
                                    <form action="/auth/logout" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger" href="auth-signin.html">
                                            <iconify-icon icon="solar:logout-3-broken"
                                                class="align-middle me-2 fs-18"></iconify-icon><span
                                                class="align-middle">Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Right Sidebar (Theme Settings) -->
        <div>
            <div class="offcanvas offcanvas-end border-0 rounded-start-4 overflow-hidden" tabindex="-1"
                id="theme-settings-offcanvas">
                <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
                    <h5 class="text-white m-0">Theme Settings</h5>
                    <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

                <div class="offcanvas-body p-0">
                    <div data-simplebar class="h-100">
                        <div class="p-3 settings-bar">

                            <div>
                                <h5 class="mb-3 font-16 fw-semibold">Color Scheme</h5>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-bs-theme"
                                        id="layout-color-light" value="light">
                                    <label class="form-check-label" for="layout-color-light">Light</label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-bs-theme"
                                        id="layout-color-dark" value="dark">
                                    <label class="form-check-label" for="layout-color-dark">Dark</label>
                                </div>
                            </div>

                            <div>
                                <h5 class="my-3 font-16 fw-semibold">Topbar Color</h5>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-topbar-color"
                                        id="topbar-color-light" value="light">
                                    <label class="form-check-label" for="topbar-color-light">Light</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-topbar-color"
                                        id="topbar-color-dark" value="dark">
                                    <label class="form-check-label" for="topbar-color-dark">Dark</label>
                                </div>
                            </div>


                            <div>
                                <h5 class="my-3 font-16 fw-semibold">Menu Color</h5>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-color"
                                        id="leftbar-color-light" value="light">
                                    <label class="form-check-label" for="leftbar-color-light">
                                        Light
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-color"
                                        id="leftbar-color-dark" value="dark">
                                    <label class="form-check-label" for="leftbar-color-dark">
                                        Dark
                                    </label>
                                </div>
                            </div>

                            <div>
                                <h5 class="my-3 font-16 fw-semibold">Sidebar Size</h5>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-size"
                                        id="leftbar-size-default" value="default">
                                    <label class="form-check-label" for="leftbar-size-default">
                                        Default
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-size"
                                        id="leftbar-size-small" value="condensed">
                                    <label class="form-check-label" for="leftbar-size-small">
                                        Condensed
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-size"
                                        id="leftbar-hidden" value="hidden">
                                    <label class="form-check-label" for="leftbar-hidden">
                                        Hidden
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-size"
                                        id="leftbar-size-small-hover-active" value="sm-hover-active">
                                    <label class="form-check-label" for="leftbar-size-small-hover-active">
                                        Small Hover Active
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-size"
                                        id="leftbar-size-small-hover" value="sm-hover">
                                    <label class="form-check-label" for="leftbar-size-small-hover">
                                        Small Hover
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="offcanvas-footer border-top p-3 text-center">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-danger w-100" id="reset-layout">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========== Topbar End ========== -->

        <!-- ========== App Menu Start ========== -->
        <div class="main-nav">
            <!-- Sidebar Logo -->
            <div class="logo-box">
                <a href="index.html" class="logo-light">
                    <img src="https://imersa.co.id/img/logo-web.png" class="logo-sm" alt="logo sm">
                    <img src="https://imersa.co.id/img/logo-web.png" class="logo-lg" alt="logo light">
                </a>
                <a href="index.html" class="logo-dark">
                    <img src="https://imersa.co.id/img/logo-web.png" class="logo-sm" alt="logo sm">
                    <img src="https://imersa.co.id/img/logo-web.png" class="logo-lg" alt="logo light">
                </a>
            </div>

            <!-- Menu Toggle Button (sm-hover) -->
            <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
                <i class="ri-menu-2-line fs-24 button-sm-hover-icon"></i>
            </button>

            <div class="scrollbar" data-simplebar>

                <ul class="navbar-nav" id="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <span class="nav-icon">
                                <i class="ri-dashboard-line"></i>
                            </span>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/inventaris">
                            <span class="nav-icon">
                                <i class="ri-box-3-line"></i>
                            </span>
                            <span class="nav-text">Data Barang</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/verivikasiAjuan">
                            <span class="nav-icon">
                                <i class="ri-mail-line"></i>
                            </span>
                            <span class="nav-text">Verivikasi Ajuan</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/peminjaman">
                            <span class="nav-icon">
                                <i class="ri-hand-coin-line"></i>
                            </span>
                            <span class="nav-text">Peminjaman</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/perawatan">
                            <span class="nav-icon">
                                <i class="ri-tools-line"></i>
                            </span>
                            <span class="nav-text">Perawatan</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/mutasi">
                            <span class="nav-icon">
                                <i class="ri-shuffle-line"></i>
                            </span>
                            <span class="nav-text">Mutasi</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/penghapusan">
                            <span class="nav-icon">
                                <i class="ri-delete-bin-6-line"></i>
                            </span>
                            <span class="nav-text">Penghapusan</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#sidebarLaporan" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarMultiLevelDemo">
                            <span class="nav-icon">
                                <i class="ri-file-text-line"></i>
                            </span>
                            <span class="nav-text">Laporan</span>
                        </a>
                        <div class="collapse" id="sidebarLaporan">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="/laporan/perawatan">Perawatan</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="/laporan/peminjaman">Peminjaman</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="/laporan/Penghapusan">Mutasi</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="/laporan/penghapusan">Penghapusan</a>
                                </li>
                            </ul>
                        </div>
                    </li> <!-- end Menu Item -->

                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#sidebarMenejemenData" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarMultiLevelDemo">
                            <span class="nav-icon">
                                <i class="ri-settings-4-line fs-18"></i>
                            </span>
                            <span class="nav-text">Pengaturan</span>
                        </a>
                        <div class="collapse" id="sidebarMenejemenData">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="/kategoriBarang">Kategori Barang</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="/dataRuang">Data Ruangan</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="kelolaBarang">Kelola Pengguna</a>
                                </li>
                            </ul>
                        </div>
                    </li> <!-- end Menu Item -->

                    {{-- <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#sidebarMultiLevelDemo" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarMultiLevelDemo">
                            <span class="nav-icon">
                                <i class="ri-share-line"></i>
                            </span>
                            <span class="nav-text"> Menu Items </span>
                        </a>
                        <div class="collapse" id="sidebarMultiLevelDemo">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="javascript:void(0);">Menu Item 1</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link  menu-arrow" href="#sidebarItemDemoSubItem"
                                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                                        aria-controls="sidebarItemDemoSubItem">
                                        <span> Menu Item 2 </span>
                                    </a>
                                    <div class="collapse" id="sidebarItemDemoSubItem">
                                        <ul class="nav sub-navbar-nav">
                                            <li class="sub-nav-item">
                                                <a class="sub-nav-link" href="javascript:void(0);">Menu Sub item</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li> <!-- end Menu Item --> --}}
                </ul>
            </div>
        </div>
        <!-- ========== App Menu End ========== -->

        <!-- ==================================================== -->
        <!-- Start right Content here -->
        <!-- ==================================================== -->
        <div class="page-content">

            <!-- Start Container Fluid -->
            <div class="container-fluid">

                <!-- Start here.... -->
                {{ $slot }}

            </div>
            <!-- End Container Fluid -->

            <!-- ========== Footer Start ========== -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; BrandUI. Crafted by <iconify-icon icon="solar:hearts-bold-duotone"
                                class="fs-18 align-middle text-danger"></iconify-icon> <a href=""
                                class="fw-bold footer-text" target="_blank">Techzaa</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- ========== Footer End ========== -->

        </div>
        <!-- ==================================================== -->
        <!-- End Page Content -->
        <!-- ==================================================== -->

    </div>
    <!-- END Wrapper -->

    <script src="{{ asset('/assets') }}/js/vendor.js"></script>
    <script src="{{ asset('/assets') }}/js/app.js"></script>
    <script src="{{ asset('/assets') }}/js/widgets.js"></script>

</body>

</html>