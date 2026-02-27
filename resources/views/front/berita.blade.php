@extends('partials.front')
@section('title', 'Berita | UPT BLP2TK Surabaya')
@section('content')

<main id="main">

    @include('partials._page-header', [
        'title'       => 'Berita Terbaru',
        'subtitle'    => 'UPT BLP2TK Surabaya',
        'icon'        => 'bi-newspaper',
        'gradient'    => 'linear-gradient(135deg, #1a237e 0%, #1565c0 100%)',
        'breadcrumbs' => [
            ['label' => 'Beranda', 'url' => route('beranda')],
            ['label' => 'Berita', 'url' => '#'],
        ],
    ])

    {{-- Daftar Berita --}}
    <section class="py-5" style="background:#ffffff; min-height:60vh;">
        <div class="container" data-aos="fade-up">

            @if($data->count() > 0)
                <div class="row g-4">
                    @foreach($data as $item)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('berita.show', $item->id) }}" class="text-decoration-none">
                            <div class="card h-100 border-0 shadow-sm berita-card"
                                 style="border-radius:16px; overflow:hidden; transition:all 0.3s;">

                                {{-- Gambar --}}
                                <div style="height:200px; overflow:hidden; background:#e8eaf6; flex-shrink:0;">
                                    @if($item->foto && file_exists(public_path('images/berita/' . $item->foto)))
                                        <img src="{{ asset('images/berita/' . $item->foto) }}"
                                             alt="{{ $item->judul }}"
                                             style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s;">
                                    @else
                                        @php
                                            $colors = [
                                                'linear-gradient(135deg,#1a237e,#1565c0)',
                                                'linear-gradient(135deg,#1b5e20,#388e3c)',
                                                'linear-gradient(135deg,#4a148c,#7b1fa2)',
                                                'linear-gradient(135deg,#b71c1c,#d32f2f)',
                                                'linear-gradient(135deg,#e65100,#f57c00)',
                                            ];
                                            $icons = ['bi-award-fill','bi-people-fill','bi-gear-fill','bi-building','bi-journal-richtext'];
                                            $idx = $loop->index % 5;
                                        @endphp
                                        <div style="width:100%;height:100%;background:{{ $colors[$idx] }};
                                                    display:flex;flex-direction:column;align-items:center;
                                                    justify-content:center;gap:10px;">
                                            <i class="bi {{ $icons[$idx] }}"
                                               style="font-size:3rem;color:rgba(255,255,255,0.75);"></i>
                                            <span style="font-size:10px;font-weight:700;color:rgba(255,255,255,0.7);
                                                         letter-spacing:1px;text-transform:uppercase;">UPT BLP2TK Surabaya</span>
                                        </div>
                                    @endif
                                </div>

                                {{-- Konten --}}
                                <div class="card-body d-flex flex-column p-4">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <span style="background:#e8f0fe;color:#1a73e8;font-size:11px;font-weight:700;
                                                     padding:3px 12px;border-radius:20px;text-transform:uppercase;
                                                     letter-spacing:0.5px;">
                                            <i class="bi bi-newspaper me-1"></i>Berita
                                        </span>
                                        <span style="font-size:12px;color:#888;">
                                            <i class="bi bi-calendar3 me-1"></i>
                                            {{ $item->created_at->format('d F Y') }}
                                        </span>
                                    </div>

                                    <h5 style="font-weight:800;color:#1a1a2e;font-size:1rem;
                                               line-height:1.4;margin-bottom:10px;flex-grow:1;">
                                        {{ $item->judul }}
                                    </h5>

                                    <p style="font-size:0.875rem;color:#666;line-height:1.7;margin-bottom:16px;">
                                        {{ Str::limit(strip_tags($item->narasi), 120, '...') }}
                                    </p>

                                    <span style="display:inline-flex;align-items:center;color:#0d6efd;
                                                 font-weight:600;font-size:13px;">
                                        Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-5">
                    {{ $data->links('vendor.pagination.bootstrap-5') }}
                </div>

            @else
                <div class="text-center py-5">
                    <i class="bi bi-newspaper" style="font-size:4rem;color:#c5cae9;display:block;margin-bottom:16px;"></i>
                    <p class="text-muted fs-5">Belum ada berita tersedia.</p>
                </div>
            @endif

        </div>
    </section>

</main>

<style>
.berita-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 48px rgba(13,110,253,0.15) !important;
}
.berita-card:hover img {
    transform: scale(1.05);
}
</style>

@endsection
