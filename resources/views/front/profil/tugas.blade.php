@extends('partials.front')
@section('title', 'Tugas dan Fungsi - UPT BLP2TK Surabaya')
@section('content')
<main id="main">

    @include('partials._page-header', [
        'title'       => 'Tugas dan Fungsi',
        'subtitle'    => 'Profil UPT BLP2TK Surabaya',
        'icon'        => 'bi-briefcase-fill',
        'gradient'    => 'linear-gradient(135deg, #1a237e 0%, #1565c0 100%)',
        'breadcrumbs' => [
            ['label' => 'Beranda',   'url' => route('beranda')],
            ['label' => 'Profil UPT','url' => route('profil-upt')],
            ['label' => 'Tugas dan Fungsi', 'url' => '#'],
        ],
    ])

    <!-- ======= Tugas dan Fungsi ======= -->
    <section class="py-5">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    @if($profil && $profil->tugas_fungsi)
                        @php
                            $lines = explode("\n", trim($profil->tugas_fungsi));
                        @endphp
                        <div class="card border-0 shadow-sm p-4 p-md-5">
                            <!-- Ikon header -->
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center"
                                     style="width:56px;height:56px;flex-shrink:0;">
                                    <i class="bi bi-briefcase-fill text-white fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0 text-primary">Uraian Tugas & Fungsi</h5>
                                    <small class="text-muted">UPT Balai Latihan Pengembangan Produktivitas Tenaga Kerja Surabaya</small>
                                </div>
                            </div>
                            <div class="text-muted" style="font-size:15px; line-height:2;">
                                @foreach($lines as $line)
                                    @if(trim($line) !== '')
                                        @php $trimmed = trim($line); @endphp
                                        @if(preg_match('/^\d+\./', $trimmed))
                                            <div class="d-flex gap-2 mb-2">
                                                <i class="bi bi-check-circle-fill text-success mt-1" style="flex-shrink:0;"></i>
                                                <span>{{ preg_replace('/^\d+\.\s*/', '', $trimmed) }}</span>
                                            </div>
                                        @elseif(str_starts_with(strtolower($trimmed), 'fungsi'))
                                            <h6 class="fw-bold text-dark mt-4 mb-2">
                                                <i class="bi bi-grid-fill text-primary me-2"></i>{{ $trimmed }}
                                            </h6>
                                        @else
                                            <p class="mb-3">{{ $trimmed }}</p>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="card border-0 shadow-sm p-5 text-center">
                            <i class="bi bi-file-text text-muted mb-3" style="font-size:4rem;"></i>
                            <p class="text-muted">Data tugas dan fungsi belum tersedia.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Navigasi antar sub-halaman -->
            <div class="d-flex justify-content-between align-items-center mt-5 pt-4 border-top">
                <a href="{{ route('profil.struktur') }}" class="btn btn-outline-secondary rounded-pill px-4">
                    <i class="bi bi-arrow-left me-1"></i> Struktur Organisasi
                </a>
                <a href="{{ route('profil.visimisi') }}" class="btn btn-primary rounded-pill px-4">
                    Visi dan Misi <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </section>

</main>
@endsection
