@extends('partials.front')
@section('title', 'UPT Balai Latihan Pengembangan Produktivitas Tenaga Kerja Surabaya')
@section('content')

{{-- ============================================================ HERO SLIDER ============================================================ --}}
@php
    $slides = isset($heroSlides) && $heroSlides->count() > 0 ? $heroSlides : collect([]);
    $slideImages = $slides->pluck('foto')->toArray();
@endphp

{{-- Data gambar untuk JS --}}
<script>
    var heroImages = @json(array_map(fn($f) => asset('images/hero/'.$f), $slideImages));
</script>

<section id="hero" style="
    height: calc(100vh - 64px);
    min-height: 560px;
    position: relative;
    overflow: hidden;
    background-image: url('{{ $slides->count() > 0 ? asset('images/hero/'.$slides->first()->foto) : '' }}');
    background-size: cover;
    background-position: center center;
    background-color: #0d1b4b;
    transition: background-image 0s;
">
    {{-- Overlay gelap --}}
    <div id="heroOverlay" style="position:absolute;top:0;left:0;right:0;bottom:0;background:linear-gradient(120deg,rgba(5,10,40,0.78) 0%,rgba(10,25,80,0.55) 55%,rgba(0,0,0,0.30) 100%);z-index:1;"></div>

    {{-- ===== KONTEN TEKS (overlay di atas semua slide) ===== --}}
    <div style="position:relative;z-index:10;height:100%;display:flex;align-items:center;padding:clamp(40px,8vw,80px) 0;">
        <div class="container">
            <div class="row align-items-center gy-5">

            {{-- Teks --}}
            <div class="col-lg-7 col-xl-6" data-aos="fade-right">

                {{-- Judul utama (statis UPT) --}}
                <div style="font-family:'Poppins',sans-serif;font-size:clamp(1.1rem,2.5vw,1.5rem);font-weight:700;color:rgba(255,255,255,0.85);line-height:1.3;margin-bottom:4px;">
                    UPT Balai Latihan Pengembangan Produktivitas
                </div>
                <div style="font-family:'Poppins',sans-serif;font-size:clamp(2.2rem,5.5vw,3.8rem);font-weight:900;color:#fff;line-height:1.1;margin-bottom:12px;">
                    Tenaga Kerja Surabaya
                </div>

                {{-- Judul slide dinamis --}}
                <h2 id="heroSlideTitle"
                    style="font-family:'Poppins',sans-serif;font-size:clamp(1rem,2.2vw,1.35rem);font-weight:700;
                           color:#f47c20;line-height:1.4;margin-bottom:6px;min-height:1.4em;
                           transition:opacity 0.4s ease;">
                    {{ $slides->count() > 0 ? $slides->first()->judul : 'Pelatihan Berbasis Kompetensi' }}
                </h2>
                <p id="heroSlideSubtitle"
                   style="font-size:clamp(13px,1.5vw,15.5px);color:rgba(255,255,255,0.72);
                          line-height:1.8;margin-bottom:32px;max-width:520px;min-height:2em;
                          transition:opacity 0.4s ease;">
                    {{ $slides->count() > 0 ? $slides->first()->subjudul : 'Meningkatkan kualitas dan kompetensi sumber daya manusia agar mampu bersaing di pasar tenaga kerja.' }}
                </p>

                <div style="display:flex;flex-wrap:wrap;gap:14px;">
                    <a href="{{ route('program-kegiatan') }}" style="display:inline-flex;align-items:center;gap:8px;background:#fff;color:#1a237e;font-weight:700;font-size:14px;padding:13px 28px;border-radius:30px;text-decoration:none;transition:all 0.25s;box-shadow:0 6px 24px rgba(0,0,0,0.2);"
                       onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                        <i class="bi bi-calendar2-check"></i> Program Kami
                    </a>
                    <a href="#about" style="display:inline-flex;align-items:center;gap:8px;background:transparent;color:#fff;font-weight:600;font-size:14px;padding:13px 28px;border-radius:30px;text-decoration:none;border:2px solid rgba(255,255,255,0.4);transition:all 0.25s;"
                       onmouseover="this.style.borderColor='#fff';this.style.background='rgba(255,255,255,0.1)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.4)';this.style.background='transparent'">
                        <i class="bi bi-info-circle"></i> Tentang Kami
                    </a>
                </div>
            </div>

            {{-- Ilustrasi --}}
            <div class="col-lg-5 col-xl-6 text-center d-none d-lg-block" data-aos="fade-left" data-aos-delay="200">
                <div style="display:inline-flex;flex-direction:column;align-items:center;gap:20px;position:relative;">
                    {{-- Lingkaran dekoratif --}}
                    <div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:clamp(280px,38vw,460px);height:clamp(280px,38vw,460px);border-radius:50%;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.12);pointer-events:none;"></div>
                    <div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:clamp(180px,26vw,320px);height:clamp(180px,26vw,320px);border-radius:50%;background:rgba(255,255,255,0.07);pointer-events:none;"></div>

                    {{-- Floating card 1 — di atas logo --}}

                    {{-- Logo utama --}}
                    <div style="position:relative;z-index:2;">
                        <img src="{{ asset('asset/img/logo-blp2tk.png') }}" alt="Logo BLP2TK"
                             style="max-width:clamp(200px,28vw,360px);width:100%;display:block;
                                    mix-blend-mode:normal;
                                    filter:
                                        drop-shadow(0 0 8px rgba(255,255,255,0.95))
                                        drop-shadow(0 0 20px rgba(255,255,255,0.85))
                                        drop-shadow(0 0 40px rgba(255,255,255,0.65))
                                        drop-shadow(0 0 70px rgba(100,181,246,0.60))
                                        drop-shadow(0 10px 30px rgba(0,0,0,0.50))
                                        brightness(1.12)
                                        contrast(1.08);
                                    ">
                    </div>

                    {{-- Floating card 2 — di bawah logo --}}
                </div>
            </div>
        </div>{{-- /row --}}
        </div>{{-- /container --}}
    </div>{{-- /konten overlay --}}

    {{-- ===== NAVIGASI PANAH ===== --}}
    {{-- dihapus --}}

    {{-- ===== DOTS ===== --}}
    <div style="position:absolute;bottom:32px;left:50%;transform:translateX(-50%);display:flex;gap:8px;z-index:20;" id="heroDots">
        @foreach($slides as $i => $sl)
        <button onclick="heroGoTo({{ $i }})"
            id="heroDot{{ $i }}"
            aria-label="Slide {{ $i+1 }}"
            style="
                width:{{ $i===0 ? '28px' : '10px' }};height:10px;border-radius:6px;border:none;padding:0;cursor:pointer;transition:all 0.35s;
                background:{{ $i===0 ? '#fff' : 'rgba(255,255,255,0.4)' }};
        "></button>
        @endforeach
    </div>

    {{-- ===== PROGRESS BAR ===== --}}
    <div style="position:absolute;bottom:0;left:0;right:0;height:3px;background:rgba(255,255,255,0.15);z-index:20;">
        <div id="heroProgress" style="height:100%;background:#64b5f6;width:0%;transition:width 5s linear;"></div>
    </div>

    {{-- ===== TEKS SLIDE DINAMIS (judul & subjudul dari DB) ===== --}}
    @if($slides->count() > 0)
    <div id="heroSlideTexts" style="display:none;">
        @foreach($slides as $sl)
        <div data-index="{{ $loop->index }}"
             data-judul="{{ $sl->judul }}"
             data-subjudul="{{ $sl->subjudul }}">
        </div>
        @endforeach
    </div>
    @endif

