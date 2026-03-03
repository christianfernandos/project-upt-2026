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
        if ($kategori && $kategori !== '') {
            $query->where('kategori', $kategori);
        }

        $programList   = $query->get();
        $aktifKategori = $kategori;

        // Jika kategori filter tidak ada di map bawaan, tampilkan apa adanya (kapitalisasi)
        if ($kategori && !array_key_exists($kategori, $kategoriMap)) {
            $labelKategori = ucwords(str_replace('-', ' ', $kategori));
        } else {
            $labelKategori = $kategori ? ($kategoriMap[$kategori] ?? 'Program Kegiatan') : 'Semua Program';
        }

        // Kumpulkan semua kategori unik dari DB untuk filter dinamis di front-end
        $kategoriDiDB = ProgramKegiatan::select('kategori')->distinct()->pluck('kategori')->toArray();

        return view('front.program-kegiatan', compact(
            'programList', 'aktifKategori', 'labelKategori', 'kategoriMap', 'kategoriDiDB'
        ));
    }
}
