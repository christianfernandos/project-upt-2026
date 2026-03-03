@extends('partials.admin')
@section('title', 'Edit Kalkulator')
@section('main')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0">Edit Data Kalkulator Produktivitas</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ph ph-house"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.kalkulator.index') }}">Kalkulator</a></li>
                            <li class="breadcrumb-item" aria-current="page">Edit</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h5 class="mb-0">Form Edit Data Kalkulator</h5></div>
                <div class="card-body">
                    <form action="{{ route('admin.kalkulator.update', $data->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nama Perusahaan <span class="text-danger">*</span></label>
                                <input type="text" name="nama_pt" class="form-control @error('nama_pt') is-invalid @enderror"
                                       value="{{ old('nama_pt', $data->nama_pt) }}" required>
                                @error('nama_pt') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Alamat Perusahaan <span class="text-danger">*</span></label>
                                <input type="text" name="alamat_pt" class="form-control @error('alamat_pt') is-invalid @enderror"
                                       value="{{ old('alamat_pt', $data->alamat_pt) }}" required>
                                @error('alamat_pt') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <hr>
                        {{-- OMZET --}}
                        <h6 class="fw-bold mb-3"><i class="ph ph-chart-line me-1"></i> Omzet (Rp)</h6>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Periode 1</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="omzet_1" min="0"
                                           class="form-control @error('omzet_1') is-invalid @enderror"
                                           value="{{ old('omzet_1', $data->omzet_1) }}" oninput="hitungTotal()">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Periode 2</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="omzet_2" min="0"
                                           class="form-control @error('omzet_2') is-invalid @enderror"
                                           value="{{ old('omzet_2', $data->omzet_2) }}" oninput="hitungTotal()">
                                </div>
                            </div>
                        </div>

                        <hr>
                        {{-- TENAGA KERJA --}}
                        <h6 class="fw-bold mb-3"><i class="ph ph-users me-1"></i> Tenaga Kerja</h6>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Periode 1</label>
                                <input type="number" name="tenaga_kerja" min="1"
                                       class="form-control @error('tenaga_kerja') is-invalid @enderror"
                                       value="{{ old('tenaga_kerja', $data->tenaga_kerja) }}" required oninput="hitungTotal()">
                                @error('tenaga_kerja') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Periode 2 <span class="text-muted fw-normal">(opsional)</span></label>
                                <input type="number" name="tenaga_kerja_2" min="0"
                                       class="form-control"
                                       value="{{ old('tenaga_kerja_2') }}" oninput="hitungTotal()">
                            </div>
                        </div>

                        <div class="alert alert-info mt-2">
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <div class="fw-bold">Total Omzet (2 Periode)</div>
                                    <div class="fs-5" id="totalOmzet">Rp {{ number_format($data->total_omzet, 0, ',', '.') }}</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fw-bold">Produktivitas per TK</div>
                                    <div class="fs-5" id="prodPerTk">Rp {{ number_format($data->produktivitas_per_tk, 0, ',', '.') }}</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fw-bold">Rekomendasi</div>
                                    <div class="fs-5" id="rekomendasiTk">-</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="ph ph-floppy-disk me-1"></i> Update
                            </button>
                            <a href="{{ route('admin.kalkulator.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
function hitungTotal() {
    const omzet1 = parseFloat(document.querySelector('[name="omzet_1"]').value) || 0;
    const omzet2 = parseFloat(document.querySelector('[name="omzet_2"]').value) || 0;
    const total  = omzet1 + omzet2;

    const tk = parseInt(document.querySelector('[name="tenaga_kerja"]').value) || 1;
    const prodPerTk = total / tk;

    let rek = '-';
    if (prodPerTk >= 8333333)      rek = 'Sangat Produktif';
    else if (prodPerTk >= 5000000) rek = 'Produktif';
    else if (prodPerTk >= 2500000) rek = 'Cukup Produktif';
    else if (prodPerTk > 0)        rek = 'Perlu Peningkatan';

    document.getElementById('totalOmzet').textContent  = 'Rp ' + total.toLocaleString('id-ID');
    document.getElementById('prodPerTk').textContent   = 'Rp ' + Math.round(prodPerTk).toLocaleString('id-ID');
    document.getElementById('rekomendasiTk').textContent = rek;
}
document.querySelector('[name="tenaga_kerja"]')?.addEventListener('input', hitungTotal);
document.querySelector('[name="tenaga_kerja_2"]')?.addEventListener('input', hitungTotal);
</script>
@endpush
@endsection
