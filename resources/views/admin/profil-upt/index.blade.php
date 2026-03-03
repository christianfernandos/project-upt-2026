@extends('partials.admin')
@section('title', 'Profil UPT')
@section('main')
<div class="pc-content">
    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0">Profil UPT</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ph ph-house"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Profil UPT</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.profil-upt.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row gy-4">

            {{-- Struktur Organisasi --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h5 class="mb-0"><i class="ph ph-diagram-three me-2"></i>Struktur Organisasi</h5></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Upload Gambar Struktur Organisasi</label>
                                <input type="file" name="foto_struktur" class="form-control" accept="image/*" id="foto-struktur-input">
                                <small class="text-muted">Format: JPG, PNG. Maks 5MB</small>
                            </div>
                            <div class="col-md-6 text-center">
                                @if($data->foto_struktur)
                                    <p class="text-muted mb-1">Gambar saat ini:</p>
                                    <img src="{{ asset('images/profil/' . $data->foto_struktur) }}"
                                         class="img-fluid rounded shadow" style="max-height:200px;"
                                         alt="Struktur Organisasi">
                                @else
                                    <div class="alert alert-info">Belum ada gambar struktur organisasi.</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tugas dan Fungsi --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h5 class="mb-0"><i class="ph ph-list-checks me-2"></i>Tugas dan Fungsi</h5></div>
                    <div class="card-body">
                        <label class="form-label fw-semibold">Teks Tugas dan Fungsi</label>
                        <textarea name="tugas_fungsi" class="form-control" rows="10"
                            placeholder="Masukkan teks tugas dan fungsi UPT...">{{ old('tugas_fungsi', $data->tugas_fungsi) }}</textarea>
                        <small class="text-muted">Gunakan baris baru untuk memisahkan poin-poin.</small>
                    </div>
                </div>
            </div>

            {{-- Visi Misi --}}
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header"><h5 class="mb-0"><i class="ph ph-eye me-2"></i>Visi</h5></div>
                    <div class="card-body">
                        <textarea name="visi" class="form-control" rows="6"
                            placeholder="Masukkan teks visi UPT...">{{ old('visi', $data->visi) }}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header"><h5 class="mb-0"><i class="ph ph-target me-2"></i>Misi</h5></div>
                    <div class="card-body">
                        <textarea name="misi" class="form-control" rows="6"
                            placeholder="Masukkan teks misi UPT...">{{ old('misi', $data->misi) }}</textarea>
                    </div>
                </div>
            </div>

            {{-- ============ TENTANG KAMI ============ --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary bg-opacity-10">
                        <h5 class="mb-0 text-primary"><i class="ph ph-info me-2"></i>Tentang Kami (Halaman Beranda)</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Judul</label>
                                <input type="text" name="tentang_judul" class="form-control"
                                    placeholder="Pusat Pelatihan &amp; Pengembangan"
                                    value="{{ old('tentang_judul', $data->tentang_judul) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Sub Judul (warna biru)</label>
                                <input type="text" name="tentang_subjudul" class="form-control"
                                    placeholder="Produktivitas Tenaga Kerja"
                                    value="{{ old('tentang_subjudul', $data->tentang_subjudul) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Deskripsi Paragraf 1</label>
                                <textarea name="tentang_deskripsi_1" class="form-control" rows="4"
                                    placeholder="UPT Balai Latihan...">{{ old('tentang_deskripsi_1', $data->tentang_deskripsi_1) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Deskripsi Paragraf 2</label>
                                <textarea name="tentang_deskripsi_2" class="form-control" rows="4"
                                    placeholder="Kami berkomitmen...">{{ old('tentang_deskripsi_2', $data->tentang_deskripsi_2) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Poin / Fitur Unggulan</label>
                                <textarea name="tentang_fitur" class="form-control" rows="5"
                                    placeholder="Pelatihan bersertifikat SKKNI&#10;Fasilitas workshop lengkap&#10;Program magang dan penempatan kerja&#10;Konsultasi produktivitas gratis">{{ old('tentang_fitur', is_array($data->tentang_fitur) ? implode("\n", $data->tentang_fitur) : '') }}</textarea>
                                <small class="text-muted">Satu poin per baris. Maksimal 6 poin.</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Foto Tentang Kami</label>
                                <input type="file" name="foto_tentang" class="form-control" accept="image/*">
                                <small class="text-muted">Format: JPG, PNG. Maks 5MB</small>
                                @if($data->foto_tentang)
                                    <div class="mt-2">
                                        <img src="{{ asset('images/profil/' . $data->foto_tentang) }}"
                                             class="img-fluid rounded shadow" style="max-height:150px;" alt="Foto Tentang">
                                        <p class="text-muted small mt-1">Foto saat ini</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ============ KEUNGGULAN ============ --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary bg-opacity-10 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 text-primary"><i class="ph ph-star me-2"></i>Keunggulan (Mengapa Memilih UPT BLP2TK?)</h5>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="tambahKeunggulan()">
                            <i class="ph ph-plus me-1"></i> Tambah Item
                        </button>
                    </div>
                    <div class="card-body">
                        <small class="text-muted d-block mb-3">
                            <i class="ph ph-info-circle me-1"></i>
                            Gunakan nama ikon Bootstrap Icons, contoh: <code>bi-person-check-fill</code>, <code>bi-tools</code>, <code>bi-shield-check</code>
                            — <a href="https://icons.getbootstrap.com/" target="_blank">Lihat semua ikon</a>
                        </small>
                        <div id="keunggulan-list">
                            @php $keunggulanList = $data->keunggulan ?? []; @endphp
                            @if(count($keunggulanList) > 0)
                                @foreach($keunggulanList as $i => $k)
                                <div class="keunggulan-item border rounded p-3 mb-3 bg-light">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="fw-semibold text-muted small">Item {{ $i + 1 }}</span>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="hapusKeunggulan(this)">
                                            <i class="ph ph-trash"></i>
                                        </button>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-3">
                                            <label class="form-label small fw-semibold">Icon Bootstrap</label>
                                            <input type="text" name="keunggulan_icon[]" class="form-control form-control-sm"
                                                placeholder="bi-person-check-fill" value="{{ $k['icon'] ?? '' }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label small fw-semibold">Judul</label>
                                            <input type="text" name="keunggulan_title[]" class="form-control form-control-sm"
                                                placeholder="Instruktur Bersertifikat" value="{{ $k['title'] ?? '' }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label small fw-semibold">Deskripsi</label>
                                            <input type="text" name="keunggulan_desc[]" class="form-control form-control-sm"
                                                placeholder="Deskripsi singkat..." value="{{ $k['desc'] ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                {{-- Default 4 item kosong --}}
                                @for($i = 0; $i < 4; $i++)
                                <div class="keunggulan-item border rounded p-3 mb-3 bg-light">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="fw-semibold text-muted small">Item {{ $i + 1 }}</span>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="hapusKeunggulan(this)">
                                            <i class="ph ph-trash"></i>
                                        </button>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-3">
                                            <label class="form-label small fw-semibold">Icon Bootstrap</label>
                                            <input type="text" name="keunggulan_icon[]" class="form-control form-control-sm" placeholder="bi-person-check-fill">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label small fw-semibold">Judul</label>
                                            <input type="text" name="keunggulan_title[]" class="form-control form-control-sm" placeholder="Instruktur Bersertifikat">
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label small fw-semibold">Deskripsi</label>
                                            <input type="text" name="keunggulan_desc[]" class="form-control form-control-sm" placeholder="Deskripsi singkat...">
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Layanan Kami --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="ph ph-squares-four me-2"></i>Layanan Kami <small class="text-muted fw-normal">(Ditampilkan di Beranda)</small></h5>
                        <button type="button" class="btn btn-sm btn-primary" onclick="tambahLayanan()">
                            <i class="ph ph-plus me-1"></i> Tambah Layanan
                        </button>
                    </div>
                    <div class="card-body">
                        <p class="text-muted small mb-3"><i class="ph ph-info me-1"></i>Gunakan nama icon Bootstrap Icons, contoh: <code>bi-mortarboard-fill</code>, <code>bi-graph-up-arrow</code>, <code>bi-patch-check-fill</code>.</p>
                        <div id="layanan-list">
                            @if(is_array($data->layanan) && count($data->layanan) > 0)
                                @foreach($data->layanan as $idx => $lay)
                                <div class="layanan-item border rounded p-3 mb-3 bg-light">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="fw-semibold text-muted small">Layanan {{ $idx + 1 }}</span>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="hapusLayanan(this)">
                                            <i class="ph ph-trash"></i>
                                        </button>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-2">
                                            <label class="form-label small fw-semibold">Icon Bootstrap</label>
                                            <input type="text" name="layanan_icon[]" class="form-control form-control-sm"
                                                placeholder="bi-mortarboard-fill" value="{{ $lay['icon'] ?? '' }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label small fw-semibold">Judul Layanan</label>
                                            <input type="text" name="layanan_title[]" class="form-control form-control-sm"
                                                placeholder="Pelatihan Berbasis Kompetensi" value="{{ $lay['title'] ?? '' }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label small fw-semibold">Deskripsi</label>
                                            <input type="text" name="layanan_desc[]" class="form-control form-control-sm"
                                                placeholder="Deskripsi singkat layanan..." value="{{ $lay['desc'] ?? '' }}">
                                        </div>
                                        <div class="col-md-1">
                                            <label class="form-label small fw-semibold">Warna BG</label>
                                            <input type="color" name="layanan_bg[]" class="form-control form-control-sm form-control-color"
                                                value="{{ $lay['bg'] ?? '#e8f0fe' }}" title="Warna background icon">
                                        </div>
                                        <div class="col-md-1">
                                            <label class="form-label small fw-semibold">Warna Icon</label>
                                            <input type="color" name="layanan_color[]" class="form-control form-control-sm form-control-color"
                                                value="{{ $lay['color'] ?? '#1a237e' }}" title="Warna icon">
                                        </div>
                                        <div class="col-md-1 d-flex align-items-end">
                                            <div class="p-2 rounded text-center w-100" style="background:{{ $lay['bg'] ?? '#e8f0fe' }};">
                                                <i class="bi {{ $lay['icon'] ?? 'bi-star' }}" style="font-size:1.3rem;color:{{ $lay['color'] ?? '#1a237e' }};"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                {{-- Default 6 item kosong --}}
                                @php
                                $defaultLayanan = [
                                    ['icon'=>'bi-mortarboard-fill','title'=>'Pelatihan Berbasis Kompetensi','desc'=>'Program pelatihan terstruktur sesuai SKKNI di berbagai bidang kejuruan.','bg'=>'#e8f0fe','color'=>'#1a237e'],
                                    ['icon'=>'bi-graph-up-arrow','title'=>'Pengukuran Produktivitas','desc'=>'Pengukuran dan analisis produktivitas tenaga kerja dengan metode ilmiah.','bg'=>'#e8f5e9','color'=>'#1b5e20'],
                                    ['icon'=>'bi-patch-check-fill','title'=>'Sertifikasi Kompetensi','desc'=>'Fasilitasi uji kompetensi dan sertifikasi resmi melalui LSP berlisensi.','bg'=>'#fff3e0','color'=>'#e65100'],
                                    ['icon'=>'bi-people-fill','title'=>'Konsultasi & Bimbingan','desc'=>'Konsultasi dan bimbingan teknis peningkatan produktivitas untuk perusahaan.','bg'=>'#f3e5f5','color'=>'#4a148c'],
                                    ['icon'=>'bi-laptop','title'=>'Pelatihan Digital','desc'=>'Program pelatihan teknologi informasi untuk menghadapi era industri 4.0.','bg'=>'#e0f7fa','color'=>'#006064'],
                                    ['icon'=>'bi-building','title'=>'Kerjasama Perusahaan','desc'=>'Program magang, rekrutmen, dan kerjasama pelatihan dengan industri mitra.','bg'=>'#fce4ec','color'=>'#b71c1c'],
                                ];
                                @endphp
                                @foreach($defaultLayanan as $dIdx => $dLay)
                                <div class="layanan-item border rounded p-3 mb-3 bg-light">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="fw-semibold text-muted small">Layanan {{ $dIdx + 1 }}</span>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="hapusLayanan(this)">
                                            <i class="ph ph-trash"></i>
                                        </button>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-2">
                                            <label class="form-label small fw-semibold">Icon Bootstrap</label>
                                            <input type="text" name="layanan_icon[]" class="form-control form-control-sm"
                                                placeholder="bi-mortarboard-fill" value="{{ $dLay['icon'] }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label small fw-semibold">Judul Layanan</label>
                                            <input type="text" name="layanan_title[]" class="form-control form-control-sm"
                                                placeholder="Pelatihan Berbasis Kompetensi" value="{{ $dLay['title'] }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label small fw-semibold">Deskripsi</label>
                                            <input type="text" name="layanan_desc[]" class="form-control form-control-sm"
                                                placeholder="Deskripsi singkat layanan..." value="{{ $dLay['desc'] }}">
                                        </div>
                                        <div class="col-md-1">
                                            <label class="form-label small fw-semibold">Warna BG</label>
                                            <input type="color" name="layanan_bg[]" class="form-control form-control-sm form-control-color"
                                                value="{{ $dLay['bg'] }}" title="Warna background icon">
                                        </div>
                                        <div class="col-md-1">
                                            <label class="form-label small fw-semibold">Warna Icon</label>
                                            <input type="color" name="layanan_color[]" class="form-control form-control-sm form-control-color"
                                                value="{{ $dLay['color'] }}" title="Warna icon">
                                        </div>
                                        <div class="col-md-1 d-flex align-items-end">
                                            <div class="p-2 rounded text-center w-100" style="background:{{ $dLay['bg'] }};">
                                                <i class="bi {{ $dLay['icon'] }}" style="font-size:1.3rem;color:{{ $dLay['color'] }};"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary px-5">
                    <i class="ph ph-floppy-disk me-1"></i> Simpan Semua Perubahan
                </button>
            </div>
        </div>
    </form>
</div>

@push('js')
<script>
let itemCount = {{ count($data->keunggulan ?? []) ?: 4 }};

function tambahKeunggulan() {
    itemCount++;
    const list = document.getElementById('keunggulan-list');
    const div = document.createElement('div');
    div.className = 'keunggulan-item border rounded p-3 mb-3 bg-light';
    div.innerHTML = `
        <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="fw-semibold text-muted small">Item ${itemCount}</span>
            <button type="button" class="btn btn-sm btn-outline-danger" onclick="hapusKeunggulan(this)">
                <i class="ph ph-trash"></i>
            </button>
        </div>
        <div class="row g-2">
            <div class="col-md-3">
                <label class="form-label small fw-semibold">Icon Bootstrap</label>
                <input type="text" name="keunggulan_icon[]" class="form-control form-control-sm" placeholder="bi-person-check-fill">
            </div>
            <div class="col-md-4">
                <label class="form-label small fw-semibold">Judul</label>
                <input type="text" name="keunggulan_title[]" class="form-control form-control-sm" placeholder="Instruktur Bersertifikat">
            </div>
            <div class="col-md-5">
                <label class="form-label small fw-semibold">Deskripsi</label>
                <input type="text" name="keunggulan_desc[]" class="form-control form-control-sm" placeholder="Deskripsi singkat...">
            </div>
        </div>`;
    list.appendChild(div);
    renumberItems();
}

function hapusKeunggulan(btn) {
    const item = btn.closest('.keunggulan-item');
    if (document.querySelectorAll('.keunggulan-item').length <= 1) {
        alert('Minimal harus ada 1 item keunggulan.');
        return;
    }
    item.remove();
    renumberItems();
}

function renumberItems() {
    document.querySelectorAll('.keunggulan-item').forEach((el, i) => {
        el.querySelector('span.fw-semibold').textContent = `Item ${i + 1}`;
    });
}

// === LAYANAN KAMI ===
let layananCount = {{ count($data->layanan ?? []) ?: 6 }};

function tambahLayanan() {
    layananCount++;
    const list = document.getElementById('layanan-list');
    const div = document.createElement('div');
    div.className = 'layanan-item border rounded p-3 mb-3 bg-light';
    div.innerHTML = `
        <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="fw-semibold text-muted small">Layanan ${layananCount}</span>
            <button type="button" class="btn btn-sm btn-outline-danger" onclick="hapusLayanan(this)">
                <i class="ph ph-trash"></i>
            </button>
        </div>
        <div class="row g-2">
            <div class="col-md-2">
                <label class="form-label small fw-semibold">Icon Bootstrap</label>
                <input type="text" name="layanan_icon[]" class="form-control form-control-sm" placeholder="bi-mortarboard-fill">
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-semibold">Judul Layanan</label>
                <input type="text" name="layanan_title[]" class="form-control form-control-sm" placeholder="Nama Layanan">
            </div>
            <div class="col-md-4">
                <label class="form-label small fw-semibold">Deskripsi</label>
                <input type="text" name="layanan_desc[]" class="form-control form-control-sm" placeholder="Deskripsi singkat layanan...">
            </div>
            <div class="col-md-1">
                <label class="form-label small fw-semibold">Warna BG</label>
                <input type="color" name="layanan_bg[]" class="form-control form-control-sm form-control-color" value="#e8f0fe">
            </div>
            <div class="col-md-1">
                <label class="form-label small fw-semibold">Warna Icon</label>
                <input type="color" name="layanan_color[]" class="form-control form-control-sm form-control-color" value="#1a237e">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <div class="p-2 rounded text-center w-100" style="background:#e8f0fe;">
                    <i class="bi bi-star" style="font-size:1.3rem;color:#1a237e;"></i>
                </div>
            </div>
        </div>`;
    list.appendChild(div);
    renumberLayanan();
}

function hapusLayanan(btn) {
    const item = btn.closest('.layanan-item');
    if (document.querySelectorAll('.layanan-item').length <= 1) {
        alert('Minimal harus ada 1 layanan.');
        return;
    }
    item.remove();
    renumberLayanan();
}

function renumberLayanan() {
    document.querySelectorAll('.layanan-item').forEach((el, i) => {
        el.querySelector('span.fw-semibold').textContent = `Layanan ${i + 1}`;
    });
}
</script>
@endpush
@endsection
