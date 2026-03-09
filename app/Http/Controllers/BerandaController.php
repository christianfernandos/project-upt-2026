<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\ProgramKegiatan;
use App\Models\Pegawai;
use App\Models\ProfilUpt;
use App\Models\HeroSlide;

class BerandaController extends Controller
{
    public function index()
    {
        $beritaTerbaru  = Berita::latest()->take(5)->get();
        $programList    = ProgramKegiatan::latest()->take(3)->get();
        $pegawaiList    = Pegawai::orderBy('urutan')->take(6)->get();
        $profil         = ProfilUpt::first();
        $heroSlides     = HeroSlide::where('aktif', true)->orderBy('urutan')->get();

        return view('front.index', compact('beritaTerbaru', 'programList', 'pegawaiList', 'profil', 'heroSlides'));
    }
}