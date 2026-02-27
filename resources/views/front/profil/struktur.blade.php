@extends('partials.front')
@section('title', 'Struktur Organisasi - UPT BLP2TK Surabaya')
@section('content')
<main id="main">

    @include('partials._page-header', [
        'title'       => 'Struktur Organisasi',
        'subtitle'    => 'Profil UPT BLP2TK Surabaya',
        'icon'        => 'bi-diagram-3-fill',
        'gradient'    => 'linear-gradient(135deg, #1a237e 0%, #1565c0 100%)',
        'breadcrumbs' => [
            ['label' => 'Beranda',   'url' => route('beranda')],
            ['label' => 'Profil UPT','url' => route('profil-upt')],
            ['label' => 'Struktur Organisasi', 'url' => '#'],
        ],
    ])

    <!-- ======= Struktur Organisasi ======= -->
    <section class="py-5">
        <div class="container" data-aos="fade-up">
            <div class="text-center">
                @if($profil && $profil->foto_struktur)
                    <img src="{{ asset('images/profil/' . $profil->foto_struktur) }}"
                         class="img-fluid rounded shadow"
                         style="max-width:960px; width:100%;"
                         alt="Struktur Organisasi UPT BLP2TK">
                @else
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card border-0 shadow-sm p-5 text-center">
                                <i class="bi bi-diagram-3 text-primary mb-3" style="font-size:5rem;"></i>
                                <h5 class="fw-bold mb-2">Gambar Belum Tersedia</h5>
                                <p class="text-muted mb-4">
                                    Gambar bagan struktur organisasi UPT BLP2TK Surabaya belum diunggah.<br>
                                    Admin dapat mengunggahnya melalui halaman <strong>Profil UPT</strong> di panel admin.
                                </p>
                                <div>
                                    <a href="{{ route('profil-upt') }}" class="btn btn-outline-primary rounded-pill px-4">
                                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Profil UPT
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Navigasi antar sub-halaman -->
            <div class="d-flex justify-content-between align-items-center mt-5 pt-4 border-top">
                <span class="text-muted small">Bagian dari Profil UPT</span>
                <a href="{{ route('profil.tugas') }}" class="btn btn-primary rounded-pill px-4">
                    Tugas dan Fungsi <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </section>

</main>
@endsection