</section>

<style>
@keyframes floatCard{0%,100%{transform:translateY(0)}50%{transform:translateY(-8px)}}
html{scroll-behavior:smooth;}
</style>

{{-- ===== SCRIPT HERO SLIDER ===== --}}
@push('js')
<script>
(function(){
    var sec      = document.getElementById('hero');
    var progress = document.getElementById('heroProgress');
    var currNum  = document.getElementById('heroCurrentNum');
    var dotsEl   = document.querySelectorAll('[id^="heroDot"]');
    var textItems= document.querySelectorAll('#heroSlideTexts [data-index]');
    var titleEl  = document.getElementById('heroSlideTitle');
    var subEl    = document.getElementById('heroSlideSubtitle');
    var total    = (typeof heroImages !== 'undefined') ? heroImages.length : 0;

    if(!sec || total < 1) return;

    var current = 0, timer, preloaded = {};

    // Preload all images
    heroImages.forEach(function(src, i){
        var img = new Image();
        img.src = src;
        preloaded[i] = src;
    });

    function goTo(n){
        current = ((n % total) + total) % total;

        // Ganti background-image section dengan fade
        sec.style.opacity = '0.6';
        sec.style.transition = 'opacity 0.3s ease';
        setTimeout(function(){
            sec.style.backgroundImage = "url('" + heroImages[current] + "')";
            sec.style.opacity = '1';
        }, 300);

        // Dots
        dotsEl.forEach(function(d, i){
            d.style.width      = i === current ? '28px' : '10px';
            d.style.background = i === current ? '#fff' : 'rgba(255,255,255,0.4)';
        });

        // Counter
        if(currNum) currNum.textContent = current + 1;

        // Teks dinamis
        if(textItems.length && titleEl && subEl){
            textItems.forEach(function(t){
                if(parseInt(t.dataset.index) === current){
                    titleEl.style.opacity = '0';
                    subEl.style.opacity   = '0';
                    setTimeout(function(){
                        titleEl.textContent  = t.dataset.judul    || '';
                        subEl.textContent    = t.dataset.subjudul || '';
                        titleEl.style.opacity = '1';
                        subEl.style.opacity   = '1';
                    }, 250);
                }
            });
        }

        startProgress();
    }

    function startProgress(){
        if(!progress) return;
        progress.style.transition = 'none';
        progress.style.width      = '0%';
        void progress.offsetWidth;
        progress.style.transition = 'width 5s linear';
        progress.style.width      = '100%';
    }

    function autoPlay(){ timer = setInterval(function(){ goTo(current + 1); }, 5000); }
    function reset(){ clearInterval(timer); autoPlay(); }

    window.heroSlide = function(d){ goTo(current + d); reset(); };
    window.heroGoTo  = function(n){ goTo(n); reset(); };

    // Touch/swipe support
    var sx = 0;
    sec.addEventListener('touchstart', function(e){ sx = e.touches[0].clientX; }, {passive:true});
    sec.addEventListener('touchend',   function(e){
        var dx = sx - e.changedTouches[0].clientX;
        if(Math.abs(dx) > 40) heroSlide(dx > 0 ? 1 : -1);
    });

    startProgress();
    autoPlay();
})();
</script>
@endpush

