@extends('partials.front')
@section('title', 'Kalkulator Produktivitas - UPT BLP2TK Surabaya')
@section('content')
<main id="main">

    @include('partials._page-header', [
        'title'       => 'Kalkulator Produktivitas',
        'subtitle'    => 'Data Produktivitas Perusahaan',
        'icon'        => 'bi-calculator-fill',
        'gradient'    => 'linear-gradient(135deg, #1a237e 0%, #1565c0 100%)',
        'breadcrumbs' => [
            ['label' => 'Beranda', 'url' => route('beranda')],
            ['label' => 'Kalkulator Produktivitas', 'url' => '#'],
        ],
    ])

    <!-- ======= Tabel Hasil Kalkulator ======= -->
    <section class="py-5">
        <div class="container" data-aos="fade-up">

            @if($kalkulatorList->count() > 0)

            <!-- Ringkasan Statistik -->
            @php
                $totalTK      = $kalkulatorList->sum('tenaga_kerja');
                $totalOmzet   = $kalkulatorList->sum(fn($k) => $k->total_omzet);
                $rataProduktivitas = $kalkulatorList->count() > 0
                    ? $kalkulatorList->avg(fn($k) => $k->produktivitas_per_tk)
                    : 0;
            @endphp
            <div class="row gy-3 justify-content-center mb-5">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center p-4 h-100"
                         style="border-left:4px solid #0d6efd !important; border-radius:12px;">
                        <i class="bi bi-building fs-2 text-primary mb-2"></i>
                        <p class="text-muted mb-1" style="font-size:13px;">Total Perusahaan</p>
                        <h3 class="fw-bold text-primary mb-0">{{ $kalkulatorList->count() }}</h3>
                        <small class="text-muted">perusahaan terdaftar</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center p-4 h-100"
                         style="border-left:4px solid #198754 !important; border-radius:12px;">
                        <i class="bi bi-people-fill fs-2 text-success mb-2"></i>
                        <p class="text-muted mb-1" style="font-size:13px;">Total Tenaga Kerja</p>
                        <h3 class="fw-bold text-success mb-0">{{ number_format($totalTK) }}</h3>
                        <small class="text-muted">orang</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center p-4 h-100"
                         style="border-left:4px solid #ffc107 !important; border-radius:12px;">
                        <i class="bi bi-graph-up-arrow fs-2 text-warning mb-2"></i>
                        <p class="text-muted mb-1" style="font-size:13px;">Rata-rata Produktivitas/TK</p>
                        <h3 class="fw-bold text-warning mb-0">
                            Rp {{ number_format($rataProduktivitas / 1000000, 1) }}M
                        </h3>
                        <small class="text-muted">per tahun</small>
                    </div>
                </div>
            </div>

            <!-- Tabel Data -->
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card border-0 shadow-sm" style="border-radius:14px; overflow:hidden;">

                        <!-- Header tabel -->
                        <div class="d-flex align-items-center justify-content-between px-4 py-3"
                             style="background:linear-gradient(135deg,#1a237e,#1565c0);">
                            <h6 class="text-white fw-bold mb-0">
                                <i class="bi bi-table me-2"></i>Data Produktivitas Tenaga Kerja
                            </h6>
                            <span class="badge bg-white text-primary fw-bold">
                                {{ $kalkulatorList->count() }} Data
                            </span>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead style="background:#f0f4ff;">
                                    <tr>
                                        <th class="ps-4 py-3" style="font-size:13px; color:#444; width:40px;">#</th>
                                        <th class="py-3" style="font-size:13px; color:#444;">Nama Perusahaan</th>
                                        <th class="py-3" style="font-size:13px; color:#444;">Alamat</th>
                                        <th class="py-3 text-center" style="font-size:13px; color:#444;">Jumlah TK</th>
                                        <th class="py-3 text-end" style="font-size:13px; color:#444;">Total Omzet / Tahun</th>
                                        <th class="py-3 text-end" style="font-size:13px; color:#444;">Produktivitas / TK</th>
                                        <th class="py-3 text-center" style="font-size:13px; color:#444;">Rekomendasi TK</th>
                                        <th class="py-3 text-center pe-4" style="font-size:13px; color:#444;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kalkulatorList as $i => $kal)
                                    @php
                                        $rekTK    = $kal->rekomendasi_tk;
                                        $aktualTK = $kal->tenaga_kerja;
                                        if ($rekTK > $aktualTK) {
                                            $statusLabel = 'Kurang TK';
                                            $statusClass = 'bg-danger bg-opacity-10 text-danger';
                                            $statusIcon  = 'bi-arrow-up-circle-fill text-danger';
                                        } elseif ($rekTK < $aktualTK) {
                                            $statusLabel = 'Surplus TK';
                                            $statusClass = 'bg-warning bg-opacity-10 text-warning';
                                            $statusIcon  = 'bi-arrow-down-circle-fill text-warning';
                                        } else {
                                            $statusLabel = 'Optimal';
                                            $statusClass = 'bg-success bg-opacity-10 text-success';
                                            $statusIcon  = 'bi-check-circle-fill text-success';
                                        }
                                    @endphp
                                    <tr>
                                        <td class="ps-4 text-muted" style="font-size:13px;">{{ $i + 1 }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                                     style="width:34px;height:34px;background:#e8f0fe;flex-shrink:0;">
                                                    <i class="bi bi-building text-primary" style="font-size:15px;"></i>
                                                </div>
                                                <span class="fw-semibold" style="font-size:14px;">{{ $kal->nama_pt }}</span>
                                            </div>
                                        </td>
                                        <td class="text-muted" style="font-size:13px; max-width:180px;">
                                            <i class="bi bi-geo-alt me-1 text-danger"></i>
                                            {{ Str::limit($kal->alamat_pt, 35) }}
                                        </td>
                                        <td class="text-center">
                                            <span class="badge rounded-pill"
                                                  style="background:#e8f0fe; color:#1a73e8; font-size:13px; padding:6px 14px; font-weight:600;">
                                                {{ number_format($aktualTK) }} org
                                            </span>
                                        </td>
                                        <td class="text-end fw-semibold" style="font-size:14px; color:#1b5e20;">
                                            Rp {{ number_format($kal->total_omzet, 0, ',', '.') }}
                                        </td>
                                        <td class="text-end" style="font-size:13px; color:#555;">
                                            Rp {{ number_format($kal->produktivitas_per_tk, 0, ',', '.') }}
                                        </td>
                                        <td class="text-center">
                                            <span class="fw-bold" style="font-size:14px; color:#0d47a1;">
                                                {{ number_format($rekTK) }} org
                                            </span>
                                        </td>
                                        <td class="text-center pe-4">
                                            <span class="badge rounded-pill px-3 py-2 {{ $statusClass }}"
                                                  style="font-size:12px; font-weight:600;">
                                                <i class="bi {{ $statusIcon }} me-1"></i>{{ $statusLabel }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Footer tabel -->
                        <div class="px-4 py-3 d-flex gap-4 flex-wrap"
                             style="background:#f8f9fa; border-top:1px solid #eee; font-size:12px; color:#888;">
                            <span><i class="bi bi-check-circle-fill text-success me-1"></i> <b>Optimal</b>: Jumlah TK sudah ideal</span>
                            <span><i class="bi bi-arrow-up-circle-fill text-danger me-1"></i> <b>Kurang TK</b>: Disarankan menambah tenaga kerja</span>
                            <span><i class="bi bi-arrow-down-circle-fill text-warning me-1"></i> <b>Surplus TK</b>: Jumlah TK melebihi kebutuhan optimal</span>
                        </div>
                    </div>
                </div>
            </div>

            @else
            <!-- Kosong -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm text-center p-5" style="border-radius:14px;">
                        <i class="bi bi-bar-chart text-muted mb-3" style="font-size:4rem;"></i>
                        <h5 class="fw-bold mb-2">Belum Ada Data</h5>
                        <p class="text-muted mb-0">
                            Data perhitungan produktivitas belum tersedia.<br>
                            Data akan ditampilkan setelah admin menginput data perusahaan.
                        </p>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </section>

</main>
@endsection