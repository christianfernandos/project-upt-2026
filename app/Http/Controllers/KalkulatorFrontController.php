<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kalkulator;

class KalkulatorFrontController extends Controller
{
    public function index()
    {
        $kalkulatorList = Kalkulator::orderBy('nama_pt')->get();
        return view('front.kalkulator', compact('kalkulatorList'));
    }

    public function cetakPdf($id)
    {
        $kal = Kalkulator::findOrFail($id);

        // Hitung rekomendasi
        $prodTK = $kal->produktivitas_per_tk;
        if ($prodTK >= 50000000) {
            $rekLabel = 'Sangat Produktif';
        } elseif ($prodTK >= 30000000) {
            $rekLabel = 'Produktif';
        } elseif ($prodTK >= 15000000) {
            $rekLabel = 'Cukup Produktif';
        } else {
            $rekLabel = 'Perlu Peningkatan';
        }

        return view('front.kalkulator-pdf', compact('kal', 'rekLabel'));
    }
}