<main id="main">

{{-- ============================================================ LAYANAN UNGGULAN ============================================================ --}}
<section style="background:#f8f9ff;padding:clamp(48px,7vw,80px) 0;">
    <div class="container" data-aos="fade-up">
        <div class="text-center mb-5">
            <span style="background:#e8f0fe;color:#1a73e8;font-size:11px;font-weight:700;padding:5px 16px;border-radius:20px;text-transform:uppercase;letter-spacing:1px;">Layanan Kami</span>
            <h2 style="font-family:'Poppins',sans-serif;font-size:clamp(1.4rem,3vw,2rem);font-weight:800;color:#1a1a2e;margin:12px 0 8px;">Apa yang Kami Tawarkan?</h2>
            <p style="color:#666;font-size:clamp(13px,1.4vw,15px);max-width:520px;margin:0 auto;">Layanan pelatihan dan pengembangan produktivitas tenaga kerja secara profesional dan terstandar</p>
        </div>
        <div class="row g-4">
            @php
            $defaultServices = [
                ['icon'=>'bi-mortarboard-fill','color'=>'#1a237e','bg'=>'#e8f0fe','title'=>'Pelatihan Berbasis Kompetensi','desc'=>'Program pelatihan terstruktur sesuai Standar Kompetensi Kerja Nasional Indonesia (SKKNI) di berbagai bidang kejuruan.'],
                ['icon'=>'bi-graph-up-arrow','color'=>'#1b5e20','bg'=>'#e8f5e9','title'=>'Pengukuran Produktivitas','desc'=>'Pengukuran dan analisis produktivitas tenaga kerja perusahaan dengan metode ilmiah untuk mengoptimalkan efisiensi.'],
                ['icon'=>'bi-patch-check-fill','color'=>'#e65100','bg'=>'#fff3e0','title'=>'Sertifikasi Kompetensi','desc'=>'Fasilitasi uji kompetensi dan sertifikasi resmi bagi tenaga kerja melalui Lembaga Sertifikasi Profesi (LSP) berlisensi.'],
                ['icon'=>'bi-people-fill','color'=>'#4a148c','bg'=>'#f3e5f5','title'=>'Konsultasi & Bimbingan','desc'=>'Layanan konsultasi dan bimbingan teknis peningkatan produktivitas untuk perusahaan dan lembaga mitra.'],
                ['icon'=>'bi-laptop','color'=>'#006064','bg'=>'#e0f7fa','title'=>'Pelatihan Digital','desc'=>'Program pelatihan teknologi informasi dan keterampilan digital untuk menghadapi era industri 4.0.'],
                ['icon'=>'bi-building','color'=>'#b71c1c','bg'=>'#fce4ec','title'=>'Kerjasama Perusahaan','desc'=>'Program magang, rekrutmen, dan kerjasama pelatihan langsung dengan perusahaan dan industri mitra.'],
            ];
            $services = (isset($profil) && is_array($profil->layanan) && count($profil->layanan) > 0)
                ? $profil->layanan
                : $defaultServices;
            @endphp
            @foreach($services as $i => $svc)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($i%3)*100 }}">
                <div class="h-100 p-4" style="background:#fff;border-radius:18px;box-shadow:0 2px 20px rgba(0,0,0,0.06);border:1px solid rgba(0,0,0,0.04);transition:all 0.3s;"
                     onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 12px 40px rgba(0,0,0,0.12)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 2px 20px rgba(0,0,0,0.06)'">
                    <div style="width:52px;height:52px;border-radius:14px;background:{{ $svc['bg'] }};display:flex;align-items:center;justify-content:center;margin-bottom:18px;">
                        <i class="bi {{ $svc['icon'] }}" style="font-size:1.5rem;color:{{ $svc['color'] }};"></i>
                    </div>
                    <h5 style="font-weight:800;color:#1a1a2e;font-size:15px;margin-bottom:10px;">{{ $svc['title'] }}</h5>
                    <p style="font-size:13.5px;color:#666;line-height:1.75;margin:0;">{{ $svc['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================ TENTANG UPT ============================================================ --}}
@php
    $tentangJudul    = $profil->tentang_judul    ?? 'Pusat Pelatihan & Pengembangan';
    $tentangSubjudul = $profil->tentang_subjudul ?? 'Produktivitas Tenaga Kerja';
    $tentangDesc1    = $profil->tentang_deskripsi_1 ?? '<b>UPT Balai Latihan Pengembangan Produktivitas Tenaga Kerja (BLP2TK) Surabaya</b> adalah unit pelaksana teknis di bawah Dinas Tenaga Kerja Kota Surabaya yang bertugas memberikan pelatihan, bimbingan, dan pengembangan produktivitas kepada tenaga kerja di wilayah Surabaya dan sekitarnya.';
    $tentangDesc2    = $profil->tentang_deskripsi_2 ?? 'Kami berkomitmen meningkatkan kualitas dan kompetensi SDM agar mampu bersaing di pasar tenaga kerja nasional maupun global melalui program pelatihan berbasis SKKNI yang terstandar.';
    $tentangFitur    = (is_array($profil->tentang_fitur) && count($profil->tentang_fitur) > 0)
        ? $profil->tentang_fitur
        : ['Pelatihan bersertifikat SKKNI oleh instruktur berpengalaman','Fasilitas workshop dan laboratorium lengkap','Program magang dan penempatan kerja','Konsultasi produktivitas gratis untuk peserta'];
    $fotoTentang     = $profil->foto_tentang ?? null;
@endphp
<section id="about" style="background:#fff;padding:clamp(56px,8vw,96px) 0;">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <div style="position:relative;">
                    @if($fotoTentang && file_exists(public_path('images/profil/'.$fotoTentang)))
                        <img src="{{ asset('images/profil/'.$fotoTentang) }}" alt="UPT BLP2TK Surabaya"
                             style="width:100%;border-radius:24px;box-shadow:0 20px 60px rgba(0,0,0,0.12);object-fit:cover;max-height:400px;">
                    @else
                        <img src="{{ asset('asset/img/about.jpg') }}" alt="UPT BLP2TK Surabaya"
                             style="width:100%;border-radius:24px;box-shadow:0 20px 60px rgba(0,0,0,0.12);object-fit:cover;max-height:400px;"
                             onerror="this.parentNode.querySelector('.fallback-about').style.display='flex';this.style.display='none'">
                        <div class="fallback-about" style="display:none;width:100%;height:360px;border-radius:24px;background:linear-gradient(135deg,#1a237e,#1565c0);align-items:center;justify-content:center;flex-direction:column;gap:16px;">
                            <i class="bi bi-building-fill" style="font-size:5rem;color:rgba(255,255,255,0.5);"></i>
                            <span style="color:rgba(255,255,255,0.7);font-weight:700;font-size:14px;letter-spacing:1px;">UPT BLP2TK SURABAYA</span>
                        </div>
                    @endif
                    <div style="position:absolute;bottom:-24px;right:-20px;background:#fff;border-radius:18px;padding:16px 20px;box-shadow:0 12px 40px rgba(0,0,0,0.15);display:flex;align-items:center;gap:12px;min-width:200px;">
                        <div style="width:46px;height:46px;border-radius:12px;background:#e8f5e9;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="bi bi-patch-check-fill" style="color:#2e7d32;font-size:22px;"></i>
                        </div>
                        <div><div style="font-size:11px;color:#888;">Terakreditasi</div><div style="font-size:13px;font-weight:800;color:#1a237e;">Resmi Pemerintah</div></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 ps-lg-5" data-aos="fade-left" data-aos-delay="150">
                <span style="background:#e8f0fe;color:#1a73e8;font-size:11px;font-weight:700;padding:5px 16px;border-radius:20px;text-transform:uppercase;letter-spacing:1px;">Tentang Kami</span>
                <h2 style="font-family:'Poppins',sans-serif;font-size:clamp(1.4rem,3vw,2rem);font-weight:800;color:#1a1a2e;margin:16px 0 16px;">
                    {{ $tentangJudul }}<br>
                    <span style="color:#1565c0;">{{ $tentangSubjudul }}</span>
                </h2>
                <p style="color:#555;font-size:clamp(13.5px,1.4vw,15px);line-height:1.85;margin-bottom:16px;">{!! $tentangDesc1 !!}</p>
                <p style="color:#555;font-size:clamp(13.5px,1.4vw,15px);line-height:1.85;margin-bottom:28px;">{{ $tentangDesc2 }}</p>
                <div style="display:flex;flex-direction:column;gap:12px;margin-bottom:32px;">
                    @foreach($tentangFitur as $item)
                    <div style="display:flex;align-items:flex-start;gap:12px;">
                        <div style="width:22px;height:22px;border-radius:50%;background:#e8f5e9;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:1px;">
                            <i class="bi bi-check-lg" style="color:#2e7d32;font-size:12px;"></i>
                        </div>
                        <span style="font-size:clamp(13px,1.3vw,14.5px);color:#444;">{{ $item }}</span>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('profil.struktur') }}" style="display:inline-flex;align-items:center;gap:8px;background:linear-gradient(135deg,#1a237e,#1565c0);color:#fff;font-weight:700;font-size:14px;padding:13px 28px;border-radius:30px;text-decoration:none;box-shadow:0 6px 20px rgba(21,101,192,0.35);transition:all 0.25s;"
                   onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                    Profil Kami <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================ KEUNGGULAN ============================================================ --}}
