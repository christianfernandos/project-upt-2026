<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>@yield('title')</title>
    <meta content="UPT Balai Latihan Pengembangan Produktivitas Tenaga Kerja Surabaya" name="description" />
    <meta content="UPT BLP2TK, Balai Latihan, Produktivitas, Tenaga Kerja, Surabaya" name="keywords" />

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

    <style>
    /* ============================================================
       GLOBAL RESPONSIVE & ZOOM-SAFE RULES
       Menggunakan satuan relatif (%, clamp, em) agar tidak
       bergeser saat browser di-zoom in/out.
    ============================================================ */

    /* Reset box model yang konsisten */
    *, *::before, *::after { box-sizing: border-box; }

    /* Cegah overflow horizontal di semua level */
    html, body { overflow-x: hidden; max-width: 100%; }

    /* Container Bootstrap: selalu lebar penuh dengan padding aman */
    .container {
        width: 100%;
        padding-right: clamp(12px, 3vw, 24px);
        padding-left:  clamp(12px, 3vw, 24px);
    }

    /* Header fixed tidak bergeser saat zoom */
    #header {
        width: 100% !important;
        left: 0 !important;
        right: 0 !important;
    }

    /* Navbar: flex-wrap agar tidak overflow saat zoom */
    #header > div {
        flex-wrap: wrap;
        gap: 0;
    }

    /* Teks judul page-header responsif */
    .ph-title {
        font-size: clamp(1.2rem, 3.5vw, 2rem);
        line-height: 1.25;
        word-break: break-word;
    }

    /* Card responsif - tidak meluber */
    .card { max-width: 100%; }

    /* Gambar tidak overflow */
    img { max-width: 100%; height: auto; }

    /* Tabel responsif */
    .table-responsive { -webkit-overflow-scrolling: touch; }

    /* Section header global (digunakan di beranda) */
    .section-header {
        text-align: center;
        margin-bottom: clamp(24px, 4vw, 40px);
    }
    .section-header p {
        font-size: clamp(12px, 1.5vw, 14px);
        font-weight: 700;
        color: #0d6efd;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 8px;
    }
    .section-header h2 {
        font-size: clamp(1.5rem, 4vw, 2.4rem);
        font-weight: 800;
        color: #1a1a2e;
        margin: 0;
        line-height: 1.2;
    }

    /* Breadcrumb Bootstrap override */
    .breadcrumb-item + .breadcrumb-item::before {
        content: "›";
        color: rgba(255,255,255,0.5);
    }
    .breadcrumb-item.active { color: rgba(255,255,255,0.55); }

    /* Back-to-top tetap di pojok kanan bawah */
    .back-to-top {
        position: fixed;
        bottom: clamp(16px, 3vw, 28px);
        right:  clamp(16px, 3vw, 28px);
        z-index: 9999;
    }

    /* Responsive: layar kecil */
    @media (max-width: 576px) {
        .container { padding-right: 16px; padding-left: 16px; }
        .ph-title  { font-size: 1.15rem; }
    }
    </style>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" style="padding:0; position:fixed; top:0; left:0; right:0; z-index:999; background:#fff; box-shadow:0 2px 16px rgba(1,41,112,0.08);">
        <div style="display:flex; align-items:center; justify-content:space-between; height:64px; padding:0 32px 0 0;">

            <!-- LOGO: pojok kiri tanpa space -->
            <a href="{{ route('beranda') }}" style="
                text-decoration:none;
                display:flex;
                align-items:center;
                gap:0;
                height:64px;
                padding: 0 24px;
                border-right: 1px solid rgba(1,41,112,0.08);
                flex-shrink:0;
            ">
                <div style="display:flex; align-items:center; gap:10px;">
                    <!-- Logo UPT -->
                    <img src="{{ asset('asset/img/logo-upt.png') }}" alt="Logo UPT BLP2TK"
                         style="height:32px;width:auto;flex-shrink:0;object-fit:contain;">
                    <!-- Teks -->
                    <div style="display:flex;flex-direction:column;justify-content:center;">
                        <div style="
                            font-family:'Poppins',sans-serif;
                            font-weight:800;
                            font-size:15px;
                            color:#1a237e;
                            letter-spacing:0.2px;
                            white-space:nowrap;
                            line-height:1.2;
                        ">UPT BLP2TK <span style="color:#1976d2;">Surabaya</span></div>
                        <div style="
                            font-family:'Poppins',sans-serif;
                            font-size:8.5px;
                            font-weight:500;
                            color:#888;
                            letter-spacing:0.6px;
                            text-transform:uppercase;
                            white-space:nowrap;
                            line-height:1.3;
                        ">Balai Latihan Pengembangan Produktivitas Tenaga Kerja</div>
                    </div>
                </div>
            </a>

            <!-- NAVBAR -->
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link {{ Request::routeIs('beranda') ? 'active' : '' }}" href="{{ route('beranda') }}">Beranda</a></li>
                    <hr>
                    <li class="dropdown">
                        <a class="{{ Request::routeIs('profil-upt','profil.struktur','profil.tugas','profil.visimisi','profil.pegawai') ? 'active' : '' }}">
                            <span>Profil UPT</span> <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul>
                            <li><a href="{{ route('profil.struktur') }}" class="{{ Request::routeIs('profil.struktur') ? 'active' : '' }}">Struktur Organisasi</a></li>
                            <li><a href="{{ route('profil.tugas') }}"    class="{{ Request::routeIs('profil.tugas')    ? 'active' : '' }}">Tugas dan Fungsi</a></li>
                            <li><a href="{{ route('profil.visimisi') }}" class="{{ Request::routeIs('profil.visimisi') ? 'active' : '' }}">Visi Misi</a></li>
                            <li><a href="{{ route('profil.pegawai') }}"  class="{{ Request::routeIs('profil.pegawai')  ? 'active' : '' }}">Profil Pegawai</a></li>
                        </ul>
                    </li>
                    <hr>
                    <li><a class="{{ Request::routeIs('program-kegiatan') ? 'active' : '' }}" href="{{ route('program-kegiatan') }}">Program Kegiatan</a></li>
                    <hr>
                    <li><a class="{{ Request::routeIs('kalkulator') ? 'active' : '' }}" href="{{ route('kalkulator') }}">Kalkulator Produktivitas</a></li>
                    <hr>
                    <li><a class="{{ Request::routeIs('berita','berita.show') ? 'active' : '' }}" href="{{ route('berita') }}">Berita</a></li>
                    <hr>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>
    <!-- End Header -->

    <!-- Spacer agar konten tidak tertutup header fixed -->
    <div style="height:64px;"></div>

    <div class="content">
        @yield('content')
    </div>

    <!-- ======= Footer ======= -->
    <footer id="footer" style="background:#0d1b4b; color:#cdd5e0; font-family:'Poppins',sans-serif;">

        <!-- Footer Main -->
        <div style="padding: 52px 0 36px;">
            <div class="container">
                <div class="row gy-5">

                    <!-- Kolom 1: Identitas -->
                    <div class="col-lg-4 col-md-6">
                        <div style="display:flex; align-items:center; gap:12px; margin-bottom:18px;">
                            <img src="{{ asset('asset/img/logo-upt.png') }}" alt="Logo UPT BLP2TK"
                                 style="height:44px;width:auto;flex-shrink:0;object-fit:contain;mix-blend-mode:screen;">
                            <div>
                                <div style="font-weight:800; font-size:16px; color:#fff; line-height:1.2;">
                                    UPT BLP2TK <span style="color:#42a5f5;">Surabaya</span>
                                </div>
                                <div style="font-size:10px; color:#7a8eab; letter-spacing:0.5px; text-transform:uppercase;">
                                    Balai Latihan Pengembangan Produktivitas TK
                                </div>
                            </div>
                        </div>
                        <p style="font-size:13.5px; line-height:1.8; color:#8fa3be; margin-bottom:20px;">
                            Unit Pelaksana Teknis di bawah Dinas Tenaga Kerja yang bertugas memberikan
                            pelatihan dan pengembangan produktivitas tenaga kerja di Surabaya.
                        </p>
                        <!-- Sosial Media -->
                        <div style="display:flex; gap:10px;">
                            <a href="#" style="
                                width:36px; height:36px; border-radius:50%;
                                background:rgba(255,255,255,0.08);
                                display:flex; align-items:center; justify-content:center;
                                color:#8fa3be; font-size:16px; text-decoration:none;
                                transition:all 0.2s;
                            " onmouseover="this.style.background='#1976d2';this.style.color='#fff'"
                               onmouseout="this.style.background='rgba(255,255,255,0.08)';this.style.color='#8fa3be'">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" style="
                                width:36px; height:36px; border-radius:50%;
                                background:rgba(255,255,255,0.08);
                                display:flex; align-items:center; justify-content:center;
                                color:#8fa3be; font-size:16px; text-decoration:none;
                                transition:all 0.2s;
                            " onmouseover="this.style.background='#e1306c';this.style.color='#fff'"
                               onmouseout="this.style.background='rgba(255,255,255,0.08)';this.style.color='#8fa3be'">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="#" style="
                                width:36px; height:36px; border-radius:50%;
                                background:rgba(255,255,255,0.08);
                                display:flex; align-items:center; justify-content:center;
                                color:#8fa3be; font-size:16px; text-decoration:none;
                                transition:all 0.2s;
                            " onmouseover="this.style.background='#1da1f2';this.style.color='#fff'"
                               onmouseout="this.style.background='rgba(255,255,255,0.08)';this.style.color='#8fa3be'">
                                <i class="bi bi-twitter-x"></i>
                            </a>
                            <a href="https://www.youtube.com" target="_blank" style="
                                width:36px; height:36px; border-radius:50%;
                                background:rgba(255,255,255,0.08);
                                display:flex; align-items:center; justify-content:center;
                                color:#8fa3be; font-size:16px; text-decoration:none;
                                transition:all 0.2s;
                            " onmouseover="this.style.background='#ff0000';this.style.color='#fff'"
                               onmouseout="this.style.background='rgba(255,255,255,0.08)';this.style.color='#8fa3be'">
                                <i class="bi bi-youtube"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Kolom 2: Kontak -->
                    <div class="col-lg-4 col-md-6">
                        <h6 style="color:#fff; font-weight:700; font-size:14px; margin-bottom:20px; letter-spacing:0.5px;">
                            <i class="bi bi-telephone-fill me-2" style="color:#42a5f5;"></i>Hubungi Kami
                        </h6>
                        <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:14px;">
                            <li style="display:flex; gap:12px; align-items:flex-start;">
                                <i class="bi bi-geo-alt-fill" style="color:#42a5f5; font-size:16px; margin-top:2px; flex-shrink:0;"></i>
                                <span style="font-size:13px; color:#8fa3be; line-height:1.7;">
                                    Jl. Bendul Merisi No.2, Jagir,<br>Kec. Wonokromo,<br>Surabaya, Jawa Timur 60244
                                </span>
                            </li>
                            <li style="display:flex; gap:12px; align-items:center;">
                                <i class="bi bi-telephone-fill" style="color:#42a5f5; font-size:15px; flex-shrink:0;"></i>
                                <a href="tel:+62318415260" style="font-size:13px; color:#8fa3be; text-decoration:none;"
                                   onmouseover="this.style.color='#42a5f5'" onmouseout="this.style.color='#8fa3be'">
                                    (031) 8415260
                                </a>
                            </li>
                            <li style="display:flex; gap:12px; align-items:center;">
                                <i class="bi bi-envelope-fill" style="color:#42a5f5; font-size:15px; flex-shrink:0;"></i>
                                <a href="mailto:uptblp2tksurabaya@gmail.com" style="font-size:13px; color:#8fa3be; text-decoration:none; word-break:break-all;"
                                   onmouseover="this.style.color='#42a5f5'" onmouseout="this.style.color='#8fa3be'">
                                    uptblp2tksurabaya@gmail.com
                                </a>
                            </li>
                            <li style="display:flex; gap:12px; align-items:center;">
                                <i class="bi bi-clock-fill" style="color:#42a5f5; font-size:15px; flex-shrink:0;"></i>
                                <span style="font-size:13px; color:#8fa3be; line-height:1.6;">
                                    Senin – Jumat<br>07.30 – 16.00 WIB
                                </span>
                            </li>
                        </ul>
                    </div>

                    <!-- Kolom 3: Maps -->
                    <div class="col-lg-4 col-md-6">
                        <h6 style="color:#fff; font-weight:700; font-size:14px; margin-bottom:20px; letter-spacing:0.5px;">
                            <i class="bi bi-map-fill me-2" style="color:#42a5f5;"></i>Lokasi Kami
                        </h6>
                        <div style="border-radius:10px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.3);">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.7!2d112.7350!3d-7.3150!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMTgnNTQuMCJTIDExMsKwNDQnMDYuMCJF!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                                width="100%" height="170" style="border:0; display:block;"
                                allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div style="border-top:1px solid rgba(255,255,255,0.07); padding:18px 0;">
            <div class="container">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-2">
                    <div style="font-size:13px; color:#5a6e85;">
                        &copy; 2026 <strong style="color:#8fa3be;">UPT Balai Latihan Pengembangan Produktivitas Tenaga Kerja Surabaya</strong>. All Rights Reserved.
                    </div>
                    <div style="font-size:12px; color:#5a6e85;">
                        Dinas Tenaga Kerja Kota Surabaya
                    </div>
                </div>
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
