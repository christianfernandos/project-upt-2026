<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>@yield('title')</title>
    <meta content="UPT Balai Latihan Pengembangan Produktivitas Tenaga Kerja Surabaya" name="description" />
    <meta content="UPT BLP2TK, Balai Latihan, Produktivitas, Tenaga Kerja, Surabaya" name="keywords" />

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('asset/img/logo-upt.png') }}" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('asset/img/logo-upt.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('asset/img/logo-upt.png') }}" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

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
       GLOBAL OVERRIDE — font lebih besar, warna orange accent
    ============================================================ */
    :root {
        --clr-orange:      #f47c20;
        --clr-orange-dark: #d4610a;
        --clr-orange-pale: #fff3e8;
        --clr-blue-dark:   #1a237e;
        --clr-blue:        #1565c0;
        --clr-blue-mid:    #1976d2;
        --clr-blue-pale:   #e8f0fe;
    }

    *, *::before, *::after { box-sizing: border-box; }
    html, body { overflow-x: hidden; max-width: 100%; }

    /* Font global lebih besar & readable */
    body {
        font-family: 'Poppins', sans-serif !important;
        font-size: 15px !important;
        line-height: 1.75 !important;
        color: #1a1a2e !important;
    }
    p, li, td, th, span, a, label, small {
        font-size: 15px;
        line-height: 1.75;
    }
    h1 { font-size: clamp(1.7rem, 3.5vw, 2.4rem) !important; font-weight: 800 !important; }
    h2 { font-size: clamp(1.4rem, 3vw, 2rem)   !important; font-weight: 700 !important; }
    h3 { font-size: clamp(1.2rem, 2.5vw, 1.6rem) !important; font-weight: 700 !important; }
    h4 { font-size: clamp(1.05rem, 2vw, 1.3rem) !important; font-weight: 600 !important; }
    h5 { font-size: clamp(1rem, 1.8vw, 1.15rem) !important; font-weight: 600 !important; }
    h6 { font-size: 1rem !important; font-weight: 600 !important; }

    .container {
        width: 100%;
        padding-right: clamp(12px, 3vw, 24px);
        padding-left:  clamp(12px, 3vw, 24px);
    }
    img  { max-width: 100%; height: auto; }
    .card { max-width: 100%; }
    .table-responsive { -webkit-overflow-scrolling: touch; }

    /* Hapus gap putih antara header dan konten */
    #main, main#main { margin-top: 0 !important; padding-top: 0 !important; }
    .content { background: transparent; }

    /* ---- HEADER ---- */
    #header {
        width: 100% !important;
        left: 0 !important;
        right: 0 !important;
    }
    #header > div { flex-wrap: wrap; gap: 0; }

    /* Navbar dropdown orange accent */
    .navbar .dropdown ul {
        border-top: 3px solid var(--clr-orange) !important;
    }
    .navbar .dropdown ul li a:hover,
    .navbar .dropdown ul li a.active {
        color: var(--clr-orange) !important;
    }
    .navbar a.active,
    .navbar a:hover {
        color: var(--clr-orange) !important;
    }
    /* Garis bawah aktif orange */
    .navbar a.active::before,
    .navbar .active > a::before {
        background: var(--clr-orange) !important;
    }

    /* ---- SECTION HEADER ---- */
    .section-header {
        text-align: center;
        margin-bottom: clamp(24px, 4vw, 40px);
    }
    .section-header p {
        font-size: 13px !important;
        font-weight: 700;
        color: var(--clr-orange);
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 8px;
    }
    .section-header h2 {
        font-size: clamp(1.5rem, 4vw, 2.4rem) !important;
        font-weight: 800 !important;
        color: var(--clr-blue-dark) !important;
        margin: 0;
        line-height: 1.2;
    }

    /* ---- PAGE HEADER ---- */
    .ph-title {
        font-size: clamp(1.2rem, 3.5vw, 2rem);
        line-height: 1.25;
        word-break: break-word;
    }

    /* ---- BREADCRUMB ---- */
    .breadcrumb-item + .breadcrumb-item::before {
        content: "›";
        color: rgba(255,255,255,0.5);
    }
    .breadcrumb-item.active { color: rgba(255,255,255,0.55); }

    /* ---- BACK TO TOP ---- */
    .back-to-top {
        position: fixed;
        bottom: clamp(16px, 3vw, 28px);
        right:  clamp(16px, 3vw, 28px);
        z-index: 9999;
        background: var(--clr-orange) !important;
        color: #fff !important;
        width: 42px; height: 42px; border-radius: 50%;
        box-shadow: 0 4px 14px rgba(244,124,32,0.45);
        transition: background 0.2s, transform 0.2s;
    }
    .back-to-top:hover {
        background: var(--clr-orange-dark) !important;
        transform: translateY(-3px);
    }

    /* ---- ORANGE ACCENTS ---- */
    /* Badge / pill orange */
    .badge-orange {
        background: var(--clr-orange);
        color: #fff;
        padding: 3px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    /* Divider ornament */
    .ornament-divider {
        display: flex; align-items: center; justify-content: center;
        gap: 8px; margin: 10px auto 16px;
    }
    .ornament-divider .line-blue   { height: 3px; width: 48px; background: var(--clr-blue);   border-radius: 3px; }
    .ornament-divider .line-orange { height: 3px; width: 18px; background: var(--clr-orange);  border-radius: 3px; }

    @media (max-width: 576px) {
        .container { padding-right: 16px; padding-left: 16px; }
        .ph-title  { font-size: 1.15rem; }
    }
    </style>

    @yield('style')
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" style="padding:0; position:fixed; top:0; left:0; right:0; z-index:1000; background:#fff; box-shadow:0 2px 16px rgba(1,41,112,0.08);">
        <div style="display:flex; align-items:center; justify-content:space-between; height:64px; padding:0 32px 0 0;">

            <!-- LOGO: pojok kiri — UPT + Pemprov + Disnaker -->
            <a href="{{ route('beranda') }}" style="
                text-decoration:none;
                display:flex;
                align-items:center;
                gap:0;
                height:64px;
                padding: 0 20px;
                border-right: 1px solid rgba(1,41,112,0.08);
                flex-shrink:0;
            ">
                <div style="display:flex; align-items:center; gap:10px;">
                    <!-- Logo Pemprov Jawa Timur -->
                    <img src="{{ asset('asset/img/logo-pemprov-jatim.png') }}"
                         alt="Lambang Pemerintah Provinsi Jawa Timur"
                         style="height:42px; width:auto; flex-shrink:0; object-fit:contain;"
                         title="Pemerintah Provinsi Jawa Timur">
                    <!-- Divider -->
                    <div style="width:1px;height:34px;background:rgba(1,41,112,0.12);"></div>
                    <!-- Logo Disnakertrans Jawa Timur -->
                    <img src="{{ asset('asset/img/logo-disnakertrans-jatim.png') }}"
                         alt="Dinas Tenaga Kerja dan Transmigrasi Provinsi Jawa Timur"
                         style="height:38px; width:auto; flex-shrink:0; object-fit:contain;"
                         title="Disnakertrans Provinsi Jawa Timur">
                    <!-- Divider -->
                    <div style="width:1px;height:34px;background:rgba(1,41,112,0.12);"></div>
                    <!-- Logo UPT -->
                    <img src="{{ asset('asset/img/logo-upt.png') }}" alt="Logo UPT BLP2TK"
                         style="height:32px;width:auto;flex-shrink:0;object-fit:contain;">
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
                    <li class="dropdown">
                        <a href="{{ route('program-kegiatan') }}" class="{{ Request::routeIs('program-kegiatan') ? 'active' : '' }}">
                            <span>Program Kegiatan</span> <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul>
                            <li><a href="{{ route('program-kegiatan') }}">🗂 Semua Program</a></li>
                            <li><a href="{{ route('program-kegiatan') }}?kategori=pelatihan-kerja">🛠 Pelatihan Kerja</a></li>
                            <li><a href="{{ route('program-kegiatan') }}?kategori=peningkatan-produktivitas">📈 Peningkatan Produktivitas</a></li>
                            <li><a href="{{ route('program-kegiatan') }}?kategori=sertifikasi-kompetensi">🎓 Sertifikasi Kompetensi</a></li>
                            <li><a href="{{ route('program-kegiatan') }}?kategori=konsultasi">💬 Konsultasi Produktivitas</a></li>
                            <li><a href="{{ route('program-kegiatan') }}?kategori=magang-industri">🏭 Magang Industri</a></li>
                        </ul>
                    </li>
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

    <div class="content" style="padding-top:64px;">
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
                            <a href="https://www.instagram.com/upt.blp2tk.surabaya" target="_blank" style="
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
                                    Jalan Bendul Merisi No. 2,<br>Wonokromo, Surabaya,<br>Jawa Timur 60244
                                </span>
                            </li>
                            <li style="display:flex; gap:12px; align-items:center;">
                                <i class="bi bi-telephone-fill" style="color:#42a5f5; font-size:15px; flex-shrink:0;"></i>
                                <a href="tel:+62319985187" style="font-size:13px; color:#8fa3be; text-decoration:none;"
                                   onmouseover="this.style.color='#42a5f5'" onmouseout="this.style.color='#8fa3be'">
                                    (031) 99851817
                                </a>
                            </li>
                            <li style="display:flex; gap:12px; align-items:center;">
                                <i class="bi bi-envelope-fill" style="color:#42a5f5; font-size:15px; flex-shrink:0;"></i>
                                <a href="mailto:uptpptkjatim@gmail.com" style="font-size:13px; color:#8fa3be; text-decoration:none; word-break:break-all;"
                                   onmouseover="this.style.color='#42a5f5'" onmouseout="this.style.color='#8fa3be'">
                                    uptpptkjatim@gmail.com
                                </a>
                            </li>
                            <li style="display:flex; gap:12px; align-items:center;">
                                <i class="bi bi-instagram" style="color:#42a5f5; font-size:15px; flex-shrink:0;"></i>
                                <a href="https://www.instagram.com/upt.blp2tk.surabaya" target="_blank"
                                   style="font-size:13px; color:#8fa3be; text-decoration:none;"
                                   onmouseover="this.style.color='#42a5f5'" onmouseout="this.style.color='#8fa3be'">
                                    @upt.blp2tk.surabaya
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
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.6872743508!2d112.72694397499!3d-7.315909292682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb6b0b3b3b3b%3A0x0!2sJl.+Bendul+Merisi+No.2%2C+Jagir%2C+Kec.+Wonokromo%2C+Kota+Surabaya%2C+Jawa+Timur+60244!5e0!3m2!1sid!2sid!4v1709900000000!5m2!1sid!2sid"
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
