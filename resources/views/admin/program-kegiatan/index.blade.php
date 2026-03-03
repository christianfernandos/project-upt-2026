@extends('partials.admin')
@section('title', 'Program Kegiatan')
@section('main')
<div class="pc-content">

    {{-- Page Header --}}
    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0">Program Kegiatan</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ph ph-house"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Program Kegiatan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        {{-- Card Header: tombol tambah + search --}}
        <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
            <a href="{{ route('admin.program-kegiatan.create') }}" class="btn btn-primary btn-sm">
                <i class="ph ph-plus me-1"></i> Tambah Program Kegiatan
            </a>
            <form method="GET" action="{{ route('admin.program-kegiatan.index') }}" class="d-flex gap-2">
                <input type="text" name="search" class="form-control form-control-sm"
                    placeholder="Cari nama / kategori..." value="{{ request('search') }}"
                    style="min-width:220px;">
                <button type="submit" class="btn btn-outline-secondary btn-sm">
                    <i class="ph ph-magnifying-glass"></i>
                </button>
                @if(request('search'))
                <a href="{{ route('admin.program-kegiatan.index') }}" class="btn btn-outline-danger btn-sm" title="Reset">
                    <i class="ph ph-x"></i>
                </a>
                @endif
            </form>
        </div>

        {{-- Tabel --}}
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle mb-0" style="min-width:780px;">
                    <thead style="background:#1a237e; color:#fff;">
                        <tr>
                            <th class="text-center" style="width:52px;">No</th>
                            <th class="text-center" style="width:86px;">Foto</th>
                            <th style="min-width:200px;">Nama Kegiatan</th>
                            <th style="width:140px;">Kategori</th>
                            <th style="width:110px;">Durasi</th>
                            <th style="min-width:200px;">Narasi</th>
                            <th class="text-center" style="width:100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $item)
                        <tr>
                            <td class="text-center text-muted small">
                                {{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}
                            </td>
                            <td class="text-center">
                                @if($item->foto)
                                    <img src="{{ asset('images/program/' . $item->foto) }}"
                                         class="rounded" width="68" height="48"
                                         style="object-fit:cover; display:block; margin:auto;"
                                         alt="{{ $item->nama_kegiatan }}">
                                @else
                                    <span class="badge bg-secondary" style="font-size:10px;">Tidak ada foto</span>
                                @endif
                            </td>
                            <td class="fw-semibold" style="font-size:13.5px;">
                                {{ $item->nama_kegiatan }}
                            </td>
                            <td>
                                @if($item->kategori)
                                    <span class="badge rounded-pill px-2 py-1"
                                          style="background:#e8f0fe; color:#1a237e; font-size:11px; font-weight:600; white-space:normal; word-break:break-word;">
                                        {{ $item->kategori }}
                                    </span>
                                @else
                                    <span class="text-muted small">-</span>
                                @endif
                            </td>
                            <td class="small text-muted">{{ $item->durasi ?? '-' }}</td>
                            <td class="small text-muted" style="line-height:1.55;">
                                {{ Str::limit(strip_tags($item->narasi), 100) }}
                            </td>
                            <td class="text-center">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('admin.program-kegiatan.edit', $item->id) }}"
                                       class="btn btn-warning btn-sm px-2" title="Edit">
                                        <i class="ph ph-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.program-kegiatan.destroy', $item->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm px-2" title="Hapus"
                                            onclick="return confirm('Hapus program kegiatan ini?')">
                                            <i class="ph ph-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-5">
                                <i class="ph ph-calendar-x" style="font-size:2.5rem; display:block; margin-bottom:8px; opacity:.4;"></i>
                                Belum ada data program kegiatan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Footer: info + pagination --}}
        @if($data->total() > 0)
        <div class="card-footer d-flex flex-wrap align-items-center justify-content-between gap-2">
            <p class="mb-0 text-muted small">
                Menampilkan <strong>{{ $data->firstItem() }}</strong>–<strong>{{ $data->lastItem() }}</strong>
                dari <strong>{{ $data->total() }}</strong> entri
            </p>
            <div>
                {{ $data->links('pagination::bootstrap-5') }}
            </div>
        </div>
        @endif
    </div>

</div>
@endsection