@php
    $keunggulanList = (is_array($profil->keunggulan) && count($profil->keunggulan) > 0)
        ? $profil->keunggulan
        : [
            ['icon'=>'bi-person-check-fill','title'=>'Instruktur Bersertifikat','desc'=>'Semua instruktur merupakan tenaga ahli bersertifikat kompetensi nasional dengan pengalaman industri nyata.'],
            ['icon'=>'bi-tools',            'title'=>'Fasilitas Modern',        'desc'=>'Workshop, laboratorium komputer, ruang kelas ber-AC, dan peralatan praktik sesuai standar industri terkini.'],
            ['icon'=>'bi-shield-check',     'title'=>'Kurikulum Terstandar',    'desc'=>'Kurikulum mengacu pada SKKNI dan kebutuhan dunia industri yang terus diperbarui secara berkala.'],
            ['icon'=>'bi-briefcase-fill',   'title'=>'Jaringan Industri Luas',  'desc'=>'Kerjasama dengan ratusan perusahaan di Surabaya dan Jawa Timur untuk penempatan alumni peserta.'],
          ];
    $colClass = count($keunggulanList) <= 3 ? 'col-md-6 col-lg-4' : 'col-md-6 col-lg-3';
@endphp
<section style="background:linear-gradient(135deg,#1a237e 0%,#1565c0 100%);padding:clamp(56px,7vw,88px) 0;position:relative;overflow:hidden;">
    <div aria-hidden="true" style="position:absolute;top:-80px;right:-80px;width:320px;height:320px;border-radius:50%;background:rgba(255,255,255,0.04);pointer-events:none;"></div>
    <div class="container" data-aos="fade-up">
        <div class="text-center mb-5">
            <span style="background:rgba(255,255,255,0.15);color:rgba(255,255,255,0.9);font-size:11px;font-weight:700;padding:5px 16px;border-radius:20px;text-transform:uppercase;letter-spacing:1px;">Keunggulan</span>
            <h2 style="font-family:'Poppins',sans-serif;font-size:clamp(1.4rem,3vw,2rem);font-weight:800;color:#fff;margin:12px 0 8px;">Mengapa Memilih UPT BLP2TK?</h2>
            <p style="color:rgba(255,255,255,0.7);font-size:clamp(13px,1.4vw,15px);">Kepercayaan ribuan tenaga kerja dan perusahaan menjadi bukti komitmen kami</p>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($keunggulanList as $i => $w)
            <div class="{{ $colClass }}" data-aos="fade-up" data-aos-delay="{{ $i*100 }}">
                <div style="text-align:center;padding:32px 20px;">
                    <div style="width:64px;height:64px;border-radius:18px;background:rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center;margin:0 auto 20px;border:1px solid rgba(255,255,255,0.15);">
                        <i class="bi {{ $w['icon'] }}" style="font-size:1.8rem;color:#64b5f6;"></i>
                    </div>
                    <h5 style="font-weight:800;color:#fff;font-size:15px;margin-bottom:10px;">{{ $w['title'] }}</h5>
                    <p style="font-size:13.5px;color:rgba(255,255,255,0.65);line-height:1.75;margin:0;">{{ $w['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================ BERITA TERBARU ============================================================ --}}
@php
$slideColors=['linear-gradient(135deg,#1a237e 0%,#0d47a1 50%,#1565c0 100%)','linear-gradient(135deg,#1b5e20 0%,#2e7d32 50%,#388e3c 100%)','linear-gradient(135deg,#4a148c 0%,#6a1b9a 50%,#7b1fa2 100%)','linear-gradient(135deg,#b71c1c 0%,#c62828 50%,#d32f2f 100%)','linear-gradient(135deg,#e65100 0%,#ef6c00 50%,#f57c00 100%)'];
$slideIcons=['bi-award-fill','bi-people-fill','bi-gear-fill','bi-building','bi-journal-richtext'];
@endphp
<section style="background:#ffffff;padding:clamp(56px,7vw,88px) 0;">
    <div class="container" data-aos="fade-up">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-5">
            <div>
                <span style="background:#e8f0fe;color:#1a73e8;font-size:11px;font-weight:700;padding:5px 16px;border-radius:20px;text-transform:uppercase;letter-spacing:1px;">Informasi</span>
                <h2 style="font-family:'Poppins',sans-serif;font-size:clamp(1.4rem,3vw,2rem);font-weight:800;color:#1a1a2e;margin:12px 0 0;">Berita Terbaru</h2>
            </div>
            <a href="{{ route('berita') }}" style="display:inline-flex;align-items:center;gap:6px;color:#1565c0;font-weight:700;font-size:14px;text-decoration:none;white-space:nowrap;">Lihat Semua <i class="bi bi-arrow-right"></i></a>
        </div>

        @if($beritaTerbaru->count() > 0)
        <div class="bs-wrapper" id="beritaSliderWrapper">
            <div class="bs-track" id="beritaTrack">
                @foreach($beritaTerbaru as $i => $berita)
                <div class="bs-slide" data-index="{{ $i }}">
                    <div class="bs-img-col">
                        @if($berita->foto && file_exists(public_path('images/berita/' . $berita->foto)))
                            <img src="{{ asset('images/berita/' . $berita->foto) }}" alt="{{ $berita->judul }}" class="bs-img">
                        @else
                            <div class="bs-img-placeholder" style="background:{{ $slideColors[$i%5] }}">
                                <i class="bi {{ $slideIcons[$i%5] }} bs-placeholder-icon"></i>
                                <span class="bs-placeholder-label">UPT BLP2TK Surabaya</span>
                            </div>
                        @endif
                    </div>
                    <div class="bs-content-col">
                        <div class="bs-tag"><i class="bi bi-newspaper me-1"></i> Berita</div>
                        <div class="bs-date"><i class="bi bi-calendar3 me-1"></i>{{ $berita->created_at->format('d F Y') }}</div>
                        <h3 class="bs-title">{{ $berita->judul }}</h3>
                        <p class="bs-excerpt">{{ Str::limit(strip_tags($berita->narasi), 200, '...') }}</p>
                        <a href="{{ route('berita.show', $berita->id) }}" class="bs-readmore">Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="bs-nav bs-prev" onclick="bsSlide(-1)" aria-label="Sebelumnya"><i class="bi bi-chevron-left"></i></button>
            <button class="bs-nav bs-next" onclick="bsSlide(1)"  aria-label="Berikutnya"><i class="bi bi-chevron-right"></i></button>
            <div class="bs-dots">
                @foreach($beritaTerbaru as $i => $berita)
                    <button class="bs-dot {{ $i===0?'active':'' }}" onclick="bsGoTo({{ $i }})" aria-label="Slide {{ $i+1 }}"></button>
                @endforeach
            </div>
            <div class="bs-counter"><span id="bsCurrent">1</span> / {{ $beritaTerbaru->count() }}</div>
            <div class="bs-progress-bar"><div class="bs-progress-fill" id="bsProgress"></div></div>
        </div>
        @else
        <div style="text-align:center;padding:60px 0;color:#aaa;">
            <i class="bi bi-newspaper" style="font-size:4rem;display:block;margin-bottom:12px;"></i>
            Belum ada berita tersedia.
        </div>
        @endif
    </div>
</section>

{{-- ============================================================ CTA BANNER ============================================================ --}}
<section style="background:linear-gradient(135deg,#c0390b 0%,#f47c20 60%,#f9a825 100%);padding:clamp(48px,7vw,80px) 0;position:relative;overflow:hidden;">
    <div aria-hidden="true" style="position:absolute;top:-60px;right:-60px;width:280px;height:280px;border-radius:50%;background:rgba(255,255,255,0.04);pointer-events:none;"></div>
    <div class="container text-center" style="position:relative;z-index:1;" data-aos="fade-up">
        <i class="bi bi-rocket-takeoff-fill" style="font-size:3rem;color:#64b5f6;margin-bottom:20px;display:block;"></i>
        <h2 style="font-family:'Poppins',sans-serif;font-size:clamp(1.4rem,3vw,2rem);font-weight:800;color:#fff;margin-bottom:14px;">Siap Meningkatkan Produktivitas Anda?</h2>
        <p style="color:rgba(255,255,255,0.72);font-size:clamp(13px,1.4vw,15px);max-width:520px;margin:0 auto 32px;line-height:1.8;">
            Bergabunglah dengan ribuan peserta yang telah berhasil meningkatkan kompetensi dan produktivitas kerja bersama UPT BLP2TK Surabaya.
        </p>
        <div style="display:flex;flex-wrap:wrap;gap:14px;justify-content:center;">
            <a href="{{ route('program-kegiatan') }}" style="display:inline-flex;align-items:center;gap:8px;background:#fff;color:#1a237e;font-weight:700;font-size:14px;padding:13px 30px;border-radius:30px;text-decoration:none;box-shadow:0 6px 24px rgba(0,0,0,0.2);transition:all 0.25s;"
               onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                <i class="bi bi-calendar2-check"></i> Lihat Program
            </a>
            <a href="{{ route('kalkulator') }}" style="display:inline-flex;align-items:center;gap:8px;background:transparent;color:#fff;font-weight:600;font-size:14px;padding:13px 30px;border-radius:30px;text-decoration:none;border:2px solid rgba(255,255,255,0.4);transition:all 0.25s;"
               onmouseover="this.style.borderColor='#fff';this.style.background='rgba(255,255,255,0.1)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.4)';this.style.background='transparent'">
                <i class="bi bi-calculator"></i> Kalkulator Produktivitas
            </a>
        </div>
    </div>
</section>

</main>

<style>
.bs-wrapper{position:relative;overflow:hidden;border-radius:20px;box-shadow:0 8px 40px rgba(13,110,253,0.13),0 2px 12px rgba(0,0,0,0.08);background:#fff;margin-bottom:8px;border:1px solid rgba(13,110,253,0.08);}
.bs-track{display:flex;transition:transform 0.6s cubic-bezier(0.25,0.46,0.45,0.94);will-change:transform;}
.bs-slide{min-width:100%;display:flex;flex-direction:row;min-height:420px;}
.bs-img-col{flex:0 0 48%;max-width:48%;overflow:hidden;}
.bs-img{width:100%;height:100%;object-fit:cover;display:block;}
.bs-img-placeholder{width:100%;height:100%;min-height:420px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:16px;}
.bs-placeholder-icon{font-size:5rem;color:rgba(255,255,255,0.75);}
.bs-placeholder-label{color:rgba(255,255,255,0.85);font-size:0.85rem;font-weight:600;letter-spacing:1px;text-transform:uppercase;}
.bs-content-col{flex:0 0 52%;max-width:52%;padding:48px 48px 56px 48px;display:flex;flex-direction:column;justify-content:center;background:#fff;}
.bs-tag{display:inline-flex;align-items:center;background:#e8f0fe;color:#1a73e8;font-size:12px;font-weight:700;padding:5px 14px;border-radius:20px;margin-bottom:12px;width:fit-content;letter-spacing:0.5px;text-transform:uppercase;}
.bs-date{font-size:13px;color:#888;margin-bottom:14px;}
.bs-title{font-size:1.45rem;font-weight:800;color:#1a1a2e;line-height:1.35;margin-bottom:16px;}
.bs-excerpt{font-size:0.93rem;color:#555;line-height:1.75;margin-bottom:28px;flex-grow:1;}
.bs-readmore{display:inline-flex;align-items:center;background:#0d6efd;color:#fff;font-weight:600;font-size:14px;padding:11px 28px;border-radius:30px;text-decoration:none;transition:all 0.25s;width:fit-content;box-shadow:0 4px 16px rgba(13,110,253,0.35);}
.bs-readmore:hover{background:#0b5ed7;color:#fff;transform:translateY(-2px);}
.bs-nav{position:absolute;top:50%;transform:translateY(-50%);z-index:20;width:46px;height:46px;border-radius:50%;border:none;background:#fff;color:#333;font-size:1.1rem;cursor:pointer;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 20px rgba(0,0,0,0.15);transition:all 0.2s;}
.bs-nav:hover{background:#0d6efd;color:#fff;}
.bs-prev{left:16px;}.bs-next{right:16px;}
.bs-dots{position:absolute;bottom:18px;left:50%;transform:translateX(-50%);display:flex;gap:7px;z-index:20;}
.bs-dot{width:9px;height:9px;border-radius:50%;border:2px solid #bbb;background:transparent;cursor:pointer;padding:0;transition:all 0.3s;}
.bs-dot.active{background:#0d6efd;border-color:#0d6efd;transform:scale(1.3);}
.bs-counter{position:absolute;top:16px;right:20px;background:rgba(0,0,0,0.55);color:#fff;font-size:12px;font-weight:700;padding:4px 14px;border-radius:20px;z-index:20;}
.bs-progress-bar{position:absolute;bottom:0;left:0;right:0;height:3px;background:#e0e0e0;z-index:20;}
.bs-progress-fill{height:100%;background:#0d6efd;width:0%;transition:width 5s linear;}
@media(max-width:768px){
    .bs-slide{flex-direction:column;min-height:auto;}
    .bs-img-col,.bs-content-col{flex:0 0 100%;max-width:100%;}
    .bs-img-placeholder{min-height:220px;}
    .bs-content-col{padding:28px 24px 40px;}
    .bs-title{font-size:1.1rem;}
    .bs-excerpt{display:none;}
}
</style>

<script>
(function(){
    const track=document.getElementById('beritaTrack');
    const dots=document.querySelectorAll('.bs-dot');
    const elCurr=document.getElementById('bsCurrent');
    const progress=document.getElementById('bsProgress');
    const total=dots.length;
    let current=0,timer;
    function goTo(n){
        current=(n+total)%total;
        track.style.transform='translateX(-'+(current*100)+'%)';
        dots.forEach((d,i)=>d.classList.toggle('active',i===current));
        if(elCurr)elCurr.textContent=current+1;
        startProgress();
    }
    function startProgress(){
        if(progress){progress.style.transition='none';progress.style.width='0%';void progress.offsetWidth;progress.style.transition='width 5s linear';progress.style.width='100%';}
    }
    function autoPlay(){timer=setInterval(()=>goTo(current+1),5000);}
    function reset(){clearInterval(timer);autoPlay();}
    window.bsSlide=function(d){goTo(current+d);reset();};
    window.bsGoTo=function(n){goTo(n);reset();};
    const wrap=document.getElementById('beritaSliderWrapper');
    if(wrap){let sx=0;wrap.addEventListener('touchstart',e=>{sx=e.touches[0].clientX;});wrap.addEventListener('touchend',e=>{const dx=sx-e.changedTouches[0].clientX;if(Math.abs(dx)>40)bsSlide(dx>0?1:-1);});}
    startProgress();autoPlay();
})();
</script>

@endsection
