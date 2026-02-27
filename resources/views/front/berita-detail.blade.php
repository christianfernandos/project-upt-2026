@extends('partials.front')
@section('title', $berita->judul . ' | UPT BLP2TK Surabaya')
@section('content')

<main id="main">

    @include('partials._page-header', [
        'title'       => $berita->judul,
        'subtitle'    => 'Berita',
        'icon'        => 'bi-newspaper',
        'gradient'    => 'linear-gradient(135deg, #1a237e 0%, #1565c0 100%)',
        'breadcrumbs' => [
            ['label' => 'Beranda', 'url' => route('beranda')],
            ['label' => 'Berita',  'url' => route('berita')],
            ['label' => Str::limit($berita->judul, 40), 'url' => '#'],
        ],
    ])

    <section class="py-5" style="background:#ffffff;">
        <div class="container" data-aos="fade-up">
            <div class="row g-4">

                {{-- Konten Utama --}}
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm" style="border-radius:20px; overflow:hidden;">

                        {{-- Foto --}}
                        @if($berita->foto && file_exists(public_path('images/berita/' . $berita->foto)))
                            <img src="{{ asset('images/berita/' . $berita->foto) }}"
                                 alt="{{ $berita->judul }}"
                                 style="width:100%;max-height:420px;object-fit:cover;">
                        @else
                            <div style="height:260px;
                                        background:linear-gradient(135deg,#1a237e 0%,#1565c0 100%);
                                        display:flex;flex-direction:column;align-items:center;
                                        justify-content:center;gap:12px;">
                                <i class="bi bi-newspaper" style="font-size:4rem;color:rgba(255,255,255,0.6);"></i>
                                <span style="color:rgba(255,255,255,0.7);font-size:11px;font-weight:700;
                                             letter-spacing:1.5px;text-transform:uppercase;">UPT BLP2TK Surabaya</span>
                            </div>
                        @endif

                        <div class="p-4 p-lg-5">
                            {{-- Meta --}}
                            <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                                <span style="background:#e8f0fe;color:#1a73e8;font-size:11px;font-weight:700;
                                             padding:4px 14px;border-radius:20px;text-transform:uppercase;
                                             letter-spacing:0.5px;">
                                    <i class="bi bi-newspaper me-1"></i>Berita
                                </span>
                                <span style="font-size:13px;color:#888;">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $berita->created_at->format('d F Y') }}
                                </span>
                            </div>

                            {{-- Judul --}}
                            <h1 style="font-weight:800;font-size:1.6rem;color:#1a1a2e;
                                       line-height:1.4;margin-bottom:24px;">
                                {{ $berita->judul }}
                            </h1>

                            <hr style="border-color:#e8eaf6;margin-bottom:28px;">

                            {{-- Narasi --}}
                            <div style="font-size:1rem;color:#444;line-height:1.9;word-break:break-word;">
                                {!! nl2br(e($berita->narasi)) !!}
                            </div>

                            <hr style="border-color:#e8eaf6;margin-top:36px;margin-bottom:20px;">

                            <a href="{{ route('berita') }}"
                               style="display:inline-flex;align-items:center;gap:6px;
                                      color:#0d6efd;font-weight:600;font-size:14px;text-decoration:none;">
                                <i class="bi bi-arrow-left"></i> Kembali ke Daftar Berita
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Sidebar: Berita Terkait --}}
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm p-4" style="border-radius:16px; position:sticky; top:80px;">
                        <h5 style="font-weight:800;color:#1a237e;margin-bottom:20px;
                                   padding-bottom:12px;border-bottom:2px solid #e8eaf6;">
                            <i class="bi bi-collection me-2"></i>Berita Lainnya
                        </h5>

                        @forelse($related as $rel)
                        <a href="{{ route('berita.show', $rel->id) }}" class="text-decoration-none">
                            <div class="d-flex gap-3 mb-3 pb-3"
                                 style="border-bottom:1px solid #f1f3f9; transition:opacity 0.2s;"
                                 onmouseover="this.style.opacity='0.75'" onmouseout="this.style.opacity='1'">

                                {{-- Thumbnail --}}
                                <div style="width:72px;height:58px;border-radius:10px;overflow:hidden;flex-shrink:0;background:#e8eaf6;">
                                    @if($rel->foto && file_exists(public_path('images/berita/' . $rel->foto)))
                                        <img src="{{ asset('images/berita/' . $rel->foto) }}"
                                             alt="{{ $rel->judul }}"
                                             style="width:100%;height:100%;object-fit:cover;">
                                    @else
                                        <div style="width:100%;height:100%;background:linear-gradient(135deg,#1a237e,#1565c0);
                                                    display:flex;align-items:center;justify-content:center;">
                                            <i class="bi bi-newspaper" style="color:rgba(255,255,255,0.7);font-size:1.3rem;"></i>
                                        </div>
                                    @endif
                                </div>

                                <div>
                                    <p style="font-size:13px;font-weight:700;color:#1a1a2e;
                                              line-height:1.4;margin-bottom:4px;">
                                        {{ Str::limit($rel->judul, 60) }}
                                    </p>
                                    <span style="font-size:11px;color:#aaa;">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        {{ $rel->created_at->format('d M Y') }}
                                    </span>
                                </div>
                            </div>
                        </a>
                        @empty
                            <p class="text-muted text-center" style="font-size:13px;">Tidak ada berita lain.</p>
                        @endforelse

                        <a href="{{ route('berita') }}"
                           class="btn btn-outline-primary btn-sm w-100 mt-2"
                           style="border-radius:20px;font-weight:600;">
                            Lihat Semua Berita
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

@endsection
