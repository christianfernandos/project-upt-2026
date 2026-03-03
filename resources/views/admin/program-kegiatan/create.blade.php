@extends('partials.admin')
@section('title', 'Tambah Program Kegiatan')
@section('main')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0">Tambah Program Kegiatan</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ph ph-house"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.program-kegiatan.index') }}">Program Kegiatan</a></li>
                            <li class="breadcrumb-item" aria-current="page">Tambah</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h5 class="mb-0">Form Tambah Program Kegiatan</h5></div>
                <div class="card-body">
                    <form action="{{ route('admin.program-kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label class="form-label fw-semibold">Nama Kegiatan <span class="text-danger">*</span></label>
                                <input type="text" name="nama_kegiatan" class="form-control @error('nama_kegiatan') is-invalid @enderror"
                                       value="{{ old('nama_kegiatan') }}" placeholder="Nama program kegiatan" required>
                                @error('nama_kegiatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                                <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="pelatihan-kerja"           {{ old('kategori')=='pelatihan-kerja' ? 'selected' : '' }}>Pelatihan Kerja</option>
                                    <option value="peningkatan-produktivitas" {{ old('kategori')=='peningkatan-produktivitas' ? 'selected' : '' }}>Peningkatan Produktivitas</option>
                                    <option value="sertifikasi-kompetensi"    {{ old('kategori')=='sertifikasi-kompetensi' ? 'selected' : '' }}>Sertifikasi Kompetensi</option>
                                    <option value="konsultasi"                {{ old('kategori')=='konsultasi' ? 'selected' : '' }}>Konsultasi Produktivitas</option>
                                    <option value="magang-industri"           {{ old('kategori')=='magang-industri' ? 'selected' : '' }}>Magang Industri</option>
                                </select>
                                @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Durasi</label>
                                <input type="text" name="durasi" class="form-control @error('durasi') is-invalid @enderror"
                                       value="{{ old('durasi') }}" placeholder="Contoh: 3 hari, 40 jam">
                                @error('durasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Target Peserta</label>
                                <input type="text" name="peserta_target" class="form-control @error('peserta_target') is-invalid @enderror"
                                       value="{{ old('peserta_target') }}" placeholder="Contoh: Karyawan, Pengusaha, Umum">
                                @error('peserta_target') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Narasi / Deskripsi <span class="text-danger">*</span></label>
                            <textarea name="narasi" rows="6"
                                      class="form-control @error('narasi') is-invalid @enderror"
                                      placeholder="Deskripsi program kegiatan..." required>{{ old('narasi') }}</textarea>
                            @error('narasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Foto</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                                   accept="image/*" onchange="previewFoto(this)">
                            <small class="text-muted">Format: JPG, PNG, WEBP. Maks 2MB.</small>
                            @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            <div id="fotoPreview" class="mt-2 d-none">
                                <img id="previewImg" src="#" class="img-thumbnail" style="max-height:200px;" alt="Preview">
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="ph ph-floppy-disk me-1"></i> Simpan
                            </button>
                            <a href="{{ route('admin.program-kegiatan.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
function previewFoto(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('fotoPreview').classList.remove('d-none');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
@endsection
