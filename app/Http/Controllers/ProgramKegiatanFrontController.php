<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKegiatan;

class ProgramKegiatanFrontController extends Controller
{
    // Mapping slug → label display
    private array $kategoriMap = [
        'pelatihan-kerja'          => 'Pelatihan Kerja',
        'peningkatan-produktivitas'=> 'Peningkatan Produktivitas',
        'sertifikasi-kompetensi'   => 'Sertifikasi Kompetensi',
        'konsultasi'               => 'Konsultasi Produktivitas',
        'magang-industri'          => 'Magang Industri',
    ];

    public function index(Request $request)
    {
        $kategori      = $request->query('kategori');
        $kategoriMap   = $this->kategoriMap;

        $query = ProgramKegiatan::latest();
        if ($kategori && array_key_exists($kategori, $kategoriMap)) {
            $query->where('kategori', $kategori);
        }

        $programList       = $query->get();
        $aktifKategori     = $kategori;
        $labelKategori     = $kategori ? ($kategoriMap[$kategori] ?? 'Program Kegiatan') : 'Semua Program';

        return view('front.program-kegiatan', compact(
            'programList', 'aktifKategori', 'labelKategori', 'kategoriMap'
        ));
    }
}
