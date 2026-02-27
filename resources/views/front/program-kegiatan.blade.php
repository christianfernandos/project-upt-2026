@extends('partials.front')
@section('title', 'Program Kegiatan - UPT BLP2TK Surabaya')
@section('content')
<main id="main">

    @include('partials._page-header', [
        'title'       => 'Program Kegiatan',
        'subtitle'    => 'UPT BLP2TK Surabaya',
        'icon'        => 'bi-calendar2-event-fill',
        'gradient'    => 'linear-gradient(135deg, #1a237e 0%, #1565c0 100%)',
        'breadcrumbs' => [
            ['label' => 'Beranda', 'url' => route('beranda')],
            ['label' => 'Program Kegiatan', 'url' => '#'],
        ],
    ])

    <!-- ======= Program Kegiatan ======= -->
    @php
    $cardStyles = [
        ['gradient' => 'linear-gradient(135deg, #1a237e 0%, #1565c0 100%)', 'icon' => 'bi-laptop',            'label' => 'Pelatihan Digital'],
        ['gradient' => 'linear-gradient(135deg, #1b5e20 0%, #388e3c 100%)', 'icon' => 'bi-graph-up-arrow',    'label' => 'Produktivitas'],
        ['gradient' => 'linear-gradient(135deg, #4a148c 0%, #7b1fa2 100%)', 'icon' => 'bi-award-fill',        'label' => 'Sertifikasi'],
        ['gradient' => 'linear-gradient(135deg, #b71c1c 0%, #e53935 100%)', 'icon' => 'bi-people-fill',       'label' => 'Pelatihan SDM'],
        ['gradient' => 'linear-gradient(135deg, #e65100 0%, #f57c00 100%)', 'icon' => 'bi-briefcase-fill',    'label' => 'Kewirausahaan'],
        ['gradient' => 'linear-gradient(135deg, #006064 0%, #00838f 100%)', 'icon' => 'bi-building',          'label' => 'Kerjasama Industri'],
        ['gradient' => 'linear-gradient(135deg, #0d47a1 0%, #1976d2 100%)', 'icon' => 'bi-mortarboard-fill',  'label' => 'Kompetensi SKKNI'],
        ['gradient' => 'linear-gradient(135deg, #37474f 0%, #607d8b 100%)', 'icon' => 'bi-tools',             'label' => 'Teknik & Manufaktur'],
        ['gradient' => 'linear-gradient(135deg, #880e4f 0%, #c2185b 100%)', 'icon' => 'bi-heart-pulse-fill',  'label' => 'K3 & Keselamatan'],
    ];
    @endphp
    <section class="py-5">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4">
                @forelse($programList as $program)
                @php $style = $cardStyles[$loop->index % count($cardStyles)]; @endphp
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div class="card h-100 border-0 shadow-sm" style="border-radius:16px;overflow:hidden;transition:all 0.3s;"
                         onmouseover="this.style.transform='translateY(-6px)';this.style.boxShadow='0 16px 48px rgba(0,0,0,0.13)'"
                         onmouseout="this.style.transform='translateY(0)';this.style.boxShadow=''">
                        @if($program->foto && file_exists(public_path('images/program/' . $program->foto)))
                            <img src="{{ asset('images/program/' . $program->foto) }}"
                                 class="card-img-top" style="height:210px;object-fit:cover;"
                                 alt="{{ $program->nama_kegiatan }}">
                        @else
                            <div style="height:210px;background:{{ $style['gradient'] }};display:flex;flex-direction:column;align-items:center;justify-content:center;gap:14px;position:relative;overflow:hidden;">
                                {{-- Dekorasi lingkaran --}}
                                <div style="position:absolute;top:-30px;right:-30px;width:120px;height:120px;border-radius:50%;background:rgba(255,255,255,0.07);pointer-events:none;"></div>
                                <div style="position:absolute;bottom:-20px;left:-20px;width:80px;height:80px;border-radius:50%;background:rgba(255,255,255,0.06);pointer-events:none;"></div>
                                {{-- Ikon --}}
                                <div style="width:64px;height:64px;border-radius:18px;background:rgba(255,255,255,0.15);display:flex;align-items:center;justify-content:center;border:1px solid rgba(255,255,255,0.2);">
                                    <i class="bi {{ $style['icon'] }}" style="font-size:1.9rem;color:#fff;"></i>
                                </div>
                                <span style="font-size:11px;font-weight:700;color:rgba(255,255,255,0.8);letter-spacing:1.5px;text-transform:uppercase;">{{ $style['label'] }}</span>
                            </div>
                        @endif
                        <div class="card-body" style="padding:22px 24px;">
                            <div style="display:inline-block;background:#e8f0fe;color:#1a73e8;font-size:10px;font-weight:700;padding:3px 12px;border-radius:12px;text-transform:uppercase;letter-spacing:0.5px;margin-bottom:10px;">Program</div>
                            <h5 class="card-title fw-bold" style="font-size:15px;color:#1a1a2e;line-height:1.4;margin-bottom:10px;">{{ $program->nama_kegiatan }}</h5>
                            <p class="card-text text-muted" style="font-size:13.5px; line-height:1.75;margin:0;">
                                {{ strip_tags($program->narasi) }}
                            </p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5 text-muted">
                    <i class="bi bi-calendar-x fs-1 d-block mb-3"></i>
                    <p>Belum ada program kegiatan yang tersedia.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

</main>
@endsection
