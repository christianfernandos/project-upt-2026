@extends('partials.front')
@section('title', 'Program Kegiatan - UPT BLP2TK Surabaya')
@section('content')
<main id="main">

    @include('partials._page-header', [
        'title'       => 'Program Kegiatan',
        'subtitle'    => $labelKategori,
        'icon'        => 'bi-calendar2-event-fill',
        'gradient'    => 'linear-gradient(135deg, #1a237e 0%, #1565c0 100%)',
        'breadcrumbs' => [
            ['label' => 'Beranda', 'url' => route('beranda')],
            ['label' => 'Program Kegiatan', 'url' => route('program-kegiatan')],
            ['label' => $labelKategori, 'url' => '#'],
        ],
    ])

    <!-- ======= Filter Tab Kategori ======= -->
    <section style="background:#f8f9fc; border-bottom:1px solid #e8eaf0; padding:0;">
        <div class="container">
            <div style="display:flex; flex-wrap:wrap; gap:4px; padding:14px 0;">
                @php
                $tabs = [
                    ''                          => ['label' => 'Semua Program',          'icon' => 'bi-grid-fill'],
                    'pelatihan-kerja'           => ['label' => 'Pelatihan Kerja',         'icon' => 'bi-tools'],
                    'peningkatan-produktivitas' => ['label' => 'Peningkatan Produktivitas','icon' => 'bi-graph-up-arrow'],
                    'sertifikasi-kompetensi'    => ['label' => 'Sertifikasi Kompetensi',  'icon' => 'bi-award-fill'],
                    'konsultasi'                => ['label' => 'Konsultasi Produktivitas','icon' => 'bi-chat-dots-fill'],
                    'magang-industri'           => ['label' => 'Magang Industri',         'icon' => 'bi-building'],
                ];
                @endphp
                @foreach($tabs as $slug => $tab)
                @php $isActive = ($aktifKategori === $slug) || ($slug === '' && !$aktifKategori); @endphp
                <a href="{{ $slug ? route('program-kegiatan').'?kategori='.$slug : route('program-kegiatan') }}"
                   style="
                       display:inline-flex; align-items:center; gap:6px;
                       padding:8px 18px; border-radius:25px; font-size:13px; font-weight:600;
                       text-decoration:none; transition:all 0.2s;
                       {{ $isActive
                           ? 'background:linear-gradient(135deg,#1a237e,#1565c0); color:#fff; box-shadow:0 4px 12px rgba(21,101,192,0.35);'
                           : 'background:#fff; color:#555; border:1px solid #dde3f0;' }}
                   "
                   onmouseover="if(!this.dataset.active){ this.style.background='#e8f0fe'; this.style.color='#1a237e'; }"
                   onmouseout="if(!this.dataset.active){ this.style.background='#fff'; this.style.color='#555'; }"
                   {{ $isActive ? 'data-active=true' : '' }}>
                    <i class="bi {{ $tab['icon'] }}" style="font-size:14px;"></i>
                    {{ $tab['label'] }}
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ======= Daftar Program ======= -->
    @php
    $cardStyles = [
        'pelatihan-kerja'           => ['gradient' => 'linear-gradient(135deg, #1a237e 0%, #1565c0 100%)', 'icon' => 'bi-tools',             'badge_bg' => '#e8eaf6', 'badge_clr' => '#3949ab'],
        'peningkatan-produktivitas' => ['gradient' => 'linear-gradient(135deg, #1b5e20 0%, #388e3c 100%)', 'icon' => 'bi-graph-up-arrow',    'badge_bg' => '#e8f5e9', 'badge_clr' => '#2e7d32'],
        'sertifikasi-kompetensi'    => ['gradient' => 'linear-gradient(135deg, #4a148c 0%, #7b1fa2 100%)', 'icon' => 'bi-award-fill',        'badge_bg' => '#f3e5f5', 'badge_clr' => '#6a1b9a'],
        'konsultasi'                => ['gradient' => 'linear-gradient(135deg, #e65100 0%, #f47c20 100%)', 'icon' => 'bi-chat-dots-fill',    'badge_bg' => '#fff3e0', 'badge_clr' => '#e65100'],
        'magang-industri'           => ['gradient' => 'linear-gradient(135deg, #006064 0%, #00838f 100%)', 'icon' => 'bi-building',          'badge_bg' => '#e0f7fa', 'badge_clr' => '#00695c'],
    ];
    $defaultStyle = ['gradient' => 'linear-gradient(135deg, #37474f 0%, #607d8b 100%)', 'icon' => 'bi-briefcase-fill', 'badge_bg' => '#eceff1', 'badge_clr' => '#455a64'];
    @endphp

    <section class="py-5">
        <div class="container" data-aos="fade-up">

            {{-- Judul Seksi --}}
            <div style="margin-bottom:32px;">
                <h4 style="font-weight:700; color:#1a237e; font-size:20px; margin:0 0 4px;">
                    {{ $labelKategori }}
                </h4>
                <p style="color:#888; font-size:13.5px; margin:0;">
                    Menampilkan <strong>{{ $programList->count() }}</strong> program
                    @if($aktifKategori) dalam kategori ini @else secara keseluruhan @endif
                </p>
            </div>

            <div class="row gy-4">
                @forelse($programList as $program)
                @php
                    $style = $cardStyles[$program->kategori] ?? $defaultStyle;
                    $labelKat = $kategoriMap[$program->kategori] ?? ucwords(str_replace('-',' ',$program->kategori));
                @endphp
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 6) * 80 }}">
                    <div class="card h-100 border-0 shadow-sm" style="border-radius:16px;overflow:hidden;transition:all 0.3s;"
                         onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 16px 48px rgba(0,0,0,0.13)'"
                         onmouseout="this.style.transform='translateY(0)';this.style.boxShadow=''">

                        {{-- Header kartu --}}
                        @if($program->foto && file_exists(public_path('images/program/' . $program->foto)))
                            <img src="{{ asset('images/program/' . $program->foto) }}"
                                 class="card-img-top" style="height:200px;object-fit:cover;"
                                 alt="{{ $program->nama_kegiatan }}">
                        @else
                            <div style="height:170px;background:{{ $style['gradient'] }};display:flex;flex-direction:column;align-items:center;justify-content:center;gap:12px;position:relative;overflow:hidden;">
                                <div style="position:absolute;top:-30px;right:-30px;width:110px;height:110px;border-radius:50%;background:rgba(255,255,255,0.07);pointer-events:none;"></div>
                                <div style="position:absolute;bottom:-20px;left:-20px;width:75px;height:75px;border-radius:50%;background:rgba(255,255,255,0.06);pointer-events:none;"></div>
                                <div style="width:58px;height:58px;border-radius:16px;background:rgba(255,255,255,0.15);display:flex;align-items:center;justify-content:center;border:1px solid rgba(255,255,255,0.2);">
                                    <i class="bi {{ $style['icon'] }}" style="font-size:1.7rem;color:#fff;"></i>
                                </div>
                                <span style="font-size:10px;font-weight:700;color:rgba(255,255,255,0.82);letter-spacing:1.5px;text-transform:uppercase;">{{ $labelKat }}</span>
                            </div>
                        @endif

                        {{-- Body kartu --}}
                        <div class="card-body d-flex flex-column" style="padding:20px 22px;">
                            {{-- Badge kategori --}}
                            <div style="margin-bottom:10px; display:flex; align-items:center; gap:8px; flex-wrap:wrap;">
                                <span style="display:inline-block;background:{{ $style['badge_bg'] }};color:{{ $style['badge_clr'] }};font-size:10px;font-weight:700;padding:3px 11px;border-radius:12px;text-transform:uppercase;letter-spacing:0.5px;">
                                    {{ $labelKat }}
                                </span>
                                @if($program->durasi)
                                <span style="display:inline-flex;align-items:center;gap:4px;font-size:10.5px;color:#888;">
                                    <i class="bi bi-clock" style="font-size:11px;"></i>{{ $program->durasi }}
                                </span>
                                @endif
                            </div>

                            {{-- Nama program --}}
                            <h5 class="card-title fw-bold" style="font-size:14.5px;color:#1a1a2e;line-height:1.45;margin-bottom:8px;">
                                {{ $program->nama_kegiatan }}
                            </h5>

                            {{-- Target peserta --}}
                            @if($program->peserta_target)
                            <p style="font-size:12px;color:#1565c0;font-weight:600;margin-bottom:8px;display:flex;align-items:flex-start;gap:5px;">
                                <i class="bi bi-people-fill" style="margin-top:2px;flex-shrink:0;"></i>
                                {{ $program->peserta_target }}
                            </p>
                            @endif

                            {{-- Narasi --}}
                            <p class="card-text text-muted mt-auto" style="font-size:13px; line-height:1.75;margin:0;">
                                {{ Str::limit(strip_tags($program->narasi), 180) }}
                            </p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5 text-muted">
                    <i class="bi bi-calendar-x fs-1 d-block mb-3 text-secondary"></i>
                    <h5 style="color:#888;">Belum ada program dalam kategori ini.</h5>
                    <p style="font-size:14px;">
                        <a href="{{ route('program-kegiatan') }}" style="color:#1565c0;">Lihat semua program →</a>
                    </p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

</main>
@endsection
