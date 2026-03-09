@extends('partials.admin')
@section('title', 'Edit Slide Hero')
@section('main')
<div class="pc-content">

    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0"><i class="ph ph-pencil me-2 text-warning"></i>Edit Slide Hero</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ph ph-house"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.hero-slide.index') }}">Hero Slider</a></li>
                            <li class="breadcrumb-item" aria-current="page">Edit</li>
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
                    <h5 class="mb-0"><i class="ph ph-pencil me-2"></i>Form Edit Slide</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.hero-slide.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')

                        {{-- Preview foto saat ini --}}
                        <div class="mb-4 text-center">
                            <div id="previewBox" style="
                                width:100%;height:220px;border-radius:12px;
                                background:#f0f4ff;border:2px dashed #b0c4de;
                                overflow:hidden;position:relative;
                            ">
                                @if($data->foto && file_exists(public_path('images/hero/' . $data->foto)))
                                    <img id="previewImg" src="{{ asset('images/hero/' . $data->foto) }}"
                                         style="width:100%;height:100%;object-fit:cover;">
                                    <div style="position:absolute;bottom:8px;right:10px;background:rgba(0,0,0,0.55);color:#fff;font-size:11px;padding:3px 10px;border-radius:20px;">
                                        Foto saat ini
                                    </div>
                                @else
                                    <div id="previewPlaceholder" style="display:flex;align-items:center;justify-content:center;height:100%;text-align:center;color:#999;">
                                        <div>
                                            <i class="ph ph-image" style="font-size:3rem;display:block;margin-bottom:8px;"></i>
                                            <span style="font-size:13px;">Belum ada foto</span>
                                        </div>
                                    </div>
                                    <img id="previewImg" src="" alt="Preview" style="display:none;width:100%;height:100%;object-fit:cover;">
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Ganti Foto Background</label>
                            <input type="file" name="foto" id="fotoInput" class="form-control @error('foto') is-invalid @enderror"
                                   accept="image/png,image/jpeg,image/webp">
                            <div class="form-text text-muted">Kosongkan jika tidak ingin mengganti foto. Maks 5 MB.</div>
                            @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Judul Slide</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                                   placeholder="Contoh: Pelatihan Berbasis Kompetensi"
                                   value="{{ old('judul', $data->judul) }}">
                            @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Sub Judul / Deskripsi Singkat</label>
                            <input type="text" name="subjudul" class="form-control @error('subjudul') is-invalid @enderror"
                                   placeholder="Contoh: Meningkatkan kualitas SDM Tenaga Kerja Surabaya"
                                   value="{{ old('subjudul', $data->subjudul) }}">
                            @error('subjudul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Urutan Tampil</label>
                                <input type="number" name="urutan" class="form-control" min="0"
                                       value="{{ old('urutan', $data->urutan) }}">
                                <div class="form-text">Angka terkecil tampil pertama.</div>
                            </div>
                            <div class="col-md-6 mb-3 d-flex align-items-end">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" name="aktif" id="aktifSwitch"
                                           {{ $data->aktif ? 'checked' : '' }}>
                                    <label class="form-check-label fw-semibold" for="aktifSwitch">Aktifkan Slide</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-2">
                            <button type="submit" class="btn btn-warning text-white">
                                <i class="ph ph-floppy-disk me-1"></i> Perbarui Slide
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
        const img = document.getElementById('previewImg');
        img.src = ev.target.result;
        img.style.display = 'block';
        const placeholder = document.getElementById('previewPlaceholder');
        if(placeholder) placeholder.style.display = 'none';
    };
    reader.readAsDataURL(file);
});
</script>
@endpush
@endsection
