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
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-4 col-lg-2">
            <a href="{{ route('admin.profil-upt.index') }}"
               class="btn btn-outline-primary w-100 d-flex flex-column align-items-center py-3 gap-2"
               style="border-radius:14px; border-width:2px; min-height:90px;">
                <i class="ph ph-buildings" style="font-size:26px;"></i>
                <span style="font-size:11.5px; font-weight:600;">Profil UPT</span>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <a href="{{ route('admin.pegawai.index') }}"
               class="btn btn-outline-info w-100 d-flex flex-column align-items-center py-3 gap-2"
               style="border-radius:14px; border-width:2px; min-height:90px;">
                <i class="ph ph-users" style="font-size:26px;"></i>
                <span style="font-size:11.5px; font-weight:600;">Pegawai</span>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <a href="{{ route('admin.program-kegiatan.index') }}"
               class="btn btn-outline-success w-100 d-flex flex-column align-items-center py-3 gap-2"
               style="border-radius:14px; border-width:2px; min-height:90px;">
                <i class="ph ph-calendar-check" style="font-size:26px;"></i>
                <span style="font-size:11.5px; font-weight:600;">Program Kegiatan</span>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <a href="{{ route('admin.kalkulator.index') }}"
               class="btn btn-outline-warning w-100 d-flex flex-column align-items-center py-3 gap-2"
               style="border-radius:14px; border-width:2px; min-height:90px;">
                <i class="ph ph-calculator" style="font-size:26px;"></i>
                <span style="font-size:11.5px; font-weight:600;">Kalkulator</span>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <a href="{{ route('admin.berita.index') }}"
               class="btn btn-outline-danger w-100 d-flex flex-column align-items-center py-3 gap-2"
               style="border-radius:14px; border-width:2px; min-height:90px;">
                <i class="ph ph-newspaper" style="font-size:26px;"></i>
                <span style="font-size:11.5px; font-weight:600;">Berita</span>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <a href="{{ route('blog.index') }}"
               class="btn btn-outline-secondary w-100 d-flex flex-column align-items-center py-3 gap-2"
               style="border-radius:14px; border-width:2px; min-height:90px;">
                <i class="ph ph-article" style="font-size:26px;"></i>
                <span style="font-size:11.5px; font-weight:600;">Blog</span>
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
                        {{-- Visi --}}
                        <div class="mb-3">
                            <h6 class="fw-bold text-primary mb-1"><i class="ph ph-eye me-1"></i>Visi</h6>
                            <p class="text-muted small" style="white-space:pre-line;">{{ \Illuminate\Support\Str::limit($profil->visi, 250) }}</p>
                        </div>
                        <hr class="my-2">
                        {{-- Misi --}}
                        <div class="mb-3">
                            <h6 class="fw-bold text-primary mb-1"><i class="ph ph-list-bullets me-1"></i>Misi</h6>
                            <p class="text-muted small" style="white-space:pre-line;">{{ \Illuminate\Support\Str::limit($profil->misi, 300) }}</p>
                        </div>
                        <hr class="my-2">
                        {{-- Tugas & Fungsi --}}
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

        {{-- ===== Kolom Kanan: Galeri Foto + Berita ===== --}}
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
                        {{-- Thumbnail --}}
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
                        {{-- Info --}}
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="fw-semibold mb-1 text-truncate" style="font-size:14px;">{{ $berita->judul }}</p>
                            <p class="text-muted mb-0" style="font-size:12px;">{{ $berita->created_at->format('d M Y') }}</p>
                        </div>
                        {{-- Aksi --}}
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
</div>
@endsection
