@extends('partials.admin')
@section('title', 'Kelola Hero Slider')
@section('main')
<div class="pc-content">

    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0"><i class="ph ph-images me-2 text-primary"></i>Kelola Hero Slider</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ph ph-house"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Hero Slider</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="ph ph-images me-2"></i>Daftar Slide ({{ $data->count() }} slide)</h5>
                    <a href="{{ route('admin.hero-slide.create') }}" class="btn btn-primary btn-sm">
                        <i class="ph ph-plus me-1"></i> Tambah Slide
                    </a>
                </div>
                <div class="card-body p-0">
                    @if($data->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="60" class="text-center">No</th>
                                    <th width="160">Foto</th>
                                    <th>Judul</th>
                                    <th>Sub Judul</th>
                                    <th width="80" class="text-center">Urutan</th>
                                    <th width="90" class="text-center">Status</th>
                                    <th width="140" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $i => $slide)
                                <tr>
                                    <td class="text-center fw-bold text-muted">{{ $i + 1 }}</td>
                                    <td>
                                        @if($slide->foto && file_exists(public_path('images/hero/' . $slide->foto)))
                                            <img src="{{ asset('images/hero/' . $slide->foto) }}"
                                                 alt="Slide {{ $i+1 }}"
                                                 style="width:140px;height:70px;object-fit:cover;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.15);">
                                        @else
                                            <div style="width:140px;height:70px;border-radius:8px;background:#e9ecef;display:flex;align-items:center;justify-content:center;">
                                                <i class="ph ph-image text-muted" style="font-size:1.5rem;"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="fw-semibold" style="font-size:14px;">{{ $slide->judul ?: '—' }}</div>
                                    </td>
                                    <td>
                                        <div class="text-muted small">{{ \Illuminate\Support\Str::limit($slide->subjudul, 60) ?: '—' }}</div>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-secondary">{{ $slide->urutan }}</span>
                                    </td>
                                    <td class="text-center">
                                        @if($slide->aktif)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Non-aktif</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.hero-slide.edit', $slide->id) }}" class="btn btn-sm btn-outline-warning me-1" title="Edit">
                                            <i class="ph ph-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.hero-slide.destroy', $slide->id) }}" method="POST" class="d-inline"
                                              onsubmit="return confirm('Hapus slide ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                <i class="ph ph-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-5 text-muted">
                        <i class="ph ph-images" style="font-size:3rem;display:block;margin-bottom:12px;"></i>
                        <p class="mb-3">Belum ada slide. Tambahkan slide pertama Anda.</p>
                        <a href="{{ route('admin.hero-slide.create') }}" class="btn btn-primary btn-sm">
                            <i class="ph ph-plus me-1"></i> Tambah Slide
                        </a>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Info panduan --}}
            <div class="card mt-3 border-0" style="background:#e8f4ff;">
                <div class="card-body py-3">
                    <div class="d-flex gap-3 align-items-start">
                        <i class="ph ph-info text-primary mt-1" style="font-size:1.2rem;flex-shrink:0;"></i>
                        <div style="font-size:13px;color:#444;">
                            <strong>Panduan Hero Slider:</strong>
                            Ukuran gambar yang disarankan: <strong>1600 × 700 px</strong> atau lebih (landscape).
                            Gunakan urutan angka untuk mengatur posisi slide (terkecil tampil pertama).
                            Minimal <strong>1 slide aktif</strong> agar beranda tidak kosong.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
