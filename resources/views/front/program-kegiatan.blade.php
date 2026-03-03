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
                    <div class="card h-100 border-0 shadow-sm" style="border-radius:16px;overflow:hidden;transition:all 0.3s;cursor:pointer;"
                         onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 16px 48px rgba(0,0,0,0.13)'"
                         onmouseout="this.style.transform='translateY(0)';this.style.boxShadow=''"
                         onclick="bukaModal(this)"
                         data-id="{{ $program->id }}"
                         data-nama="{{ $program->nama_kegiatan }}"
                         data-kategori="{{ $labelKat }}"
                         data-durasi="{{ $program->durasi ?? '' }}"
                         data-peserta="{{ $program->peserta_target ?? '' }}"
                         data-narasi="{{ e($program->narasi) }}"
                         data-gradient="{{ $style['gradient'] }}"
                         data-icon="{{ $style['icon'] }}"
                         data-badge-bg="{{ $style['badge_bg'] }}"
                         data-badge-clr="{{ $style['badge_clr'] }}"
                         data-foto="{{ ($program->foto && file_exists(public_path('images/program/'.$program->foto))) ? asset('images/program/'.$program->foto) : '' }}">

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

                            {{-- Klik hint --}}
                            <div style="margin-top:14px;display:flex;align-items:center;gap:5px;font-size:11.5px;color:#1565c0;font-weight:600;">
                                <i class="bi bi-arrow-right-circle-fill" style="font-size:14px;"></i> Lihat Detail
                            </div>
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

    {{-- ============================================================
         MODAL DETAIL PROGRAM
    ============================================================ --}}
    <div id="modalProgram" style="
        display:none; position:fixed; inset:0; z-index:9999;
        background:rgba(10,20,60,0.55); backdrop-filter:blur(4px);
        align-items:center; justify-content:center; padding:20px;
    " onclick="tutupModal(event)">
        <div id="modalBox" style="
            background:#fff; border-radius:20px; max-width:640px; width:100%;
            max-height:90vh; overflow-y:auto; position:relative;
            box-shadow:0 32px 80px rgba(0,0,0,0.28);
            animation:modalIn 0.25s ease;
        ">
            {{-- Header modal (foto atau gradient) --}}
            <div id="modalHeader" style="height:220px;border-radius:20px 20px 0 0;position:relative;overflow:hidden;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:14px;">
                <div style="position:absolute;top:-40px;right:-40px;width:160px;height:160px;border-radius:50%;background:rgba(255,255,255,0.07);pointer-events:none;"></div>
                <div style="position:absolute;bottom:-30px;left:-30px;width:110px;height:110px;border-radius:50%;background:rgba(255,255,255,0.06);pointer-events:none;"></div>
                <div id="modalHeaderImg" style="display:none;position:absolute;inset:0;">
                    <img id="modalFoto" src="" alt="" style="width:100%;height:100%;object-fit:cover;">
                </div>
                <div id="modalHeaderIcon" style="width:72px;height:72px;border-radius:20px;background:rgba(255,255,255,0.18);display:flex;align-items:center;justify-content:center;border:1.5px solid rgba(255,255,255,0.25);position:relative;z-index:1;">
                    <i id="modalIcon" class="bi" style="font-size:2.2rem;color:#fff;"></i>
                </div>
                <span id="modalKategoriHeader" style="font-size:10.5px;font-weight:700;color:rgba(255,255,255,0.85);letter-spacing:2px;text-transform:uppercase;position:relative;z-index:1;"></span>
            </div>

            {{-- Tombol tutup --}}
            <button onclick="tutupModalBtn()" style="
                position:absolute;top:14px;right:14px;
                width:36px;height:36px;border-radius:50%;border:none;
                background:rgba(255,255,255,0.22);color:#fff;
                display:flex;align-items:center;justify-content:center;
                cursor:pointer;font-size:18px;transition:background 0.2s;z-index:10;
            " onmouseover="this.style.background='rgba(255,255,255,0.38)'"
               onmouseout="this.style.background='rgba(255,255,255,0.22)'">
                <i class="bi bi-x-lg"></i>
            </button>

            {{-- Body modal --}}
            <div style="padding:28px 32px 32px;">
                {{-- Badge + Durasi --}}
                <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin-bottom:16px;">
                    <span id="modalBadge" style="font-size:11px;font-weight:700;padding:4px 14px;border-radius:14px;text-transform:uppercase;letter-spacing:0.5px;"></span>
                    <span id="modalDurasi" style="display:none;align-items:center;gap:5px;font-size:12px;color:#666;background:#f5f5f5;padding:4px 12px;border-radius:12px;">
                        <i class="bi bi-clock" style="font-size:12px;color:#1565c0;"></i>
                        <span id="modalDurasiTxt"></span>
                    </span>
                </div>

                {{-- Nama Program --}}
                <h4 id="modalNama" style="font-weight:800;color:#1a237e;font-size:20px;line-height:1.35;margin-bottom:14px;"></h4>

                {{-- Target Peserta --}}
                <div id="modalPesertaWrap" style="display:none;align-items:center;gap:8px;background:#e8f0fe;border-radius:10px;padding:10px 16px;margin-bottom:18px;">
                    <i class="bi bi-people-fill" style="color:#1565c0;font-size:16px;flex-shrink:0;"></i>
                    <div>
                        <div style="font-size:10px;font-weight:700;color:#888;text-transform:uppercase;letter-spacing:0.5px;">Target Peserta</div>
                        <div id="modalPeserta" style="font-size:13.5px;font-weight:600;color:#1565c0;"></div>
                    </div>
                </div>

                {{-- Narasi --}}
                <div style="margin-bottom:24px;">
                    <div style="font-size:11px;font-weight:700;color:#aaa;text-transform:uppercase;letter-spacing:1px;margin-bottom:8px;">Deskripsi Program</div>
                    <div id="modalNarasi" style="font-size:14px;line-height:1.85;color:#444;white-space:pre-line;"></div>
                </div>

                {{-- CTA --}}
                <div style="background:linear-gradient(135deg,#e8f0fe,#fff);border:1px solid #c5d8fa;border-radius:12px;padding:16px 20px;display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap;">
                    <div>
                        <div style="font-size:12px;font-weight:700;color:#1a237e;">Tertarik dengan program ini?</div>
                        <div style="font-size:12px;color:#666;">Hubungi kami untuk informasi lebih lanjut</div>
                    </div>
                    <a href="#footer" onclick="tutupModalBtn()" style="display:inline-flex;align-items:center;gap:6px;background:linear-gradient(135deg,#1a237e,#1565c0);color:#fff;padding:9px 20px;border-radius:10px;font-size:13px;font-weight:600;text-decoration:none;white-space:nowrap;box-shadow:0 4px 14px rgba(21,101,192,0.3);">
                        <i class="bi bi-telephone-fill"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>

