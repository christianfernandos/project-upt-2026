@extends('partials.admin')
@section('title', 'Dashboard')
@section('main')
<div class="pc-content">

    {{-- ===== Header Selamat Datang ===== --}}
    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0">Dashboard Admin</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><i class="ph ph-house"></i></li>
                            <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== Quick Action Buttons ===== --}}
    <div class="row g-3 mb-4 justify-content-center">
        <div class="col-6 col-md-4 col-lg-2">
            <a href="{{ route('admin.profil-upt.index') }}"
               class="btn btn-outline-primary w-100 d-flex flex-column align-items-center justify-content-center py-3 gap-2"
               style="border-radius:14px; border-width:2px; min-height:90px;">
                <i class="ph ph-buildings" style="font-size:28px;"></i>
                <span style="font-size:11.5px; font-weight:600;">Profil UPT</span>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <a href="{{ route('admin.pegawai.index') }}"
               class="btn btn-outline-info w-100 d-flex flex-column align-items-center justify-content-center py-3 gap-2"
               style="border-radius:14px; border-width:2px; min-height:90px;">
                <i class="ph ph-users" style="font-size:28px;"></i>
                <span style="font-size:11.5px; font-weight:600;">Pegawai</span>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <a href="{{ route('admin.program-kegiatan.index') }}"
               class="btn btn-outline-success w-100 d-flex flex-column align-items-center justify-content-center py-3 gap-2"
               style="border-radius:14px; border-width:2px; min-height:90px;">
                <i class="ph ph-calendar-check" style="font-size:28px;"></i>
                <span style="font-size:11.5px; font-weight:600;">Program Kegiatan</span>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <a href="{{ route('admin.kalkulator.index') }}"
               class="btn btn-outline-warning w-100 d-flex flex-column align-items-center justify-content-center py-3 gap-2"
               style="border-radius:14px; border-width:2px; min-height:90px;">
                <i class="ph ph-calculator" style="font-size:28px;"></i>
                <span style="font-size:11.5px; font-weight:600;">Kalkulator</span>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <a href="{{ route('admin.berita.index') }}"
               class="btn btn-outline-danger w-100 d-flex flex-column align-items-center justify-content-center py-3 gap-2"
               style="border-radius:14px; border-width:2px; min-height:90px;">
                <i class="ph ph-newspaper" style="font-size:28px;"></i>
                <span style="font-size:11.5px; font-weight:600;">Berita</span>
            </a>
        </div>
    </div>

    <div class="row g-4">

        {{-- ===== Kolom Kiri: Deskripsi UPT ===== --}}
        <div class="col-lg-5">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="ph ph-info me-2 text-primary"></i>Deskripsi UPT</h5>
                    <a href="{{ route('admin.profil-upt.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="ph ph-pencil me-1"></i> Edit
                    </a>
                </div>
                <div class="card-body">
                    @if($profil)
                        <div class="mb-3">
                            <h6 class="fw-bold text-primary mb-1"><i class="ph ph-eye me-1"></i>Visi</h6>
                            <p class="text-muted small" style="white-space:pre-line;">{{ \Illuminate\Support\Str::limit($profil->visi, 250) }}</p>
                        </div>
                        <hr class="my-2">
                        <div class="mb-3">
                            <h6 class="fw-bold text-primary mb-1"><i class="ph ph-list-bullets me-1"></i>Misi</h6>
                            <p class="text-muted small" style="white-space:pre-line;">{{ \Illuminate\Support\Str::limit($profil->misi, 300) }}</p>
                        </div>
                        <hr class="my-2">
                        <div>
                            <h6 class="fw-bold text-primary mb-1"><i class="ph ph-clipboard-text me-1"></i>Tugas & Fungsi</h6>
                            <p class="text-muted small" style="white-space:pre-line;">{{ \Illuminate\Support\Str::limit($profil->tugas_fungsi, 300) }}</p>
                        </div>
                    @else
                        <div class="text-center py-4 text-muted">
                            <i class="ph ph-info fs-1 mb-2 d-block"></i>
                            <p>Profil UPT belum diisi.</p>
                            <a href="{{ route('admin.profil-upt.index') }}" class="btn btn-primary btn-sm">Isi Sekarang</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- ===== Kolom Kanan ===== --}}
        <div class="col-lg-7 d-flex flex-column gap-4">

            {{-- Galeri Foto UPT --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="ph ph-images me-2 text-success"></i>Galeri Foto UPT</h5>
                    <a href="{{ route('admin.profil-upt.index') }}" class="btn btn-sm btn-outline-success">
                        <i class="ph ph-upload me-1"></i> Kelola
                    </a>
                </div>
                <div class="card-body">
                    @if($profil && $profil->foto_struktur)
                        <div class="row g-2">
                            <div class="col-12">
                                <div class="position-relative">
                                    <img src="{{ asset('images/profil/' . $profil->foto_struktur) }}"
                                         class="img-fluid rounded w-100"
                                         style="max-height:220px; object-fit:cover;"
                                         alt="Struktur Organisasi UPT BLP2TK">
                                    <span class="badge bg-dark position-absolute bottom-0 start-0 m-2" style="font-size:11px;">
                                        Struktur Organisasi
                                    </span>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-4 text-muted">
                            <i class="ph ph-image fs-1 mb-2 d-block"></i>
                            <p class="mb-1">Belum ada foto yang diupload.</p>
                            <a href="{{ route('admin.profil-upt.index') }}" class="btn btn-success btn-sm">Upload Foto</a>
                        </div>
                    @endif
                </div>
            </div>

            {{-- 3 Berita Terbaru --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="ph ph-newspaper me-2 text-danger"></i>Berita Terbaru</h5>
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-outline-danger">
                        <i class="ph ph-arrow-right me-1"></i> See More
                        @if($totalBerita > 3)
                            <span class="badge bg-danger ms-1">{{ $totalBerita }}</span>
                        @endif
                    </a>
                </div>
                <div class="card-body p-0">
                    @forelse($beritaList as $berita)
                    <div class="d-flex align-items-center gap-3 p-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                        @if($berita->foto)
                            <img src="{{ asset('images/berita/' . $berita->foto) }}"
                                 class="rounded flex-shrink-0"
                                 style="width:70px;height:55px;object-fit:cover;"
                                 alt="{{ $berita->judul }}">
                        @else
                            <div class="bg-light rounded flex-shrink-0 d-flex align-items-center justify-content-center"
                                 style="width:70px;height:55px;">
                                <i class="ph ph-newspaper text-muted fs-4"></i>
                            </div>
                        @endif
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="fw-semibold mb-1 text-truncate" style="font-size:14px;">{{ $berita->judul }}</p>
                            <p class="text-muted mb-0" style="font-size:12px;">{{ $berita->created_at->format('d M Y') }}</p>
                        </div>
                        <a href="{{ route('admin.berita.edit', $berita->id) }}"
                           class="btn btn-sm btn-outline-primary flex-shrink-0">
                            <i class="ph ph-pencil"></i>
                        </a>
                    </div>
                    @empty
                    <div class="text-center py-4 text-muted">
                        <i class="ph ph-newspaper fs-1 mb-2 d-block"></i>
                        <p class="mb-1">Belum ada berita.</p>
                        <a href="{{ route('admin.berita.create') }}" class="btn btn-danger btn-sm">Tambah Berita</a>
                    </div>
                    @endforelse
                </div>
                @if($totalBerita > 3)
                <div class="card-footer text-center bg-light">
                    <a href="{{ route('admin.berita.index') }}" class="text-decoration-none fw-semibold text-danger">
                        Lihat semua {{ $totalBerita }} berita <i class="ph ph-arrow-right ms-1"></i>
                    </a>
                </div>
                @endif
            </div>

        </div>
        {{-- End Kolom Kanan --}}

    </div>

    {{-- ===== TENTANG KAMI Preview ===== --}}
    <div class="row g-4 mt-1">
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center"
                     style="background:linear-gradient(135deg,#1a237e,#1565c0);">
                    <h5 class="mb-0 text-white"><i class="ph ph-house-line me-2"></i>Tentang Kami <small class="opacity-75 fw-normal">(Beranda)</small></h5>
                    <a href="{{ route('admin.profil-upt.index') }}" class="btn btn-sm btn-light">
                        <i class="ph ph-pencil me-1"></i> Edit
                    </a>
                </div>
                <div class="card-body">
                    @if($profil && ($profil->tentang_judul || $profil->tentang_deskripsi_1))
                        {{-- Judul --}}
                        @if($profil->tentang_judul)
                        <div class="mb-3 p-3 rounded" style="background:#f0f4ff;">
                            <div class="d-flex gap-3 align-items-start">
                                <div>
                                    <p class="fw-bold mb-1" style="color:#1a237e;font-size:15px;">{{ $profil->tentang_judul }}</p>
                                    @if($profil->tentang_subjudul)
                                    <p class="mb-0" style="color:#1565c0;font-size:13px;font-weight:600;">{{ $profil->tentang_subjudul }}</p>
                                    @endif
                                </div>
                                @if($profil->foto_tentang)
                                <img src="{{ asset('images/profil/'.$profil->foto_tentang) }}"
                                     class="rounded ms-auto flex-shrink-0"
                                     style="width:80px;height:60px;object-fit:cover;" alt="Foto Tentang">
                                @endif
                            </div>
                        </div>
                        @endif
                        {{-- Deskripsi --}}
                        @if($profil->tentang_deskripsi_1)
                        <p class="text-muted small mb-2" style="line-height:1.7;">
                            {{ \Illuminate\Support\Str::limit(strip_tags($profil->tentang_deskripsi_1), 180) }}
                        </p>
                        @endif
                        {{-- Fitur --}}
                        @if(is_array($profil->tentang_fitur) && count($profil->tentang_fitur) > 0)
                        <hr class="my-2">
                        <p class="fw-semibold text-muted small mb-2"><i class="ph ph-check-circle me-1 text-success"></i>Poin Fitur ({{ count($profil->tentang_fitur) }} item)</p>
                        <ul class="list-unstyled mb-0">
                            @foreach(array_slice($profil->tentang_fitur, 0, 3) as $fitur)
                            <li class="small text-muted mb-1">
                                <i class="ph ph-check text-success me-1"></i>{{ $fitur }}
                            </li>
                            @endforeach
                            @if(count($profil->tentang_fitur) > 3)
                            <li class="small text-muted opacity-60">+ {{ count($profil->tentang_fitur) - 3 }} poin lainnya...</li>
                            @endif
                        </ul>
                        @endif
                    @else
                        <div class="text-center py-4 text-muted">
                            <i class="ph ph-house-line fs-1 mb-2 d-block text-primary opacity-25"></i>
                            <p class="mb-2">Konten "Tentang Kami" belum diisi.</p>
                            <a href="{{ route('admin.profil-upt.index') }}" class="btn btn-primary btn-sm">
                                <i class="ph ph-pencil me-1"></i> Isi Sekarang
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- ===== KEUNGGULAN Preview ===== --}}
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center"
                     style="background:linear-gradient(135deg,#1565c0,#0277bd);">
                    <h5 class="mb-0 text-white"><i class="ph ph-star me-2"></i>Keunggulan <small class="opacity-75 fw-normal">(Beranda)</small></h5>
                    <a href="{{ route('admin.profil-upt.index') }}" class="btn btn-sm btn-light">
                        <i class="ph ph-pencil me-1"></i> Edit
                    </a>
                </div>
                <div class="card-body">
                    @php
                        $keunggulanPreview = is_array($profil->keunggulan ?? null) ? $profil->keunggulan : [];
                    @endphp
                    @if(count($keunggulanPreview) > 0)
                        <div class="row g-2">
                            @foreach($keunggulanPreview as $k)
                            <div class="col-6">
                                <div class="d-flex align-items-start gap-2 p-2 rounded" style="background:#f0f4ff;">
                                    <div style="width:34px;height:34px;border-radius:8px;background:linear-gradient(135deg,#1a237e,#1565c0);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                        <i class="bi {{ $k['icon'] ?? 'bi-star' }}" style="color:#fff;font-size:.9rem;"></i>
                                    </div>
                                    <div>
                                        <p class="fw-semibold mb-0" style="font-size:12.5px;color:#1a237e;">{{ $k['title'] ?? '-' }}</p>
                                        @if(!empty($k['desc']))
                                        <p class="text-muted mb-0" style="font-size:11px;line-height:1.4;">{{ \Illuminate\Support\Str::limit($k['desc'], 60) }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <p class="text-muted small mt-3 mb-0">
                            <i class="ph ph-info-circle me-1"></i>
                            Total {{ count($keunggulanPreview) }} item keunggulan ditampilkan di halaman beranda.
                        </p>
                    @else
                        <div class="text-center py-4 text-muted">
                            <i class="ph ph-star fs-1 mb-2 d-block text-warning opacity-25"></i>
                            <p class="mb-2">Belum ada data keunggulan.</p>
                            <a href="{{ route('admin.profil-upt.index') }}" class="btn btn-primary btn-sm">
                                <i class="ph ph-pencil me-1"></i> Isi Sekarang
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- ===== LAYANAN KAMI Preview ===== --}}
    <div class="row g-4 mt-1">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center"
                     style="background:linear-gradient(135deg,#0d47a1,#1565c0);">
                    <h5 class="mb-0 text-white"><i class="ph ph-squares-four me-2"></i>Layanan Kami <small class="opacity-75 fw-normal">(Ditampilkan di Beranda)</small></h5>
                    <a href="{{ route('admin.profil-upt.index') }}" class="btn btn-sm btn-light">
                        <i class="ph ph-pencil me-1"></i> Edit
                    </a>
                </div>
                <div class="card-body">
                    @php
                        $layananPreview = is_array($profil->layanan ?? null) ? $profil->layanan : [];
                    @endphp
                    @if(count($layananPreview) > 0)
                        <div class="row g-3">
                            @foreach($layananPreview as $lay)
                            <div class="col-6 col-md-4 col-lg-2">
                                <div class="d-flex flex-column align-items-center text-center p-3 rounded h-100"
                                     style="background:#f8f9ff;border:1px solid rgba(0,0,0,0.06);">
                                    <div style="width:44px;height:44px;border-radius:12px;background:{{ $lay['bg'] ?? '#e8f0fe' }};display:flex;align-items:center;justify-content:center;margin-bottom:10px;flex-shrink:0;">
                                        <i class="bi {{ $lay['icon'] ?? 'bi-star' }}" style="font-size:1.3rem;color:{{ $lay['color'] ?? '#1a237e' }};"></i>
                                    </div>
                                    <p class="fw-semibold mb-1" style="font-size:12px;color:#1a1a2e;line-height:1.3;">{{ $lay['title'] ?? '-' }}</p>
                                    @if(!empty($lay['desc']))
                                    <p class="text-muted mb-0" style="font-size:10.5px;line-height:1.4;">{{ \Illuminate\Support\Str::limit($lay['desc'], 55) }}</p>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <p class="text-muted small mt-3 mb-0">
                            <i class="ph ph-info-circle me-1"></i>
                            Total {{ count($layananPreview) }} layanan ditampilkan di halaman beranda.
                        </p>
                    @else
                        <div class="text-center py-4 text-muted">
                            <i class="ph ph-squares-four fs-1 mb-2 d-block text-primary opacity-25"></i>
                            <p class="mb-2">Belum ada data layanan. Data default akan ditampilkan di beranda.</p>
                            <a href="{{ route('admin.profil-upt.index') }}" class="btn btn-primary btn-sm">
                                <i class="ph ph-pencil me-1"></i> Isi Sekarang
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
