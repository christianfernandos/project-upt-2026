@extends('partials.front')
@section('title', 'Visi dan Misi - UPT BLP2TK Surabaya')
@section('content')
<main id="main">

    @include('partials._page-header', [
        'title'       => 'Visi dan Misi',
        'subtitle'    => 'Profil UPT BLP2TK Surabaya',
        'icon'        => 'bi-eye-fill',
        'gradient'    => 'linear-gradient(135deg, #1a237e 0%, #1565c0 100%)',
        'breadcrumbs' => [
            ['label' => 'Beranda',   'url' => route('beranda')],
            ['label' => 'Profil UPT','url' => route('profil-upt')],
            ['label' => 'Visi dan Misi', 'url' => '#'],
        ],
    ])

    <!-- ======= Visi dan Misi ======= -->
    <section class="py-5">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4 justify-content-center">
                <!-- Visi -->
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden">
                        <div class="card-header border-0 py-4 text-white"
                             style="background: linear-gradient(135deg, #1a237e, #1565c0);">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center"
                                     style="width:52px;height:52px;flex-shrink:0;">
                                    <i class="bi bi-eye-fill fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0">Visi</h5>
                                    <small class="opacity-75">Cita-cita jangka panjang lembaga</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4 p-md-5">
                            @if($profil && $profil->visi)
                                <p class="text-muted" style="font-size:15px; line-height:1.9; white-space:pre-line;">
                                    {{ $profil->visi }}
                                </p>
                            @else
                                <p class="text-muted fst-italic">Data visi belum tersedia.</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Misi -->
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden">
                        <div class="card-header border-0 py-4 text-white"
                             style="background: linear-gradient(135deg, #1b5e20, #2e7d32);">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center"
                                     style="width:52px;height:52px;flex-shrink:0;">
                                    <i class="bi bi-list-check fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0">Misi</h5>
                                    <small class="opacity-75">Langkah strategis pencapaian visi</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4 p-md-5">
                            @if($profil && $profil->misi)
                                @php $misiLines = array_filter(explode("\n", trim($profil->misi))); @endphp
                                <div class="d-flex flex-column gap-3">
                                    @foreach($misiLines as $line)
                                        @php $line = trim($line); @endphp
                                        @if($line !== '')
                                            <div class="d-flex gap-3">
                                                <div class="bg-success rounded-circle d-flex align-items-center justify-content-center mt-1"
                                                     style="width:28px;height:28px;flex-shrink:0;">
                                                    <i class="bi bi-check text-white fw-bold" style="font-size:14px;"></i>
                                                </div>
                                                <p class="mb-0 text-muted" style="font-size:14.5px; line-height:1.7;">
                                                    {{ preg_replace('/^\d+\.\s*/', '', $line) }}
                                                </p>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted fst-italic">Data misi belum tersedia.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigasi antar sub-halaman -->
            <div class="d-flex justify-content-between align-items-center mt-5 pt-4 border-top">
                <a href="{{ route('profil.tugas') }}" class="btn btn-outline-secondary rounded-pill px-4">
                    <i class="bi bi-arrow-left me-1"></i> Tugas dan Fungsi
                </a>
                <a href="{{ route('profil.pegawai') }}" class="btn btn-primary rounded-pill px-4">
                    Profil Pegawai <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </section>

</main>
@endsection