</main>

@push('style')
<style>
@keyframes modalIn {
    from { opacity:0; transform:translateY(24px) scale(0.97); }
    to   { opacity:1; transform:translateY(0)   scale(1); }
}
#modalProgram.show { display:flex !important; }
body.modal-open-prog { overflow:hidden; }
</style>
@endpush

@push('js')
<script>
function bukaModal(card) {
    const modal   = document.getElementById('modalProgram');
    const header  = document.getElementById('modalHeader');
    const foto    = card.dataset.foto;

    // Header: foto atau gradient+icon
    if (foto) {
        document.getElementById('modalFoto').src        = foto;
        document.getElementById('modalFoto').alt        = card.dataset.nama;
        document.getElementById('modalHeaderImg').style.display  = 'block';
        document.getElementById('modalHeaderIcon').style.display = 'none';
        document.getElementById('modalKategoriHeader').style.display = 'none';
        header.style.background = '#111';
    } else {
        document.getElementById('modalHeaderImg').style.display  = 'none';
        document.getElementById('modalHeaderIcon').style.display = 'flex';
        document.getElementById('modalKategoriHeader').style.display = 'block';
        document.getElementById('modalIcon').className  = 'bi ' + card.dataset.icon;
        document.getElementById('modalKategoriHeader').textContent = card.dataset.kategori;
        header.style.background = card.dataset.gradient;
    }

    // Badge
    const badge = document.getElementById('modalBadge');
    badge.textContent        = card.dataset.kategori;
    badge.style.background   = card.dataset.badgeBg;
    badge.style.color        = card.dataset.badgeClr;

    // Durasi
    if (card.dataset.durasi) {
        document.getElementById('modalDurasi').style.display   = 'inline-flex';
        document.getElementById('modalDurasiTxt').textContent  = card.dataset.durasi;
    } else {
        document.getElementById('modalDurasi').style.display   = 'none';
    }

    // Nama
    document.getElementById('modalNama').textContent = card.dataset.nama;

    // Target peserta
    if (card.dataset.peserta) {
        document.getElementById('modalPesertaWrap').style.display = 'flex';
        document.getElementById('modalPeserta').textContent       = card.dataset.peserta;
    } else {
        document.getElementById('modalPesertaWrap').style.display = 'none';
    }

    // Narasi (strip HTML tags)
    const tmp = document.createElement('div');
    tmp.innerHTML = card.dataset.narasi;
    document.getElementById('modalNarasi').textContent = tmp.innerText || tmp.textContent;

    modal.classList.add('show');
    document.body.classList.add('modal-open-prog');
}

function tutupModalBtn() {
    document.getElementById('modalProgram').classList.remove('show');
    document.body.classList.remove('modal-open-prog');
}

function tutupModal(e) {
    if (e.target.id === 'modalProgram') tutupModalBtn();
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') tutupModalBtn();
});
</script>
@endpush
@endsection
