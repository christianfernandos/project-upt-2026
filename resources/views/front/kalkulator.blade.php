@extends('partials.front')
@section('title', 'Kalkulator Produktivitas - UPT BLP2TK Surabaya')

@section('style')
<style>
:root {
    --blue-dark:   #1a237e;
    --blue-main:   #1565c0;
    --blue-mid:    #1976d2;
    --blue-pale:   #e8f0fe;
    --orange-main: #f47c20;
    --orange-dark: #d4610a;
    --orange-light:#ffd180;
    --orange-pale: #fff3e8;
    --gray-mid:    #6b7280;
    --gray-soft:   #f1f5f9;
    --text-dark:   #1a1a2e;
}

/* ---- STAT BAR ---- */
.stat-bar { background: #fff; border-bottom: 3px solid var(--orange-main); box-shadow: 0 4px 18px rgba(10,46,110,.09); }
.stat-bar-item {
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    padding: 22px 16px; border-right: 1px solid #edf2fb; text-align: center;
}
.stat-bar-item:last-child { border-right: none; }
.stat-bar-item .sb-icon { font-size: 1.35rem; color: var(--orange-main); margin-bottom: 7px; }
.stat-bar-item .sb-val  { font-size: 1.85rem; font-weight: 800; color: var(--blue-dark); line-height: 1; }
.stat-bar-item .sb-lbl  { font-size: .78rem; color: var(--gray-mid); font-weight: 500; margin-top: 5px; text-transform: uppercase; letter-spacing: .4px; }

/* ---- SECTION HEADER ---- */
.sec-head { text-align: center; margin-bottom: 40px; }
.sec-head .sh-badge {
    display: inline-block; background: var(--orange-pale); color: var(--orange-dark);
    font-size: .78rem; font-weight: 700; padding: 4px 18px; border-radius: 20px;
    text-transform: uppercase; letter-spacing: .7px; margin-bottom: 11px;
    border: 1px solid rgba(244,124,32,.22);
}
.sec-head h2 { font-size: clamp(1.45rem,3vw,2rem) !important; font-weight: 800 !important; color: var(--blue-dark) !important; margin-bottom: 14px !important; }
.sh-divider  { display: flex; align-items: center; justify-content: center; gap: 6px; }
.sh-divider .ln { height: 3px; border-radius: 3px; }
.sh-divider .ln-blue   { width: 50px; background: var(--blue-main); }
.sh-divider .ln-orange { width: 22px; background: var(--orange-main); }

/* ---- TABLE ---- */
.dt-wrap { background: #fff; border-radius: 14px; overflow: hidden; box-shadow: 0 3px 16px rgba(10,46,110,.08); }
.dt-wrap .table thead th { background: var(--blue-dark) !important; color: #fff !important; font-weight: 600; font-size: .89rem; padding: 14px 16px; border: none; }
.dt-wrap .table tbody td { padding: 12px 16px; font-size: .89rem; vertical-align: top; border-color: #edf2fb; }
.dt-wrap .table tbody tr:hover { background: var(--blue-pale); }
.dt-wrap .table tbody tr:hover td { background: transparent; }

/* ---- CTA ---- */
.cta-banner { background: linear-gradient(135deg, var(--blue-dark), var(--blue-main)); border-radius: 18px; padding: 44px 40px; color: #fff; position: relative; overflow: hidden; border-left: 5px solid var(--orange-main); }
.cta-banner::before { content: ''; position: absolute; top: -40px; right: -40px; width: 180px; height: 180px; border-radius: 50%; background: rgba(255,255,255,.05); pointer-events: none; }
.cta-banner h3 { font-size: 1.6rem !important; font-weight: 800 !important; margin-bottom: 12px !important; }
.cta-banner p  { font-size: 1rem !important; opacity: .88; margin-bottom: 0 !important; }
.btn-cta-orange { background: linear-gradient(135deg,var(--orange-main),var(--orange-dark)); color: #fff; border: none; padding: 13px 28px; border-radius: 12px; font-weight: 700; font-size: .95rem; transition: transform .2s,box-shadow .2s; text-decoration: none; display: inline-block; }
.btn-cta-orange:hover { transform: translateY(-3px); box-shadow: 0 8px 22px rgba(244,124,32,.45); color: #fff; }
.btn-cta-outline { background: transparent; color: #fff; border: 2px solid rgba(255,255,255,.6); padding: 12px 24px; border-radius: 12px; font-weight: 600; font-size: .93rem; transition: all .2s; text-decoration: none; display: inline-block; }
.btn-cta-outline:hover { background: rgba(255,255,255,.1); border-color: #fff; color: #fff; }
</style>
@endsection

@section('content')
<main id="main">

{{-- ====================================================
     PAGE HEADER (konsisten dengan halaman lain)
===================================================== --}}
@include('partials._page-header', [
    'title'       => 'Kalkulator Produktivitas',
    'subtitle'    => 'UPT BLP2TK Surabaya',
    'icon'        => 'bi-speedometer2',
    'gradient'    => 'linear-gradient(135deg, #1a237e 0%, #1565c0 100%)',
    'breadcrumbs' => [
        ['label' => 'Beranda',                  'url' => route('beranda')],
        ['label' => 'Kalkulator Produktivitas', 'url' => '#'],
    ],
])

{{-- ====================================================
     STAT BAR
===================================================== --}}
@php
    $totalPerusahaan   = $kalkulatorList->count();
    $totalTK           = $kalkulatorList->sum('tenaga_kerja');
    $rataProduktivitas = $totalPerusahaan > 0 ? $kalkulatorList->avg(fn($k) => $k->produktivitas_per_tk) : 0;
    $pctOptimal = 0;
    if ($totalPerusahaan > 0) {
        $optCount   = $kalkulatorList->filter(fn($k) => $k->rekomendasi_tk == $k->tenaga_kerja)->count();
        $pctOptimal = round($optCount / $totalPerusahaan * 100);
    }
@endphp
<div class="stat-bar">
    <div class="container">
        <div class="row g-0">
            <div class="col-6 col-md-3">
                <div class="stat-bar-item">
                    <div class="sb-icon"><i class="bi bi-building"></i></div>
                    <div class="sb-val">{{ $totalPerusahaan }}</div>
                    <div class="sb-lbl">Perusahaan Terdaftar</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-bar-item">
                    <div class="sb-icon"><i class="bi bi-people-fill"></i></div>
                    <div class="sb-val">{{ number_format($totalTK) }}</div>
                    <div class="sb-lbl">Total Tenaga Kerja</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-bar-item">
                    <div class="sb-icon"><i class="bi bi-graph-up-arrow"></i></div>
                    <div class="sb-val">{{ $totalPerusahaan > 0 ? 'Rp '.number_format($rataProduktivitas/1e6,1).'M' : '-' }}</div>
                    <div class="sb-lbl">Rata-rata Produktivitas/TK</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-bar-item">
                    <div class="sb-icon"><i class="bi bi-check-circle-fill"></i></div>
                    <div class="sb-val">{{ $pctOptimal }}%</div>
                    <div class="sb-lbl">Perusahaan Status Optimal</div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="py-5">
    <div class="container">

@if($kalkulatorList->count() > 0)

{{-- ---- TABEL RINGKASAN ---- --}}
<div class="sec-head mt-2" data-aos="fade-up">
    <div class="sh-badge">Tabel Ringkasan</div>
    <h2>Perbandingan Produktivitas Seluruh Perusahaan</h2>
    <div class="sh-divider">
        <span class="ln ln-blue"></span>
        <span class="ln ln-orange"></span>
        <span class="ln ln-blue"></span>
    </div>
</div>

<div class="dt-wrap mb-5" data-aos="fade-up">
    <div class="d-flex align-items-center justify-content-between px-4 py-3"
         style="background:linear-gradient(135deg,var(--blue-dark),var(--blue-main));">
        <h6 class="text-white fw-bold mb-0" style="font-size:.98rem;">
            <i class="bi bi-table me-2"></i>Data Produktivitas Perusahaan Binaan UPT BLP2TK
        </h6>
        <span class="badge" style="background:var(--orange-main);font-size:.82rem;padding:5px 14px;border-radius:20px;">
            {{ $kalkulatorList->count() }} Perusahaan
        </span>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th style="width:36px;">#</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat</th>
                    <th class="text-center">Jml TK</th>
                    <th class="text-end" style="white-space:nowrap;">Total Omzet (2 Bln)</th>
                    <th class="text-end" style="white-space:nowrap;">Rekomendasi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kalkulatorList as $i => $kal)
                @php $akt2 = $kal->tenaga_kerja; @endphp
                <tr>
                    <td class="ps-4 text-muted">{{ $i + 1 }}</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div style="width:30px;height:30px;border-radius:50%;background:var(--blue-pale);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="bi bi-building" style="color:var(--blue-main);font-size:.85rem;"></i>
                            </div>
                            <span class="fw-semibold">{{ $kal->nama_pt }}</span>
                        </div>
                    </td>
                    <td class="text-muted" style="max-width:160px;">
                        <i class="bi bi-geo-alt me-1 text-danger" style="font-size:.85rem;"></i>{{ Str::limit($kal->alamat_pt, 30) }}
                    </td>
                    <td class="text-center">
                        <span class="badge rounded-pill" style="background:var(--blue-pale);color:var(--blue-main);padding:5px 12px;font-weight:600;">
                            {{ number_format($akt2) }}
                        </span>
                    </td>
                    <td class="text-end fw-semibold" style="color:#1b5e20;white-space:nowrap;">
                        Rp {{ number_format($kal->total_omzet, 0, ',', '.') }}
                    </td>
                    <td class="text-end fw-bold pe-4" style="color:var(--blue-dark);white-space:nowrap;">
                        Rp {{ number_format($kal->produktivitas_per_tk, 0, ',', '.') }}
                    </td>
                    {{-- AKSI: CETAK PDF --}}
                    <td class="text-center pe-3">
                        <a href="{{ route('kalkulator.cetak-pdf', $kal->id) }}"
                           target="_blank"
                           class="btn btn-sm"
                           style="background:linear-gradient(135deg,var(--blue-dark),var(--blue-main));color:#fff;border:none;border-radius:8px;padding:6px 14px;font-size:.8rem;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:5px;transition:opacity .2s;"
                           onmouseover="this.style.opacity='.85'" onmouseout="this.style.opacity='1'">
                            <i class="bi bi-file-earmark-pdf-fill"></i> Cetak PDF
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@else

{{-- ---- EMPTY STATE ---- --}}
<div class="row justify-content-center mb-5" data-aos="fade-up">
    <div class="col-lg-6">
        <div style="background:#fff;border-radius:18px;box-shadow:0 6px 32px rgba(10,46,110,.10);border:1px solid rgba(10,46,110,.07);padding:56px 40px;text-align:center;">
            <div style="font-size:4.5rem;color:#d0ddf0;margin-bottom:20px;"><i class="bi bi-bar-chart-line"></i></div>
            <h4 class="fw-bold mb-3" style="color:var(--blue-dark);">Belum Ada Data Produktivitas</h4>
            <p class="text-muted mb-4" style="font-size:1rem;line-height:1.7;">
                Data produktivitas perusahaan belum tersedia.<br>
                Data akan ditampilkan setelah tim UPT BLP2TK menginput hasil pengukuran.
            </p>
            <a href="{{ route('kontak') }}" class="btn-cta-orange">
                <i class="bi bi-telephone me-2"></i>Hubungi Kami untuk Pengukuran
            </a>
        </div>
    </div>
</div>

@endif

{{-- ---- CTA BANNER ---- --}}
<div class="cta-banner" data-aos="fade-up">
    <div class="row align-items-center g-4">
        <div class="col-lg-7">
            <h3>Ingin Mengukur Produktivitas Perusahaan Anda?</h3>
            <p>Tim konsultan produktivitas UPT BLP2TK Surabaya siap membantu pengukuran, analisis, dan pendampingan peningkatan produktivitas tenaga kerja secara profesional dan <strong>gratis</strong> untuk perusahaan di Jawa Timur.</p>
        </div>
        <div class="col-lg-5 d-flex flex-wrap gap-3 justify-content-lg-end">
            <a href="#footer" class="btn-cta-orange">
                <i class="bi bi-telephone-fill me-2"></i>Hubungi Konsultan
            </a>
            <a href="{{ route('program-kegiatan') }}?kategori=konsultasi" class="btn-cta-outline">
                <i class="bi bi-eye me-2"></i>Lihat Program Konsultasi
            </a>
        </div>
    </div>
</div>

    </div>
</section>

</main>
@endsection

