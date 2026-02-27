<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaFrontController extends Controller
{
    public function index()
    {
        $data = Berita::latest()->paginate(9);
        return view('front.berita', compact('data'));
    }

    public function show($id)
    {
        $berita  = Berita::findOrFail($id);
        $related = Berita::where('id', '!=', $id)->latest()->take(4)->get();
        return view('front.berita-detail', compact('berita', 'related'));
    }
}
