@extends('partials.front')
@section('title', 'Kalkulator Produktivitas - UPT BLP2TK Surabaya')

@section('style')
<style>
:root{--blue-dark:#1a237e;--blue-main:#1565c0;--blue-mid:#1976d2;--blue-pale:#e8f0fe;--orange-main:#f47c20;--orange-dark:#d4610a;--orange-light:#ffd180;--orange-pale:#fff3e8;--gray-mid:#6b7280;--text-dark:#1a1a2e}
.kalk-hero{background:linear-gradient(135deg,var(--blue-dark) 0%,var(--blue-main) 55%,var(--blue-mid) 100%);padding:64px 0 52px;color:#fff;text-align:center;border-bottom:4px solid var(--orange-main);position:relative;overflow:hidden}
.kalk-hero::before{content:'';position:absolute;inset:0;background:radial-gradient(circle at 80% 20%,rgba(244,124,32,.10) 0%,transparent 60%);pointer-events:none}
.kalk-hero .hero-icon{width:80px;height:80px;border-radius:20px;background:rgba(244,124,32,.22);display:inline-flex;align-items:center;justify-content:center;font-size:2.2rem;color:var(--orange-light);margin-bottom:20px;box-shadow:0 8px 28px rgba(244,124,32,.25);position:relative}
.kalk-hero h1{font-size:clamp(1.9rem,4vw,2.7rem)!important;font-weight:800!important;position:relative;margin-bottom:14px!important}
.kalk-hero p{font-size:1.05rem!important;opacity:.87;position:relative;max-width:600px;margin:0 auto!important;line-height:1.7!important}
.stat-bar{background:#fff;border-bottom:3px solid var(--orange-main);box-shadow:0 4px 18px rgba(10,46,110,.09)}
.stat-bar-item{display:flex;flex-direction:column;align-items:center;justify-content:center;padding:22px 16px;border-right:1px solid #edf2fb;text-align:center}
.stat-bar-item:last-child{border-right:none}
.stat-bar-item .sb-icon{font-size:1.35rem;color:var(--orange-main);margin-bottom:7px}
.stat-bar-item .sb-val{font-size:1.85rem;font-weight:800;color:var(--blue-dark);line-height:1}
.stat-bar-item .sb-lbl{font-size:.76rem;color:var(--gray-mid);font-weight:500;margin-top:5px;text-transform:uppercase;letter-spacing:.4px}
.sec-head{text-align:center;margin-bottom:40px}
.sec-head .sh-badge{display:inline-block;background:var(--orange-pale);color:var(--orange-dark);font-size:.78rem;font-weight:700;padding:4px 18px;border-radius:20px;text-transform:uppercase;letter-spacing:.7px;margin-bottom:11px;border:1px solid rgba(244,124,32,.22)}
.sec-head h2{font-size:clamp(1.45rem,3vw,2rem)!important;font-weight:800!important;color:var(--blue-dark)!important;margin-bottom:14px!important}
.sh-divider{display:flex;align-items:center;justify-content:center;gap:6px}
.sh-divider .ln{height:3px;border-radius:3px}
.sh-divider .ln-blue{width:50px;background:var(--blue-main)}
.sh-divider .ln-orange{width:22px;background:var(--orange-main)}
.result-card{border-radius:18px;overflow:hidden;box-shadow:0 6px 32px rgba(10,46,110,.11);border:1px solid rgba(10,46,110,.07);background:#fff;transition:transform .3s,box-shadow .3s}
.result-card:hover{transform:translateY(-4px);box-shadow:0 14px 44px rgba(10,46,110,.17)}
.result-card-header{background:linear-gradient(135deg,var(--blue-dark),var(--blue-main));color:#fff;padding:18px 24px;display:flex;align-items:center;justify-content:space-between;gap:12px}
.result-card-header .rc-name{font-weight:700;font-size:1.02rem}
.result-card-header .rc-loc{font-size:.83rem;opacity:.8;margin-top:2px}
.result-card-body{padding:24px}
.prod-index-big{font-size:2.5rem;font-weight:800;color:var(--orange-main);line-height:1}
.prod-unit{font-size:.8rem;color:var(--gray-mid);font-weight:500;margin-top:3px}
.meta-row{display:flex;align-items:center;gap:8px;font-size:.91rem;color:var(--gray-mid);margin-top:9px}
.meta-row i{color:var(--blue-main);flex-shrink:0}
.mini-badge{display:inline-flex;align-items:center;gap:5px;padding:6px 14px;border-radius:20px;font-size:.8rem;font-weight:700}
.lvl-sangat-tinggi{background:#e8f5e9;color:#1b5e20;border:1.5px solid #4caf50}
.lvl-tinggi{background:#e3f2fd;color:#0d47a1;border:1.5px solid #2196f3}
.lvl-sedang{background:#fff8e1;color:#e65100;border:1.5px solid #ff9800}
.lvl-rendah{background:#fff3e0;color:#bf360c;border:1.5px solid #ff5722}
.lvl-sangat-rendah{background:#ffebee;color:#b71c1c;border:1.5px solid #f44336}
.badge-level{display:inline-flex;align-items:center;gap:8px;padding:8px 18px;border-radius:28px;font-weight:700;font-size:.88rem;margin-bottom:12px}
.level-sangat-tinggi{background:#e8f5e9;color:#1b5e20;border:2px solid #4caf50}
.level-tinggi{background:#e3f2fd;color:#0d47a1;border:2px solid #2196f3}
.level-sedang{background:#fff8e1;color:#e65100;border:2px solid #ff9800}
.level-rendah{background:#fff3e0;color:#bf360c;border:2px solid #ff5722}
.level-sangat-rendah{background:#ffebee;color:#b71c1c;border:2px solid #f44336}
.rekom-panel{border-radius:16px;overflow:hidden;box-shadow:0 4px 20px rgba(10,46,110,.09);border:1px solid rgba(244,124,32,.15)}
.rekom-header{background:linear-gradient(135deg,var(--orange-main),var(--orange-dark));color:#fff;padding:16px 22px;display:flex;align-items:center;gap:12px}
.rekom-header i{font-size:1.5rem;flex-shrink:0}
.rekom-header h5{margin:0!important;font-size:1rem!important;font-weight:700!important}
.rekom-header .rh-sub{font-size:.82rem;opacity:.88;margin-top:2px}
.rekom-body{background:#fff;padding:20px}
.rec-list{list-style:none;padding:0;margin:0}
.rec-list li{display:flex;gap:11px;align-items:flex-start;padding:10px 0;border-bottom:1px solid #f0f4ff;font-size:.91rem}
.rec-list li:last-child{border-bottom:none;padding-bottom:0}
.rec-icon{width:30px;height:30px;flex-shrink:0;border-radius:50%;background:var(--orange-pale);display:flex;align-items:center;justify-content:center}
.rec-icon i{color:var(--orange-main);font-size:.9rem}
.rec-text{color:var(--text-dark);line-height:1.65}
.rec-text strong{color:var(--blue-dark)}
.prog-wrap{background:var(--blue-pale);border-radius:11px;padding:14px 16px;margin-top:14px}
.prog-wrap h6{color:var(--blue-dark)!important;font-weight:700!important;font-size:.91rem!important;margin-bottom:9px!important}
.prog-badge{display:inline-block;background:var(--blue-main);color:#fff;padding:5px 13px;border-radius:18px;font-size:.79rem;font-weight:600;margin:3px;text-decoration:none;transition:background .2s}
.prog-badge:hover{background:var(--orange-main);color:#fff}
.dt-wrap{background:#fff;border-radius:14px;overflow:hidden;box-shadow:0 3px 16px rgba(10,46,110,.08)}
.dt-wrap .table thead th{background:var(--blue-dark)!important;color:#fff!important;font-weight:600;font-size:.89rem;padding:14px 16px;border:none}
.dt-wrap .table tbody td{padding:12px 16px;font-size:.89rem;vertical-align:middle;border-color:#edf2fb}
.dt-wrap .table tbody tr:hover{background:var(--blue-pale)}
.cta-banner{background:linear-gradient(135deg,var(--blue-dark),var(--blue-main));border-radius:18px;padding:44px 40px;color:#fff;position:relative;overflow:hidden;border-left:5px solid var(--orange-main)}
.cta-banner h3{font-size:1.6rem!important;font-weight:800!important;margin-bottom:12px!important}
.cta-banner p{font-size:1rem!important;opacity:.88;margin-bottom:0!important}
.btn-cta-orange{background:linear-gradient(135deg,var(--orange-main),var(--orange-dark));color:#fff;border:none;padding:13px 28px;border-radius:12px;font-weight:700;font-size:.95rem;transition:transform .2s,box-shadow .2s;text-decoration:none;display:inline-block}
.btn-cta-orange:hover{transform:translateY(-3px);box-shadow:0 8px 22px rgba(244,124,32,.45);color:#fff}
.btn-cta-outline{background:transparent;color:#fff;border:2px solid rgba(255,255,255,.6);padding:12px 24px;border-radius:12px;font-weight:600;font-size:.93rem;transition:all .2s;text-decoration:none;display:inline-block}
.btn-cta-outline:hover{background:rgba(255,255,255,.1);border-color:#fff;color:#fff}
</style>
@endsection

@section('content')
<main id="main">

<section class="kalk-hero">
    <div class="container" data-aos="fade-up">
        <div class="hero-icon"><i class="bi bi-speedometer2"></i></div>
        <h1>Kalkulator Produktivitas</h1>
        <p>Pantau tingkat produktivitas tenaga kerja perusahaan binaan UPT BLP2TK dan dapatkan rekomendasi program peningkatan yang tepat secara otomatis.</p>
    </div>
</section>

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

@php
function getKalkulatorLevel(float $prod): array {
    $sangat_tinggi = ['label'=>'Sangat Tinggi','css'=>'level-sangat-tinggi','mini'=>'lvl-sangat-tinggi','icon'=>'bi-trophy-fill','color'=>'#4caf50','score'=>95,'desc'=>'Produktivitas berada di level tertinggi!','items'=>[['icon'=>'bi-award','text'=>'<strong>Pertahankan standar tinggi</strong> dengan sistem manajemen kinerja berkelanjutan.'],['icon'=>'bi-share','text'=>'<strong>Jadikan perusahaan benchmark industri</strong> dan bagikan praktik terbaik.'],['icon'=>'bi-graph-up-arrow','text'=>'<strong>Diversifikasi dan inovasi produk/layanan</strong> untuk keunggulan kompetitif jangka panjang.'],['icon'=>'bi-mortarboard','text'=>'<strong>Ikuti program pelatihan manajerial lanjutan</strong> untuk pemimpin masa depan.'],['icon'=>'bi-people','text'=>'<strong>Kembangkan program mentoring internal</strong> agar produktivitas merata di semua divisi.']],'programs'=>['Manajemen Kinerja Lanjutan','Leadership & Inovasi','Sertifikasi Kompetensi Senior','Workshop Best Practice']];
    $tinggi = ['label'=>'Tinggi','css'=>'level-tinggi','mini'=>'lvl-tinggi','icon'=>'bi-star-fill','color'=>'#2196f3','score'=>75,'desc'=>'Produktivitas sudah baik. Optimasi kecil akan membawa ke level terbaik.','items'=>[['icon'=>'bi-bullseye','text'=>'<strong>Optimalkan proses kerja</strong> dan eliminasi pemborosan untuk efisiensi lebih tinggi.'],['icon'=>'bi-tools','text'=>'<strong>Tingkatkan skill teknis tenaga kerja</strong> melalui pelatihan vokasional tepat sasaran.'],['icon'=>'bi-diagram-3','text'=>'<strong>Terapkan prinsip lean management</strong> untuk meminimalkan proses tidak bernilai tambah.'],['icon'=>'bi-gear','text'=>'<strong>Evaluasi penggunaan teknologi</strong> dan pertimbangkan otomasi untuk pekerjaan repetitif.'],['icon'=>'bi-clipboard-check','text'=>'<strong>Perkuat sistem monitoring harian</strong> agar perbaikan produktivitas terukur konsisten.']],'programs'=>['Pelatihan Lean Manufacturing','Peningkatan Skill Teknis','Manajemen Waktu Kerja','Quality Control Lanjutan']];
    $sedang = ['label'=>'Sedang','css'=>'level-sedang','mini'=>'lvl-sedang','icon'=>'bi-arrow-up-right-circle-fill','color'=>'#ff9800','score'=>50,'desc'=>'Produktivitas cukup, masih ada ruang signifikan untuk ditingkatkan.','items'=>[['icon'=>'bi-search','text'=>'<strong>Analisis mendalam bottleneck</strong> pada proses produksi untuk menemukan hambatan utama.'],['icon'=>'bi-mortarboard','text'=>'<strong>Daftarkan tenaga kerja ke program pelatihan intensif</strong> yang sesuai bidang usaha.'],['icon'=>'bi-people-fill','text'=>'<strong>Perbaiki manajemen SDM</strong> dan evaluasi distribusi tugas, beban kerja, motivasi karyawan.'],['icon'=>'bi-bar-chart-steps','text'=>'<strong>Terapkan target produktivitas harian/mingguan</strong> yang terukur dan terdokumentasi.'],['icon'=>'bi-lightbulb','text'=>'<strong>Konsultasikan dengan tim UPT BLP2TK</strong> Surabaya untuk pendampingan intensif.']],'programs'=>['Pelatihan Produktivitas Dasar','Analisis & Perbaikan Proses','Pelatihan Supervisor','Konsultasi Produktivitas Gratis']];
    $rendah = ['label'=>'Rendah','css'=>'level-rendah','mini'=>'lvl-rendah','icon'=>'bi-exclamation-triangle-fill','color'=>'#ff5722','score'=>28,'desc'=>'Produktivitas memerlukan perhatian serius. Intervensi segera diperlukan.','items'=>[['icon'=>'bi-alarm','text'=>'<strong>Segera lakukan audit produktivitas menyeluruh</strong> untuk mengidentifikasi akar masalah.'],['icon'=>'bi-person-gear','text'=>'<strong>Ikuti program pelatihan dasar</strong> tenaga kerja sesegera mungkin.'],['icon'=>'bi-recycle','text'=>'<strong>Redesign alur kerja</strong> dan eliminasi proses tidak perlu, sederhanakan SOP.'],['icon'=>'bi-chat-heart','text'=>'<strong>Perbaiki komunikasi dan motivasi tim</strong> karena produktivitas rendah sering dari rendahnya engagement.'],['icon'=>'bi-telephone','text'=>'<strong>Hubungi UPT BLP2TK Surabaya</strong> di (031) 8415260 untuk konsultasi dan pendampingan.']],'programs'=>['Pelatihan Dasar Tenaga Kerja','Program Motivasi Karyawan','Konsultasi Manajemen Produksi','Pelatihan K3 Lingkungan Kerja']];
    $sangat_rendah = ['label'=>'Sangat Rendah','css'=>'level-sangat-rendah','mini'=>'lvl-sangat-rendah','icon'=>'bi-x-octagon-fill','color'=>'#f44336','score'=>10,'desc'=>'Kondisi kritis. Diperlukan program pemulihan produktivitas yang mendesak.','items'=>[['icon'=>'bi-hospital','text'=>'<strong>Program pemulihan darurat</strong> harus segera dimulai dengan bimbingan konsultan profesional.'],['icon'=>'bi-person-video2','text'=>'<strong>Lakukan retraining massal</strong> seluruh tenaga kerja sesuai kompetensi jabatan.'],['icon'=>'bi-building-gear','text'=>'<strong>Evaluasi total model bisnis dan proses</strong> dan pertimbangkan restrukturisasi organisasi.'],['icon'=>'bi-shield-check','text'=>'<strong>Pastikan pemenuhan standar minimum ketenagakerjaan</strong> untuk menjaga motivasi dasar.'],['icon'=>'bi-headset','text'=>'<strong>Manfaatkan layanan konsultasi gratis UPT BLP2TK</strong> kami siap mendampingi Anda.']],'programs'=>['Program Darurat Produktivitas','Retraining Massal','Konsultasi Intensif 1-on-1','Bantuan Teknis Manajemen']];
    $juta = $prod / 1000000;
    if      ($juta >= 360) return $sangat_tinggi;
    elseif  ($juta >= 240) return $tinggi;
    elseif  ($juta >= 144) return $sedang;
    elseif  ($juta >= 72)  return $rendah;
    else                   return $sangat_rendah;
}
@endphp

@if($kalkulatorList->count() > 0)

<div class="sec-head" data-aos="fade-up">
    <div class="sh-badge">Hasil Pengukuran</div>
    <h2>Data Produktivitas Perusahaan Binaan</h2>
    <div class="sh-divider"><span class="ln ln-blue"></span><span class="ln ln-orange"></span><span class="ln ln-blue"></span></div>
</div>

<div class="row g-4 mb-5">
@foreach($kalkulatorList as $idx => $kal)
@php
    $lv     = getKalkulatorLevel((float)$kal->produktivitas_per_tk);
    $rekTK  = $kal->rekomendasi_tk;
    $aktTK  = $kal->tenaga_kerja;
    $offset = 283 - (283 * $lv['score'] / 100);
    if      ($rekTK > $aktTK) { $stLabel='Kurang TK';  $stClass='bg-danger bg-opacity-10 text-danger';   $stIcon='bi-arrow-up-circle-fill text-danger'; }
    elseif  ($rekTK < $aktTK) { $stLabel='Surplus TK'; $stClass='bg-warning bg-opacity-10 text-warning'; $stIcon='bi-arrow-down-circle-fill text-warning'; }
    else                      { $stLabel='Optimal';    $stClass='bg-success bg-opacity-10 text-success'; $stIcon='bi-check-circle-fill text-success'; }
@endphp
<div class="col-12" data-aos="fade-up" data-aos-delay="{{ ($idx % 3) * 80 }}">
<div class="result-card">
    <div class="result-card-header">
        <div>
            <div class="rc-name"><i class="bi bi-building me-2"></i>{{ $kal->nama_pt }}</div>
            <div class="rc-loc"><i class="bi bi-geo-alt me-1"></i>{{ $kal->alamat_pt }}</div>
        </div>
        <span class="mini-badge {{ $lv['mini'] }}"><i class="bi {{ $lv['icon'] }} me-1"></i>{{ $lv['label'] }}</span>
    </div>
    <div class="result-card-body">
        <div class="row g-4 align-items-start">
            <div class="col-md-4">
                <div style="background:linear-gradient(135deg,var(--blue-pale),#fff);border-radius:14px;padding:22px;border:1px solid #d8e8fb;height:100%;">
                    <div style="font-size:.76rem;color:var(--gray-mid);font-weight:700;text-transform:uppercase;letter-spacing:.6px;margin-bottom:10px;">
                        <i class="bi bi-speedometer2 me-1" style="color:var(--orange-main);"></i>Produktivitas / TK / Tahun
                    </div>
                    <div class="prod-index-big">Rp {{ number_format($kal->produktivitas_per_tk / 1e6, 2) }}M</div>
                    <div class="prod-unit">Rp {{ number_format($kal->produktivitas_per_tk, 0, ',', '.') }} / orang / tahun</div>
                    <div class="meta-row" style="margin-top:16px;"><i class="bi bi-people-fill"></i><span>{{ number_format($aktTK) }} Tenaga Kerja Aktual</span></div>
                    <div class="meta-row"><i class="bi bi-person-check"></i><span>{{ number_format($rekTK) }} TK Rekomendasi</span></div>
                    <div class="meta-row"><i class="bi bi-cash-stack"></i><span>Omzet Rp {{ number_format($kal->total_omzet / 1e9, 2) }} M/tahun</span></div>
                    <div style="margin-top:14px;">
                        <span class="badge rounded-pill px-3 py-2 {{ $stClass }}" style="font-size:.81rem;font-weight:600;">
                            <i class="bi {{ $stIcon }} me-1"></i>{{ $stLabel }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 text-center d-flex flex-column align-items-center justify-content-center pt-3">
                <div class="badge-level {{ $lv['css'] }}"><i class="bi {{ $lv['icon'] }}"></i>&nbsp;{{ $lv['label'] }}</div>
                <svg viewBox="0 0 200 110" width="150" height="85">
                    <path d="M10 100 A90 90 0 0 1 190 100" fill="none" stroke="#e8f1fb" stroke-width="18" stroke-linecap="round"/>
                    <path d="M10 100 A90 90 0 0 1 190 100" fill="none" stroke="{{ $lv['color'] }}" stroke-width="18" stroke-linecap="round" stroke-dasharray="283" stroke-dashoffset="{{ $offset }}"/>
                    <text x="100" y="106" text-anchor="middle" font-size="22" font-weight="800" fill="{{ $lv['color'] }}">{{ $lv['score'] }}%</text>
                </svg>
                <p style="font-size:.8rem;color:var(--gray-mid);text-align:center;max-width:140px;line-height:1.5;margin-top:6px;">{{ $lv['desc'] }}</p>
            </div>
            <div class="col-md-6">
                <div class="rekom-panel">
                    <div class="rekom-header">
                        <i class="bi bi-lightbulb-fill"></i>
                        <div>
                            <h5>Rekomendasi Tindak Lanjut</h5>
                            <div class="rh-sub">Berdasarkan analisis produktivitas {{ $kal->nama_pt }}</div>
                        </div>
                    </div>
                    <div class="rekom-body">
                        <ul class="rec-list">
                            @foreach($lv['items'] as $item)
                            <li>
                                <div class="rec-icon"><i class="bi {{ $item['icon'] }}"></i></div>
                                <div class="rec-text">{!! $item['text'] !!}</div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="prog-wrap">
                            <h6><i class="bi bi-mortarboard me-2"></i>Program UPT BLP2TK yang Direkomendasikan:</h6>
                            @foreach($lv['programs'] as $prog)
                                <a href="{{ route('program-kegiatan') }}" class="prog-badge">{{ $prog }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endforeach
</div>

<div class="sec-head mt-2" data-aos="fade-up">
    <div class="sh-badge">Tabel Ringkasan</div>
    <h2>Perbandingan Produktivitas Seluruh Perusahaan</h2>
    <div class="sh-divider"><span class="ln ln-blue"></span><span class="ln ln-orange"></span><span class="ln ln-blue"></span></div>
</div>

<div class="dt-wrap mb-5" data-aos="fade-up">
    <div class="d-flex align-items-center justify-content-between px-4 py-3" style="background:linear-gradient(135deg,var(--blue-dark),var(--blue-main));">
        <h6 class="text-white fw-bold mb-0"><i class="bi bi-table me-2"></i>Data Produktivitas Perusahaan Binaan UPT BLP2TK</h6>
        <span class="badge" style="background:var(--orange-main);font-size:.82rem;padding:5px 14px;border-radius:20px;">{{ $kalkulatorList->count() }} Perusahaan</span>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th style="width:36px;">#</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat</th>
                    <th class="text-center">Jml TK</th>
                    <th class="text-end">Total Omzet/Tahun</th>
                    <th class="text-end">Produktivitas/TK</th>
                    <th class="text-center">Rek. TK</th>
                    <th class="text-center">Level</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kalkulatorList as $i => $kal)
                @php
                    $lv2  = getKalkulatorLevel((float)$kal->produktivitas_per_tk);
                    $rek2 = $kal->rekomendasi_tk;
                    $akt2 = $kal->tenaga_kerja;
                    if      ($rek2 > $akt2) { $st2='Kurang TK';  $sc2='bg-danger bg-opacity-10 text-danger';   $si2='bi-arrow-up-circle-fill text-danger'; }
                    elseif  ($rek2 < $akt2) { $st2='Surplus TK'; $sc2='bg-warning bg-opacity-10 text-warning'; $si2='bi-arrow-down-circle-fill text-warning'; }
                    else                    { $st2='Optimal';    $sc2='bg-success bg-opacity-10 text-success'; $si2='bi-check-circle-fill text-success'; }
                @endphp
                <tr>
                    <td class="ps-4 text-muted">{{ $i + 1 }}</td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div style="width:30px;height:30px;border-radius:50%;background:var(--blue-pale);display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="bi bi-building" style="color:var(--blue-main);font-size:.85rem;"></i></div>
                            <span class="fw-semibold">{{ $kal->nama_pt }}</span>
                        </div>
                    </td>
                    <td class="text-muted"><i class="bi bi-geo-alt me-1 text-danger" style="font-size:.85rem;"></i>{{ Str::limit($kal->alamat_pt, 30) }}</td>
                    <td class="text-center"><span class="badge rounded-pill" style="background:var(--blue-pale);color:var(--blue-main);padding:5px 12px;font-weight:600;">{{ number_format($akt2) }}</span></td>
                    <td class="text-end fw-semibold" style="color:#1b5e20;">Rp {{ number_format($kal->total_omzet, 0, ',', '.') }}</td>
                    <td class="text-end fw-bold" style="color:var(--blue-dark);">Rp {{ number_format($kal->produktivitas_per_tk, 0, ',', '.') }}</td>
                    <td class="text-center fw-bold" style="color:var(--blue-dark);">{{ number_format($rek2) }}</td>
                    <td class="text-center"><span class="mini-badge {{ $lv2['mini'] }}"><i class="bi {{ $lv2['icon'] }} me-1"></i>{{ $lv2['label'] }}</span></td>
                    <td class="text-center pe-4"><span class="badge rounded-pill px-3 py-2 {{ $sc2 }}" style="font-size:.79rem;font-weight:600;"><i class="bi {{ $si2 }} me-1"></i>{{ $st2 }}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-4 py-3 d-flex gap-4 flex-wrap" style="background:#f8f9fa;border-top:1px solid #eee;font-size:.83rem;color:#888;">
        <span><i class="bi bi-check-circle-fill text-success me-1"></i><b>Optimal</b>: Jumlah TK sudah ideal</span>
        <span><i class="bi bi-arrow-up-circle-fill text-danger me-1"></i><b>Kurang TK</b>: Disarankan menambah TK</span>
        <span><i class="bi bi-arrow-down-circle-fill text-warning me-1"></i><b>Surplus TK</b>: TK melebihi kebutuhan optimal</span>
    </div>
</div>

@else

<div class="row justify-content-center mb-5" data-aos="fade-up">
    <div class="col-lg-6">
        <div style="background:#fff;border-radius:18px;box-shadow:0 6px 32px rgba(10,46,110,.10);border:1px solid rgba(10,46,110,.07);padding:56px 40px;text-align:center;">
            <div style="font-size:4.5rem;color:#d0ddf0;margin-bottom:20px;"><i class="bi bi-bar-chart-line"></i></div>
            <h4 class="fw-bold mb-3" style="color:var(--blue-dark);">Belum Ada Data Produktivitas</h4>
            <p class="text-muted mb-4" style="font-size:1rem;line-height:1.7;">Data produktivitas perusahaan belum tersedia.<br>Data akan ditampilkan setelah tim UPT BLP2TK menginput hasil pengukuran.</p>
            <a href="{{ route('kontak') }}" class="btn-cta-orange"><i class="bi bi-telephone me-2"></i>Hubungi Kami untuk Pengukuran</a>
        </div>
    </div>
</div>

@endif

<div class="cta-banner" data-aos="fade-up">
    <div class="row align-items-center g-4">
        <div class="col-lg-7">
            <h3>Ingin Mengukur Produktivitas Perusahaan Anda?</h3>
            <p>Tim konsultan produktivitas UPT BLP2TK Surabaya siap membantu pengukuran, analisis, dan pendampingan peningkatan produktivitas tenaga kerja secara profesional dan <strong>gratis</strong> untuk perusahaan di Jawa Timur.</p>
        </div>
        <div class="col-lg-5 d-flex flex-wrap gap-3 justify-content-lg-end">
            <a href="{{ route('kontak') }}" class="btn-cta-orange"><i class="bi bi-telephone-fill me-2"></i>Hubungi Konsultan</a>
            <a href="{{ route('program-kegiatan') }}?kategori=konsultasi" class="btn-cta-outline"><i class="bi bi-eye me-2"></i>Lihat Program Konsultasi</a>
        </div>
    </div>
</div>

    </div>
</section>

</main>
@endsection