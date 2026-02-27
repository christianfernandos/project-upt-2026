@extends('partials.front')
@section('title', 'Profil Pegawai - UPT BLP2TK Surabaya')
@section('content')
<main id="main">

    @include('partials._page-header', [
        'title'       => 'Profil Pegawai',
        'subtitle'    => 'Sumber Daya Manusia UPT BLP2TK Surabaya',
        'icon'        => 'bi-people-fill',
        'gradient'    => 'linear-gradient(135deg, #1a237e 0%, #1565c0 100%)',
        'breadcrumbs' => [
            ['label' => 'Beranda',   'url' => route('beranda')],
            ['label' => 'Profil UPT','url' => route('profil-upt')],
            ['label' => 'Profil Pegawai', 'url' => '#'],
        ],
    ])

    <!-- ======= Profil Pegawai ======= -->
    <section class="py-5">
        <div class="container" data-aos="fade-up">
            @if($pegawaiList->count())
                <div class="row gy-4 justify-content-center">
                    @foreach($pegawaiList as $pgw)
                    <div class="col-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="{{ $loop->iteration * 60 }}">
                        <div class="card border-0 shadow-sm text-center p-4 h-100 hover-card">
                            @if($pgw->foto)
                                <img src="{{ asset('images/pegawai/' . $pgw->foto) }}"
                                     class="rounded-circle mx-auto mb-3 shadow"
                                     style="width:100px;height:100px;object-fit:cover;"
                                     alt="{{ $pgw->nama }}">
                            @else
                                <div class="rounded-circle mx-auto mb-3 shadow d-flex align-items-center justify-content-center"
                                     style="width:100px;height:100px;background:linear-gradient(135deg,#1a237e,#1565c0);">
                                    <i class="bi bi-person-fill text-white" style="font-size:2.5rem;"></i>
                                </div>
                            @endif
                            <h6 class="fw-bold mb-1" style="font-size:14px;">{{ $pgw->nama }}</h6>
                            <span class="badge bg-primary bg-opacity-10 text-primary"
                                  style="font-size:11px; font-weight:500;">
                                {{ $pgw->jabatan }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center text-muted py-5">
                    <i class="bi bi-people fs-1 d-block mb-3"></i>
                    <p>Data pegawai belum tersedia.</p>
                </div>
            @endif

            <!-- Navigasi antar sub-halaman -->
            <div class="d-flex justify-content-between align-items-center mt-5 pt-4 border-top">
                <a href="{{ route('profil.visimisi') }}" class="btn btn-outline-secondary rounded-pill px-4">
                    <i class="bi bi-arrow-left me-1"></i> Visi dan Misi
                </a>
                <a href="{{ route('program-kegiatan') }}" class="btn btn-outline-primary rounded-pill px-4">
                    <i class="bi bi-calendar2-check me-1"></i> Program Kegiatan
                </a>
            </div>
        </div>
    </section>

    <style>
    .hover-card { transition: transform 0.2s, box-shadow 0.2s; }
    .hover-card:hover { transform: translateY(-4px); box-shadow: 0 8px 30px rgba(0,0,0,0.1) !important; }
    </style>

</main>
@endsection
