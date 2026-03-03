<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>UPT BLP2TK | @yield('title')</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Gradient Able is trending dashboard template made using Bootstrap 5 design framework. Gradient Able is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies.">
    <meta name="keywords"
        content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard">
    <meta name="author" content="codedthemes">
    <!-- [Favicon] icon -->
    <link rel="icon" type="image/png" href="{{ asset('asset/img/logo-upt.png') }}" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('asset/img/logo-upt.png') }}" />
    <!-- map-vector css -->
    <link rel="stylesheet" href="../assets/css/plugins/jsvectormap.min.css">
    <!-- [Google Font : Poppins] icon -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fb034efa9e.js" crossorigin="anonymous"></script>
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset('../assets/fonts/tabler-icons.min.css') }}">
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ asset('../assets/fonts/feather.css') }}">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ asset('../assets/fonts/fontawesome.css') }}">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset('../assets/fonts/material.css') }}">
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('../assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('../assets/css/style-preset.css') }}">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    {{-- ====== UPT ADMIN CUSTOM THEME ====== --}}
    <style>
        /* === CSS Variables === */
        :root {
            --upt-blue-dark:   #0d1b4b;
            --upt-blue:        #1565c0;
            --upt-blue-mid:    #1976d2;
            --upt-blue-light:  #e8f0fe;
            --upt-orange:      #f47c20;
            --upt-orange-dark: #d4610a;
            --upt-orange-pale: #fff3e8;
            --upt-white:       #ffffff;
            --upt-bg:          #ffffff;
            --upt-sidebar-w:   260px;
        }

        /* === Body & Global === */
        body {
            font-family: 'Poppins', sans-serif !important;
            background: #ffffff !important;
            color: #1a1a2e !important;
        }

        /* === RESET SIDEBAR GAP (override template) === */
        .pc-sidebar,
        .pc-sidebar *,
        nav.pc-sidebar {
            box-sizing: border-box;
        }
        /* Hapus offset/gap bawaan template di atas sidebar */
        .pc-sidebar { top: 0 !important; padding-top: 0 !important; }
        .pc-sidebar > .navbar-wrapper { margin-top: 0 !important; padding-top: 0 !important; }
        .pc-sidebar .m-header { margin-top: 0 !important; padding-top: 0 !important; }

        /* === SIDEBAR === */
        .pc-sidebar {
            background: var(--upt-blue-dark) !important;
            border-right: none !important;
            box-shadow: 4px 0 24px rgba(13,27,75,0.18) !important;
            width: 260px !important;
            min-width: 260px !important;
            top: 0 !important;
            left: 0 !important;
            position: fixed !important;
            height: 100vh !important;
            z-index: 1000 !important;
            padding-top: 0 !important;
            margin-top: 0 !important;
        }
        .pc-sidebar .navbar-wrapper {
            background: var(--upt-blue-dark) !important;
            width: 260px !important;
            height: 100% !important;
            display: flex !important;
            flex-direction: column !important;
            padding-top: 0 !important;
            margin-top: 0 !important;
        }
        /* Logo area di sidebar */
        .pc-sidebar .m-header {
            background: linear-gradient(135deg, #0a1535 0%, #1565c0 100%) !important;
            border-bottom: 1px solid rgba(255,255,255,0.1) !important;
            padding: 0 16px !important;
            display: flex !important;
            align-items: center !important;
            height: 64px !important;
            min-height: 64px !important;
            overflow: hidden !important;
            margin-top: 0 !important;
            padding-top: 0 !important;
            flex-shrink: 0 !important;
        }
        .pc-sidebar .m-header .b-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            width: 100%;
        }
        .pc-sidebar .m-header img {
            height: 40px;
            width: auto;
            max-width: 140px;
            object-fit: contain;
            flex-shrink: 0;
        }
        .pc-sidebar .m-header .brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }
        .pc-sidebar .m-header .brand-text span:first-child {
            font-size: 13px;
            font-weight: 800;
            color: #fff;
            letter-spacing: 0.3px;
        }
        .pc-sidebar .m-header .brand-text span:last-child {
            font-size: 9px;
            font-weight: 400;
            color: rgba(255,255,255,0.60);
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }
        /* Navbar scroll area */
        .pc-sidebar .navbar-content {
            background: var(--upt-blue-dark) !important;
            padding-top: 6px !important;
        }
        /* Menu items */
        .pc-sidebar .pc-navbar .pc-item > .pc-link {
            color: rgba(255,255,255,0.72) !important;
            border-radius: 10px !important;
            margin: 2px 10px !important;
            padding: 10px 14px !important;
            transition: all 0.2s ease !important;
            font-size: 13.5px !important;
            font-weight: 500 !important;
            white-space: nowrap !important;
            overflow: visible !important;
        }
        .pc-sidebar .pc-navbar .pc-item > .pc-link .pc-mtext {
            flex: 1 !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            white-space: nowrap !important;
        }
        .pc-sidebar .pc-navbar .pc-item > .pc-link:hover,
        .pc-sidebar .pc-navbar .pc-item.active > .pc-link {
            background: rgba(244,124,32,0.18) !important;
            color: #ffd28a !important;
        }
        .pc-sidebar .pc-navbar .pc-item > .pc-link .pc-micon i,
        .pc-sidebar .pc-navbar .pc-item > .pc-link .pc-micon svg {
            color: rgba(255,255,255,0.55) !important;
            font-size: 18px !important;
        }
        .pc-sidebar .pc-navbar .pc-item > .pc-link:hover .pc-micon i,
        .pc-sidebar .pc-navbar .pc-item.active > .pc-link .pc-micon i {
            color: var(--upt-orange) !important;
        }
        /* Active indicator — garis kiri oranye */
        .pc-sidebar .pc-navbar .pc-item.active > .pc-link {
            border-left: 3px solid var(--upt-orange) !important;
            padding-left: 11px !important;
        }
        /* Caption (separator label) */
        .pc-sidebar .pc-navbar .pc-caption {
            border-top: 1px solid rgba(255,255,255,0.08) !important;
            margin: 8px 12px !important;
            padding: 6px 0 !important;
        }
        /* Submenu */
        .pc-sidebar .pc-submenu {
            background: rgba(0,0,0,0.15) !important;
            border-radius: 8px !important;
            margin: 2px 8px 4px 10px !important;
            padding: 4px 0 !important;
            overflow: hidden !important;
            border-left: none !important;
        }
        .pc-sidebar .pc-submenu::before,
        .pc-sidebar .pc-submenu::after {
            display: none !important;
        }
        .pc-sidebar .pc-submenu .pc-item::before,
        .pc-sidebar .pc-submenu .pc-item::after {
            display: none !important;
        }
        .pc-sidebar .pc-submenu .pc-item .pc-link {
            color: rgba(255,255,255,0.65) !important;
            font-size: 12.5px !important;
            padding: 8px 14px 8px 20px !important;
            border-radius: 7px !important;
            display: flex !important;
            align-items: center !important;
            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            position: relative !important;
        }
        .pc-sidebar .pc-submenu .pc-item .pc-link::before {
            display: none !important;
            content: none !important;
            width: 0 !important;
            height: 0 !important;
            opacity: 0 !important;
            visibility: hidden !important;
        }
        .pc-sidebar .pc-submenu .pc-item .pc-link:hover::before,
        .pc-sidebar .pc-submenu .pc-item.active .pc-link::before {
            display: none !important;
            content: none !important;
        }
        .pc-sidebar .pc-submenu .pc-item.active .pc-link {
            color: var(--upt-orange) !important;
            background: rgba(244,124,32,0.12) !important;
        }
        .pc-sidebar .pc-submenu .pc-item .pc-link:hover {
            color: var(--upt-orange) !important;
            background: rgba(244,124,32,0.10) !important;
        }
        /* Arrow icon - hidden */
        .pc-sidebar .pc-arrow {
            display: none !important;
        }

        /* === HEADER / TOPBAR === */
        .pc-header {
            background: #ffffff !important;
            border-bottom: 2px solid rgba(21,101,192,0.10) !important;
            box-shadow: 0 2px 16px rgba(13,27,75,0.10) !important;
            height: 64px !important;
            top: 0 !important;
            left: 260px !important;
            right: 0 !important;
            position: fixed !important;
            z-index: 998 !important;
            display: flex !important;
            align-items: center !important;
        }
        .pc-header .header-wrapper {
            display: flex !important;
            align-items: center !important;
            width: 100% !important;
            height: 64px !important;
            padding: 0 20px 0 16px !important;
            background: #fff !important;
        }
        /* Hamburger icon */
        .pc-head-link {
            color: var(--upt-blue-dark) !important;
        }
        .pc-head-link:hover {
            background: var(--upt-blue-light) !important;
            color: var(--upt-blue) !important;
            border-radius: 8px;
        }
        /* Avatar dropdown */
        .user-avtar {
            border: 2px solid var(--upt-orange) !important;
            border-radius: 50%;
        }

        /* === MAIN CONTENT AREA === */
        .pc-container {
            background: #ffffff !important;
            margin-left: 260px !important;
            margin-top: 64px !important;
            min-height: calc(100vh - 64px) !important;
        }
        .pc-content {
            padding: 24px !important;
            background: #ffffff !important;
        }

        /* === PAGE HEADER (breadcrumb area) === */
        .page-header .page-block {
            background: linear-gradient(135deg, var(--upt-blue-dark) 0%, var(--upt-blue-mid) 100%) !important;
            border-radius: 14px !important;
            border: none !important;
            box-shadow: 0 4px 20px rgba(13,27,75,0.15) !important;
        }
        .page-header .page-block .card-body {
            padding: 18px 24px !important;
        }
        .page-header .page-header-title h4 {
            color: #fff !important;
            font-weight: 700 !important;
            font-size: 18px !important;
        }
        .page-header .page-header-title {
            border-bottom-color: rgba(255,255,255,0.15) !important;
        }
        .page-header .breadcrumb {
            margin: 0 !important;
        }
        .page-header .breadcrumb .breadcrumb-item,
        .page-header .breadcrumb .breadcrumb-item a,
        .page-header .breadcrumb .breadcrumb-item i {
            color: rgba(255,255,255,0.70) !important;
            font-size: 12.5px !important;
        }
        .page-header .breadcrumb .breadcrumb-item.active {
            color: var(--upt-orange) !important;
        }
        .page-header .breadcrumb-item + .breadcrumb-item::before {
            color: rgba(255,255,255,0.35) !important;
        }

        /* === CARDS === */
        .card {
            border: 1px solid rgba(21,101,192,0.08) !important;
            border-radius: 16px !important;
            box-shadow: 0 4px 24px rgba(13,27,75,0.10), 0 1px 4px rgba(13,27,75,0.06) !important;
            background: #ffffff !important;
        }
        .card-header {
            background: #ffffff !important;
            border-bottom: 1px solid rgba(21,101,192,0.10) !important;
            border-radius: 16px 16px 0 0 !important;
            padding: 14px 20px !important;
        }
        .card-header h5 {
            font-size: 14.5px !important;
            font-weight: 700 !important;
            color: var(--upt-blue-dark) !important;
        }
        .card-footer {
            background: #f8faff !important;
            border-top: 1px solid rgba(21,101,192,0.09) !important;
            border-radius: 0 0 16px 16px !important;
        }

        /* === QUICK ACTION BUTTONS (dashboard) === */
        .btn-outline-primary {
            border-color: var(--upt-blue) !important;
            color: var(--upt-blue) !important;
            border-radius: 12px !important;
            font-weight: 600 !important;
            transition: all 0.2s !important;
        }
        .btn-outline-primary:hover, .btn-outline-primary:focus {
            background: var(--upt-blue) !important;
            color: #fff !important;
            box-shadow: 0 4px 14px rgba(21,101,192,0.25) !important;
        }
        .btn-outline-info {
            border-color: #0288d1 !important;
            color: #0288d1 !important;
            border-radius: 12px !important;
            font-weight: 600 !important;
        }
        .btn-outline-info:hover {
            background: #0288d1 !important;
            color: #fff !important;
        }
        .btn-outline-success {
            border-color: #2e7d32 !important;
            color: #2e7d32 !important;
            border-radius: 12px !important;
            font-weight: 600 !important;
        }
        .btn-outline-success:hover {
            background: #2e7d32 !important;
            color: #fff !important;
        }
        .btn-outline-warning {
            border-color: var(--upt-orange) !important;
            color: var(--upt-orange) !important;
            border-radius: 12px !important;
            font-weight: 600 !important;
        }
        .btn-outline-warning:hover {
            background: var(--upt-orange) !important;
            color: #fff !important;
        }
        .btn-outline-danger {
            border-radius: 12px !important;
            font-weight: 600 !important;
        }
        .btn-outline-secondary {
            border-radius: 12px !important;
            font-weight: 600 !important;
        }
        /* Primary filled button */
        .btn-primary {
            background: linear-gradient(135deg, var(--upt-blue) 0%, var(--upt-blue-mid) 100%) !important;
            border-color: var(--upt-blue) !important;
            border-radius: 9px !important;
            font-weight: 600 !important;
            box-shadow: 0 3px 10px rgba(21,101,192,0.22) !important;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--upt-blue-dark) 0%, var(--upt-blue) 100%) !important;
        }
        /* Orange / warning filled button */
        .btn-warning, .btn-orange {
            background: linear-gradient(135deg, var(--upt-orange) 0%, var(--upt-orange-dark) 100%) !important;
            border-color: var(--upt-orange) !important;
            color: #fff !important;
            border-radius: 9px !important;
            font-weight: 600 !important;
            box-shadow: 0 3px 10px rgba(244,124,32,0.22) !important;
        }

        /* === TABLES === */
        .table thead th {
            background: var(--upt-blue-dark) !important;
            color: #fff !important;
            font-size: 12.5px !important;
            font-weight: 600 !important;
            border: none !important;
            padding: 12px 16px !important;
        }
        .table thead th:first-child { border-radius: 10px 0 0 0 !important; }
        .table thead th:last-child  { border-radius: 0 10px 0 0 !important; }
        .table tbody tr:hover {
            background: var(--upt-blue-light) !important;
        }
        .table tbody td {
            vertical-align: middle !important;
            font-size: 13.5px !important;
            color: #2a2a3e !important;
            border-color: rgba(21,101,192,0.07) !important;
        }

        /* === BADGES === */
        .badge.bg-primary { background: var(--upt-blue) !important; }
        .badge.bg-warning  { background: var(--upt-orange) !important; color:#fff !important; }

        /* === FORM CONTROLS === */
        .form-control:focus, .form-select:focus {
            border-color: var(--upt-blue) !important;
            box-shadow: 0 0 0 3px rgba(21,101,192,0.12) !important;
        }
        .form-label { font-weight: 600 !important; font-size: 13px !important; color: var(--upt-blue-dark) !important; }

        /* === FOOTER === */
        .pc-footer {
            background: var(--upt-blue-dark) !important;
            color: rgba(255,255,255,0.55) !important;
            font-size: 12.5px !important;
            margin-left: 260px !important;
        }
        .pc-footer .footer-link a {
            color: var(--upt-orange) !important;
        }

        /* === LOADER === */
        .loader-bg { background: var(--upt-blue-dark) !important; }
        .loader-fill { background: var(--upt-orange) !important; }

        /* === TEXT UTILS override === */
        .text-primary { color: var(--upt-blue) !important; }
        .text-warning  { color: var(--upt-orange) !important; }

        /* === DROPDOWN MENU === */
        .dropdown-menu {
            border: none !important;
            box-shadow: 0 8px 32px rgba(13,27,75,0.13) !important;
            border-radius: 12px !important;
        }
        .dropdown-item:hover {
            background: var(--upt-blue-light) !important;
            color: var(--upt-blue) !important;
        }

        /* === SCROLLBAR === */
        ::-webkit-scrollbar { width: 5px; height: 5px; }
        ::-webkit-scrollbar-track { background: #f0f4ff; }
        ::-webkit-scrollbar-thumb { background: var(--upt-blue); border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--upt-orange); }
    </style>
    {{-- Data tables --}}

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.bootstrap5.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.bootstrap5.css">
    {{--  --}}
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-header="header-1" data-pc-preset="preset-1" data-pc-sidebar-theme="dark" data-pc-sidebar-caption="true"
    data-pc-direction="ltr" data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="{{ route('dashboard') }}" class="b-brand">
                    <img src="{{ asset('asset/img/logo-upt.png') }}"
                         alt="Logo UPT BLP2TK">
                    <div class="brand-text">
                        <span>UPT BLP2TK</span>
                        <span>Admin Panel</span>
                    </div>
                </a>
            </div>
            <div class="navbar-content">
                <ul class="pc-navbar">
                    <li class="pc-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="pc-link">
                            <span class="pc-micon"><i class="ph ph-gauge"></i></span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>
                    <li class="pc-item pc-caption">
                        <label>Menu Utama</label>
                        <i class="ph ph-suitcase"></i>
                    </li>
                    {{-- Profil UPT --}}
                    <li class="pc-item pc-hasmenu {{ Request::routeIs('admin.profil-upt.*','admin.pegawai.*') ? 'active' : '' }}">
                        <a href="#!" class="pc-link">
                            <span class="pc-micon"><i class="ph ph-buildings"></i></span>
                            <span class="pc-mtext">Profil UPT</span>
                            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                        </a>
                        <ul class="pc-submenu">
                            <li class="pc-item {{ Request::routeIs('admin.profil-upt.*') ? 'active' : '' }}">
                                <a class="pc-link" href="{{ route('admin.profil-upt.index') }}">Profil &amp; Visi Misi</a>
                            </li>
                            <li class="pc-item {{ Request::routeIs('admin.pegawai.*') ? 'active' : '' }}">
                                <a class="pc-link" href="{{ route('admin.pegawai.index') }}">Pegawai</a>
                            </li>
                        </ul>
                    </li>
                    {{-- Program Kegiatan --}}
                    <li class="pc-item {{ Request::routeIs('admin.program-kegiatan.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.program-kegiatan.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ph ph-calendar-check"></i></span>
                            <span class="pc-mtext">Program Kegiatan</span>
                        </a>
                    </li>
                    {{-- Kalkulator Produktivitas --}}
                    <li class="pc-item {{ Request::routeIs('admin.kalkulator.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.kalkulator.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ph ph-calculator"></i></span>
                            <span class="pc-mtext">Kalkulator Produktivitas</span>
                        </a>
                    </li>
                    {{-- Berita --}}
                    <li class="pc-item {{ Request::routeIs('admin.berita.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.berita.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="ph ph-newspaper"></i></span>
                            <span class="pc-mtext">Berita</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ Sidebar Menu ] end -->
    <!-- [ Header Topbar ] start -->
    <header class="pc-header">
        <div class="header-wrapper">
            <!-- [Mobile Media Block] start -->
            <div class="me-auto pc-mob-drp">
                <ul class="list-unstyled">
                    <li class="pc-h-item pc-sidebar-collapse">
                        <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                            <i class="ph ph-list"></i>
                        </a>
                    </li>
                    <li class="pc-h-item pc-sidebar-popup">
                        <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                            <i class="ph ph-list"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- [Mobile Media Block end] -->
            <div class="ms-auto">
                <ul class="list-unstyled">
                    <li class="dropdown pc-h-item header-user-profile">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside"
                            aria-expanded="false">
                            <img src="../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
                        </a>
                        <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-body">
                                <div class="profile-notification-scroll position-relative"
                                    style="max-height: calc(100vh - 225px)">
                                    <ul class="list-group list-group-flush w-100">
                                        <li class="list-group-item">
                                            <a href="{{ route('logout') }}" class="dropdown-item">
                                                <span class="d-flex align-items-center">
                                                    <i class="ph ph-power"></i>
                                                    <span>Logout</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
    <div class="pc-container content">
        @yield('main')
    </div>


    <!-- [ Main Content ] end -->
    <footer class="pc-footer">
        <div class="footer-wrapper container-fluid">
            <div class="row">
                <div class="col-sm-6 my-1">
                    <p class="m-0">UPT Balai Latihan Pengembangan Produktivitas Tenaga Kerja Surabaya &copy; 2026</p>
                </div>
                <div class="col-sm-6 ms-auto my-1">
                    <ul class="list-inline footer-link mb-0 justify-content-sm-end d-flex">
                        <li class="list-inline-item"><a href="#">Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    {{-- <!-- [Page Specific JS] start -->
    <script src="{{ asset('../assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('../assets/js/plugins/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('../assets/js/plugins/world.js') }}"></script>
    <script src="{{ asset('../assets/js/plugins/world-merc.js') }}"></script>
    <script src="{{ asset('../assets/js/pages/dashboard-sales.js') }}"></script> --}}
    <!-- [Page Specific JS] end -->
    <!-- Required Js -->
    <script src="{{ asset('../assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('../assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('../assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('../assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('../assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('../assets/js/plugins/feather.min.js') }}"></script>




    @include('sweetalert::alert')
    @stack('js')


    <script>
        layout_change('light');
    </script>

    <script>
        $(document).ready(function() {
            // Hanya init jika belum diinit oleh child view
            if ($('#example').length && !$.fn.DataTable.isDataTable('#example')) {
                new DataTable('#example', {
                    scrollX: true,
                    autoWidth: false,
                    columnDefs: [
                        { targets: -1, responsivePriority: 1, className: 'dt-body-center' },
                        { targets: 0,  responsivePriority: 2, width: '50px' },
                        { targets: 1,  responsivePriority: 3, width: '90px' },
                    ],
                    language: {
                        search: "Cari:",
                        lengthMenu: "_MENU_ entri per halaman",
                        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        infoEmpty: "Tidak ada data",
                        infoFiltered: "(disaring dari _MAX_ total entri)",
                        paginate: {
                            first: "&laquo;",
                            last: "&raquo;",
                            next: "&rsaquo;",
                            previous: "&lsaquo;"
                        }
                    }
                });
            }
        })
    </script>


    <script>
        layout_sidebar_change('light');
    </script>



    <script>
        change_box_container('false');
    </script>


    <script>
        layout_caption_change('true');
    </script>




    <script>
        layout_rtl_change('false');
    </script>


    <script>
        preset_change("preset-5");
    </script>


    <script>
        header_change("header-1");
    </script>

</body>
<!-- [Body] end -->

</html>
