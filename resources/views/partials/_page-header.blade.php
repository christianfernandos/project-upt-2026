{{--
    Partial: Page Header
    Props:
        $title      → Judul halaman (wajib)
        $subtitle   → Sub-judul kecil di atas (opsional)
        $breadcrumbs → array [ ['label'=>'', 'url'=>''] ] — item terakhir otomatis aktif
        $icon       → Bootstrap Icon class (mis. 'bi-calculator') opsional
        $gradient   → override warna (opsional, default biru)
--}}
@php
    $gradient = $gradient ?? 'linear-gradient(135deg, #1a237e 0%, #1565c0 100%)';
    $icon     = $icon     ?? 'bi-grid-1x2-fill';
@endphp

<section style="
    background: {{ $gradient }};
    padding: clamp(28px, 5vw, 48px) 0;
    position: relative;
    overflow: hidden;
">
    {{-- Dekorasi bulat (tidak mengganggu layout) --}}
    <div aria-hidden="true" style="
        position:absolute; top:-60px; right:-60px;
        width:clamp(160px,20vw,260px); height:clamp(160px,20vw,260px);
        border-radius:50%;
        background:rgba(255,255,255,0.06);
        pointer-events:none;
    "></div>
    <div aria-hidden="true" style="
        position:absolute; bottom:-40px; left:-40px;
        width:clamp(100px,14vw,180px); height:clamp(100px,14vw,180px);
        border-radius:50%;
        background:rgba(255,255,255,0.04);
        pointer-events:none;
    "></div>

    <div class="container" style="position:relative; z-index:1;">
        <div class="d-flex align-items-center gap-3 flex-wrap">

            {{-- Ikon --}}
            <div style="
                width: clamp(44px,6vw,56px);
                height: clamp(44px,6vw,56px);
                background: rgba(255,255,255,0.15);
                border-radius: 14px;
                display: flex; align-items: center; justify-content: center;
                flex-shrink: 0;
            ">
                <i class="bi {{ $icon }}" style="font-size:clamp(1.2rem,2.5vw,1.6rem); color:#fff;"></i>
            </div>

            <div>
                {{-- Sub judul (kecil, di atas) --}}
                @if(!empty($subtitle))
                <p style="
                    font-family:'Poppins',sans-serif;
                    font-size: clamp(10px,1.2vw,12px);
                    font-weight: 600;
                    color: rgba(255,255,255,0.65);
                    letter-spacing: 1.5px;
                    text-transform: uppercase;
                    margin: 0 0 4px;
                    line-height: 1;
                ">{{ $subtitle }}</p>
                @endif

                {{-- Judul Utama --}}
                <h1 style="
                    font-family:'Poppins',sans-serif;
                    font-size: clamp(1.3rem, 3.5vw, 2rem);
                    font-weight: 800;
                    color: #ffffff;
                    margin: 0;
                    line-height: 1.2;
                ">{{ $title }}</h1>

                {{-- Breadcrumb --}}
                @if(!empty($breadcrumbs))
                <nav aria-label="breadcrumb" style="margin-top:8px;">
                    <ol class="breadcrumb mb-0" style="
                        padding: 0;
                        background: transparent;
                        gap: 2px;
                    ">
                        @foreach($breadcrumbs as $i => $crumb)
                            @if($i === count($breadcrumbs) - 1)
                                <li class="breadcrumb-item active" style="
                                    font-size: clamp(11px,1.2vw,13px);
                                    color: rgba(255,255,255,0.55);
                                ">{{ $crumb['label'] }}</li>
                            @else
                                <li class="breadcrumb-item" style="font-size:clamp(11px,1.2vw,13px);">
                                    <a href="{{ $crumb['url'] }}" style="
                                        color: rgba(255,255,255,0.75);
                                        text-decoration: none;
                                    "
                                    onmouseover="this.style.color='#fff'"
                                    onmouseout="this.style.color='rgba(255,255,255,0.75)'">{{ $crumb['label'] }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ol>
                </nav>
                @endif
            </div>
        </div>
    </div>
</section>
