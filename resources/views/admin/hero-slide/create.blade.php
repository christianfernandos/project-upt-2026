@extends('partials.admin')
@section('title', 'Tambah Slide Hero')
@section('main')
<div class="pc-content">

    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0"><i class="ph ph-plus-circle me-2 text-success"></i>Tambah Slide Hero</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ph ph-house"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.hero-slide.index') }}">Hero Slider</a></li>
                            <li class="breadcrumb-item" aria-current="page">Tambah</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="ph ph-image me-2"></i>Form Tambah Slide</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.hero-slide.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Preview --}}
                        <div class="mb-4 text-center">
                            <div id="previewBox" style="
                                width:100%;height:220px;border-radius:12px;
                                background:#f0f4ff;border:2px dashed #b0c4de;
                                display:flex;align-items:center;justify-content:center;
                                overflow:hidden;position:relative;
                            ">
                                <div id="previewPlaceholder" style="text-align:center;color:#999;">
                                    <i class="ph ph-image" style="font-size:3rem;display:block;margin-bottom:8px;"></i>
                                    <span style="font-size:13px;">Preview foto slide</span>
                                </div>
                                <img id="previewImg" src="" alt="Preview"
                                     style="display:none;width:100%;height:100%;object-fit:cover;border-radius:12px;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Foto Background <span class="text-danger">*</span></label>
                            <input type="file" name="foto" id="fotoInput" class="form-control @error('foto') is-invalid @enderror"
                                   accept="image/png,image/jpeg,image/webp" required>
                            <div class="form-text text-muted">Format: JPG, PNG, WEBP. Maks 5 MB. Rekomendasi: 1600×700 px (landscape).</div>
                            @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Judul Slide</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                                   placeholder="Contoh: Pelatihan Berbasis Kompetensi"
                                   value="{{ old('judul') }}">
                            <div class="form-text">Judul akan ditampilkan di atas teks hero (opsional).</div>
                            @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Sub Judul / Deskripsi Singkat</label>
                            <input type="text" name="subjudul" class="form-control @error('subjudul') is-invalid @enderror"
                                   placeholder="Contoh: Meningkatkan kualitas SDM Tenaga Kerja Surabaya"
                                   value="{{ old('subjudul') }}">
                            @error('subjudul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Urutan Tampil</label>
                                <input type="number" name="urutan" class="form-control" min="0" value="{{ old('urutan', 0) }}">
                                <div class="form-text">Angka terkecil tampil pertama.</div>
                            </div>
                            <div class="col-md-6 mb-3 d-flex align-items-end">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" name="aktif" id="aktifSwitch" checked>
                                    <label class="form-check-label fw-semibold" for="aktifSwitch">Aktifkan Slide</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="ph ph-floppy-disk me-1"></i> Simpan Slide
                            </button>
                            <a href="{{ route('admin.hero-slide.index') }}" class="btn btn-outline-secondary">
                                <i class="ph ph-arrow-left me-1"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@push('js')
<script>
document.getElementById('fotoInput').addEventListener('change', function(e){
    const file = e.target.files[0];
    if(!file) return;
    const reader = new FileReader();
    reader.onload = function(ev){
        document.getElementById('previewImg').src = ev.target.result;
        document.getElementById('previewImg').style.display = 'block';
        document.getElementById('previewPlaceholder').style.display = 'none';
    };
    reader.readAsDataURL(file);
});
</script>
@endpush
@endsection
