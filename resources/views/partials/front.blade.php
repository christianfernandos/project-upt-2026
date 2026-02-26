<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>@yield('title')</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="/asset/img/apple-touch-icon.png" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('asset/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header">
        <div class="tw-head">
            <div class="container">
                <nav class="navbar navbar-right">

                    <a class="navbar-brand tw-nav-brand" href="index.html">
                        <img src="{{ asset('/asset/img/logohmn.png') }}" width="200" height="100"
                            alt="PT Haga Mendhena Nusantara">
                    </a>

                    <nav id="navbar" class="navbar">
                        <ul>
                            <li><a class="nav-link scrollto " href="{{ route('beranda') }}">Beranda</a></li>
                            <hr>
                            <li class="dropdown">
                            <a href="#">
                                <span>Profil UPT</span> <i class="bi bi-chevron-down"></i>
                            </a>
                            <ul>
                                <li><a class="nav-link scrollto" href="#struktur">Struktur Organisasi</a></li>
                                <li><a class="nav-link scrollto" href="#tugas">Tugas dan Fungsi</a></li>
                                <li><a class="nav-link scrollto" href="#visimisi">Visi Misi</a></li>
                                <li><a class="nav-link scrollto" href="#pegawai">Profil Pegawai</a></li>
                            </ul>
                            </li>
                            <hr>
                            <li><a class="nav-link scrollto" href="#services">Program Kegiatan</a></li>
                            <hr>
                            <li>
                                <a class="nav-link scrollto" href="#portfolio">Kalkulator Produktivitas</a>
                            </li>
                            <hr>
                            <li><a href="{{ route('show-blog') }}">Berita</a></li>
                            <hr>

                        </ul>

                        <i class="bi bi-list mobile-nav-toggle"></i>
                    </nav>
                </nav>
                <!-- .navbar -->
            </div>
    </header>
    <!-- End Header -->
    <div class="content">
        @yield('content')
    </div>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-newsletter">
            <div class="container">


            </div>

            <div class="container">
                <div class="copyright">
                    <strong><span>UPT Balai Latihan Pengembangan Produktivitas Tenaga Kerja Surabaya</span></strong> &copy; 2026 All Rights Reserved
                </div>

            </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('asset/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('asset/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('asset/js/main.js') }}"></script>
    @stack('style')
    @stack('js')
</body>

</html>
